<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\Slider;
use App\Model\Category;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_categories'] = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['sliders'] = Slider::where('active_status',1)->orderBy('priority','asc')->get();
        $data['products'] = Product::orderBy('priority','desc')->take(10)->get();
        // $data['parents'] = Category::orderBy('priority','asc')->where('parent_id', NULL)->get();

        return view('frontend.pages.index',$data);
    }
    public function contactStore()
    {
        //
    }
    public function showDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)){
            return view('frontend.pages.product_details', compact('product'));
        }else{
            session()->flash('errors','Sorry! there is no product by this url');
            return redirect()->route('home');
        }
    }

}
