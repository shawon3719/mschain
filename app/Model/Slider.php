<?php

namespace App\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Image;
use File;
use App\Model\Imagehelper;
class Slider extends Model
{
    protected  $table = 'sliders';
    protected $fillable = [
        'title', 'description', 'image','priority','active_status','created_by','updated_by',
    ];

//    Create Slider

    public static  function createSlider(array $data , Request $request){
        // dd($data);
        if (!empty($data['image'])){
            $image = $data['image'];
            $path = 'images/sliders/';
            $img = $path. time() . '.'.$image->getClientOriginalExtension();
            $data['image'] = $img;
        }
        $data['active_status'] = $request->active_status == 1? 1 : 0;
        Slider::create(
            [
            'title' => $data['title'],
            'description' => $data['description'],
            'priority' => $data['priority'],
            'active_status' => $data['active_status'],
            'created_by' => $data['created_by'],
            'image' =>  $data['image']
        ]);
        $img = $data['image'];
        Image::make($image)->resize(1920, 842)->save(public_path($img));
    }

//    Update Slider

    public  static  function  updateSlider(array $data, $id, Request $request){
        $slider =  Slider::find($id);
        $data['active_status'] = $request->active_status == 1? 1 : 0;
        if ($request->image>0){
            $image = $request->file('image');
            $path = 'images/sliders/';
            $img = $path. time() . '.'.$image->getClientOriginalExtension();
            Image::make($image)->save(public_path($img));
            $data['image'] = $img;
        }
        else{
            $data['image'] = $slider->image;
        }
        Slider::find($id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'priority' => $data['priority'],
            'active_status' => $data['active_status'],
            'updated_by' => $data['updated_by'],
            'image' =>  $data['image']
        ]);
    }

//    Delete Slider

    public  static  function  deleteSlider($id){

        $slider =  Slider::find($id);
        if (!is_null($slider)){
            //Delete Image
            if (File::exists($slider->image)) {
                (File::delete($slider->image));
            }
            Slider::destroy($id);
        }

    }

}
