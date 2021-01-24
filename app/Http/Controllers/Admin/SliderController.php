<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Model\Slider;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Auth Guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('admin.pages.sliders.index', compact('sliders'));
//        return view('admin.pages.sliders.index');
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
            Slider::createSlider($request->all(),$request);
            session()->flash('success', 'A Slider has been added successfully');
        } catch(QueryException $ex){
            session()->flash('error', 'Failed to add Slider!');
        }
        return redirect()->route('admin.sliders');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $slider = Slider::find($id);
            $slider->updateSlider($request->all(), $id, $request);
            session()->flash('success', 'Slider has been updated successfully');
        } catch(QueryException $ex) {
            session()->flash('error', 'Failed to update Slider!');
        }
        return redirect()->route('admin.sliders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Slider::find($id)->deleteSlider($id);
            session()->flash('success', 'Slider has been deleted successfully');
        } catch(QueryException $ex) {
            session()->flash('error', 'Failed to delete Slider!');
        }
        return back();
    }
}
