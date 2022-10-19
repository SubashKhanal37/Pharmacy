<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Product::all();

        return view('frontend.products')->with(compact('data'));
    }
    public function viewproduct($slug)
    {
        echo $slug;

        return view('frontend.Customer.product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required|numeric',
            'm_date' => 'required|date',
            'e_date' => 'required|date',
            'p_price' => 'required',
            's_price' => 'required',
            'dis_percent' => 'required',
        ]);
        $product = new Product;
        $product->code = $request['code'];
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->excerpt = $request['excerpt'];
        $oldPath = 'productnew.png';

        $fileExtension = \File::extension($oldPath);
        $newName = $product->code . '.' . $fileExtension;
        $newPathWithName = 'storage/product/' . $newName;

        if (\File::move($oldPath, $newPathWithName)) {



            $product->image = $newName;
        }
        $product->image_caption = $newName;
        $product->supplier_id = $request['supplier_id'];
        $product->quantity = $request['quantity'];
        $product->m_date = $request['m_date'];
        $product->e_date = $request['e_date'];
        $product->p_price = $request['p_price'];
        $product->s_price = $request['s_price'];
        $product->dis_percent = $request['dis_percent'];
        $product->save();

        $code = Product::where('code', $request['code'])->first()->id;



        // return redirect(Route('products.index'));
        return view('frontend.layout.addproductimages', compact('code'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $data = compact('product');
        return view('frontend.Customer.product')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $data = compact('product');


        return view('frontend.editproduct')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required|numeric',
            'm_date' => 'required|date',
            'e_date' => 'required|date',
            'p_price' => 'required',
            's_price' => 'required',
            'dis_percent' => 'required',
        ]);
        $product = Product::where('id', $id)->first();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->excerpt = $request['excerpt'];
        // if ($request->hasFile('image')) {
        //     $img = $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('product', $img, 'public');
        //     $product->image = $img;
        //     $product->image_caption = $img;
        // }
        $oldPath = 'productnew.png';

        $fileExtension = \File::extension($oldPath);
        $newName = $product->code . '.' . $fileExtension;
        $newPathWithName = 'storage/product/' . $newName;

        if (\File::move($oldPath, $newPathWithName)) {



            $product->image = $newName;
        }
        $product->image_caption = $newName;
        $product->supplier_id = $request['supplier_id'];
        $product->quantity = $request['quantity'];
        $product->m_date = $request['m_date'];
        $product->e_date = $request['e_date'];
        $product->p_price = $request['p_price'];
        $product->s_price = $request['s_price'];
        $product->dis_percent = $request['dis_percent'];
        $product->save();



        return redirect(Route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::find($slug);
        $product->delete();

        return redirect(Route('products.index'));
    }
}
