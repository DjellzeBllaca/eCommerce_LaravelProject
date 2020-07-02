<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        //$product_images = ProductImage::get();
        $product_images = ProductImage::select('id','path','product_id')->groupBy('product_id')->paginate(6);
        return view('welcome',compact('products','product_images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'description' => 'nullable|max:255',
                'price' => 'required|numeric|gte:0',
                'weight' => 'nullable|numeric|min:0',
                'product_type' => 'required|max:255'
            ]
        );

        if(!($request->hasFile('images'))){
            $product = new Product();
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            $product->weight = $request->get('weight');
            $product->product_type = $request->get('product_type');
            $product->seller_id = Auth::user()->id;
            $product->save();
        }
        if($request->hasFile('images')){
            if (count($request->images)>5){
                return redirect()->route('newProduct')->with('error', 'You exceeded the limit of pictures!');
            }

            $product = new Product();
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            $product->weight = $request->get('weight');
            $product->product_type = $request->get('product_type');
            $product->seller_id = Auth::user()->id;
            $product->save();

            foreach ($request->images as $image){

                $image_name_with_ext = $image->getClientOriginalName();
                $image_name= pathinfo($image_name_with_ext, PATHINFO_FILENAME);
                $extension = $image->extension();
                $stored_image_name = $image_name."_".time().'.'.$extension;
                $image->storeAs('public/images', $stored_image_name);

                $product_image = new ProductImage();

                    $product_image->path=$stored_image_name;
                    $product_image->product_id = $product->id;;
                    $product_image->save();
            }
        }

        return redirect()->route('newProduct')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
