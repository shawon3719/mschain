<?php

namespace App\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Image;
use File;
use App\Model\Product;
use App\Model\Imagehelper;

class Category extends Model
{
    protected  $table = 'categories';
    protected $fillable = [
        'name', 'description', 'parent_id','active_status','priority','created_by','updated_by',
    ];
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    /*
     * ParentOrNot Category
     *
     * Check if the category is child category of that parent category
     */
    public static function ParentOrNot($parent_id,$child_id){
        $categories = Category::where('id', $child_id)->where('parent_id',$parent_id)->get();
        if (!is_null($categories)){
            return true;
        }else{
            return false;
        }
    }

    //    Create Category

    public static  function createCategory(array $data , Request $request){

        
        $data['active_status'] = $request->active_status == 1? 1 : 0;
        $data['parent_id'] = $request->parent_id;
        Category::create(
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'priority' => $data['priority'],
                'parent_id' => $data['parent_id'],
                'active_status' => $data['active_status'],
                'created_by' => $data['created_by']
            ]);
    }

    //    Update Category

    public  static  function  updateCategory(array $data, $id, Request $request){
        $category =  Category::find($id);
        $data['active_status'] = $request->active_status == 1? 1 : 0;
        $data['parent_id']  = $request->parent_id;
        Category::find($id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'priority' => $data['priority'],
            'parent_id' => $data['parent_id'],
            'active_status' => $data['active_status'],
            'updated_by' => $data['updated_by']
        ]);
    }

    //    Delete Category

    public  static  function  deleteCategory($id){

        $category =  Category::find($id);
        if(!is_null($category)){
            //If it is Primary Category, then delete all it's sub category
            if ($category->parent_id == NULL){
                //delete sub-categories
                $sub_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();

                foreach ($sub_categories as $sub){
                    Product::where('category_id',  $sub->id)->get()->each->delete();
                    $sub->delete();
                }
            }
            Product::where('category_id',  $id)->get()->each->delete();
            $category->delete();
        }
        session()->flash('success','Category has been deleted successfully!');
        return back();

    }

}
