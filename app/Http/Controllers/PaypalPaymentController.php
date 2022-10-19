<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Product;
use Auth;
use Session;


class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {
        $hello = \Cart::getContent();
        // dd($hello);
        $keys = $hello->keys();
        // dd($keys);

        // $product['items'] = $hello;
        for ($i = 0; $i < count($hello); $i++) {
            $product['items'][$i] =    [
                'name' => $hello[$keys[$i]]->name,
                'price' => $hello[$keys[$i]]->price,
                'desc'  => $hello[$keys[$i]]->attributes->image,
                'qty' => $hello[$keys[$i]]->quantity
            ];
        };

        $record = (Order::latest()->first()) ? Order::latest()->first()->bill_no : '2022-0';

        $expNum = explode('-', $record);
        //check first day in a year
        if (date('Y') > $expNum[0]) {
            $nextInvoiceNumber = date('Y') . '-1';
        } else {
            //increase 1 with last invoice number
            $nextInvoiceNumber = $expNum[0] . '-' . $expNum[1] + 1;
        }
        $product['invoice_id'] = $nextInvoiceNumber;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = \Cart::getTotal();


        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
        Session::put('bill_no', $nextInvoiceNumber);
        // dd(Session::get('bill_no'));

        return redirect($res['paypal_link']);
    }

    public function paymentCancel()
    {
        $errType = 'alert';
        $msg = 'Your payment has been declined.';
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend/Customer/cart', compact('cartItems', 'msg', 'errType'));
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // dd('Payment was successfull. The payment success page goes here!');

            $order = new Order;
            $order->customer_id = Auth::user()->id;
            $order->order_status = '1';
            $order->paid_status = '1';
            $order->bill_no = Session::get('bill_no');
            $order->Total = \Cart::getTotal();
            $order->save();

            $products = \Cart::getContent();
            $prod = $products->keys();
            foreach ($prod as $pro) {
                $order->products()->attach($pro, ['quantity' => $products[$pro]->quantity, 'price' => $products[$pro]->price]);
            }
            // foreach ($products as $item) {
            //     $or_pro = new OrderProduct;
            //     $or_pro->quantity = $item['quantity'];
            //     $or_pro->price = $item['price'];
            // }


            \Cart::clear();
            $errType = 'Success';
            $msg = 'Payment Successful.';
            $cartItems = \Cart::getContent();

            return view('frontend/Customer/cart', compact('cartItems', 'msg', 'errType'));
        }


        $msg = 'Error occured!';
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend/Customer/cart', compact('cartItems'), compact('msg'));
    }
}
