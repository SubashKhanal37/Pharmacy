<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductFeatureController extends Controller
{
    public function feature(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product->feature == '1') {
            $product->feature = "0";
            $product->save();
        } else {
            $product->feature = "1";
            $product->save();
        }



        return redirect(route('products.index'));
    }
}
