<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\ProductImage;
use Image;
use File;
use DataTables;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('priority','desc')->get();
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->title             =   $request->title;
        $product->description       =   $request->description;
        $product->priority          =   $request->priority;
        $product->slug              =   Str::slug($request->title).rand('1','1200');
        $product->category_id       =   $request->category_id;
        $product->active_status     =   $request->active_status == 1? 1 : 0;
        $product->created_by        =   $request->created_by;
        $product->save();
        if (count($request->product_image)>0){
            $i =0;
            foreach ($request->product_image as $image){
                $img = time(). $i . '.'.$image->getClientOriginalExtension();
                $location = 'images/products/main/'.$img;
                Image::make($image)->save($location);
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = 'images/products/main/'.$img;
                $product_image->save();
                $product->product_image = $product_image->image[0];
                $i++;
            }
        }

        session()->flash('success', 'Product has been added successfully');
        return redirect()->route('admin.products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.pages.products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $product = Product::find($id);
        $product->title             =   $request->title;
        $product->description       =   $request->description;
        $product->priority          =   $request->priority;
        $product->slug              =   Str::slug($request->title).rand('1','1200');
        $product->category_id       =   $request->category_id;
        $product->active_status     =   $request->active_status == 1? 1 : 0;
        $product->updated_by        =   $request->updated_by;
        $product->save();
        if (count($request->product_image)>0){
            $i =0;

            foreach ($request->product_image as $image){
                $img = time(). $i . '.'.$image->getClientOriginalExtension();
                $location = 'images/products/main/'.$img;
                Image::make($image)->save($location);
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = 'images/products/main/'.$img;;
                $product_image->save();
                $i++;
            }
        }
        session()->flash('success', 'Product has been Updated successfully');
        return redirect()->route('admin.products');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            if (file_exists($product->product_image)){
                unlink($product->product_image);
            }
            $product->delete();
        }
        session()->flash('success','Product has been deleted successfully!');
        return back();
    }
}
