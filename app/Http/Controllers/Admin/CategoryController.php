<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Image;

use File;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    public function index(){

        $main_categories = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        $categories = Category::orderBy('id','desc')->get();
            return view('admin.pages.categories.index',compact('categories','main_categories'));

    }

    public function create(){
        $main_categories = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        return view('admin.pages.categories.create', compact('main_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Category::createCategory($request->all(),$request);
            session()->flash('success', 'A Category has been added successfully');
        } catch(QueryException $ex){
            session()->flash('error', 'Failed to add Category!');
        }
        return redirect()->route('admin.categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $main_categories = Category::orderBy('name','desc')->where('parent_id', Null)->get();
        $category = Category::find($id);
        if (!is_null($category)){
            return view('admin.pages.categories.edit',compact('category','main_categories'));
        }else{
            return redirect()->route('admin.categories');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        try {
            $category = Category::find($id);
            $category->updateCategory($request->all(), $id, $request);
            session()->flash('success', 'Category has been updated successfully');
        } catch(QueryException $ex) {
            session()->flash('error', 'Failed to update Category!');
        }
        return redirect()->route('admin.categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        try {
            $category = Category::find($id);
            if(!is_null($category)){
            //If it is Primary Category, then delete all it's sub category
            if ($category->parent_id == NULL){
                //delete sub-categories
                $sub_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub){

                    //delete child-categories
                    $child_categories = Category::orderBy('name','desc')->where('parent_id', $sub->id)->get();
                    foreach ($child_categories as $child){
                        $product_under_child = Product::where('category_id', $child->id)->get();
                        foreach ($product_under_child as $childProduct){
                            if(!is_null($childProduct)){
                                $childProduct->delete();
                            }
                        }
                        $child->delete();
                    }
                    $product_under_sub = Product::where('category_id', $sub->id)->get();
                    foreach ($product_under_sub as $subProduct){
                        if(!is_null($subProduct)){
                            $subProduct->delete();
                        }
                    }
                    $sub->delete();
                }
            }else{
                //delete child-categories
                $child_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();
                foreach ($child_categories as $child){
                    $product_under_child = Product::where('category_id', $child->id)->get();
                    foreach ($product_under_child as $childProduct){
                        if(!is_null($childProduct)){
                            $childProduct->delete();
                        }
                    }
                    $child->delete();
                }
            }
            $product_under_main = Product::where('category_id', $category->id)->get();
            foreach ($product_under_main as $product){
                if(!is_null($product)){
                    $product->delete();
                }
            }
            $category->delete();
        }
            session()->flash('success', 'Category has been deleted successfully');
        } catch(QueryException $ex) {
            session()->flash('error', 'Failed to delete Category!');
        }
        return back();
    }
}
