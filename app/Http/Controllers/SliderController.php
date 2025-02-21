<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider; 
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',['sliders'=>$sliders,'page_title'=>'Sliders']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('admin.slider.add',['page_title'=>'Add Slide']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:10',
            'detail'=>'required',
            'photo'=>'required|min:50|max:1024|mimes:jpg,png,jpeg'
        ]);

        $photo_address=$request->file('photo')->store('sliders');
        
        
        $slider = new Slider();
        $slider->title=$request->title;
        $slider->detail=$request->detail;
        $slider->photo=$photo_address; 

        if($slider->save()){
            Session::flash('alert_message','Slider inserted Successfully');
            Session::flash('alert_class','alert-success');
        }else{
            Session::flash('alert_message','Inert Faild!');
            Session::flash('alert_class','alert-danger');
        }
        return redirect('admin/sliders');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.edit',['slider'=>$slider,'page_title'=>'Edit Slide']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required|min:10',
            'detail'=>'required',
            'photo'=>'min:50|max:1024|mimes:jpg,png,jpeg'
        ]);

        $slider=Slider::find($id);

        $slider->title=$request->title; 
        $slider->detail=$request->detail; 
        
        if($request->photo){
           $old_photo_address=public_path().'/uploads/'. $slider->photo;
           if(file_exists($old_photo_address)){
            unlink($old_photo_address);
           } 

           $photo_address=$request->file('photo')->store('sliders');
           $slider->photo=$photo_address;


        } 

        if($slider->save()){
            Session::flash('alert_message','Slider Updated Successfully');
            Session::flash('alert_class','alert-success');
        }else{
            Session::flash('alert_message','Update Faild!');
            Session::flash('alert_class','alert-danger');
        }
        return redirect('admin/sliders');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider=Slider::find($id);
        $old_photo_address = public_path().'/uploads/'.$slider->photo; 
        if(file_exists($old_photo_address)){
            unlink($old_photo_address);
           } 
        
        if(Slider::destroy($id)){
            Session::flash('alert_message','Slider Deleted Successfully');
            Session::flash('alert_class','alert-success');
        }else{
            Session::flash('alert_message','Delete Faild!');
            Session::flash('alert_class','alert-danger');
        }
        return redirect('admin/sliders');
    }
}
