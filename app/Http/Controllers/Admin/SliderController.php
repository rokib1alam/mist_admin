<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index(){
        $sliders  = Slider::all();
        return view('admin.slider.index', compact('sliders')) ;
    }
    public function create ()
    {
        
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/slider/', $filename);
            $validatedData['image'] ="uploads/slider/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/slider')->with('message', 'Sliders Added Successfully');
    }
    public function edit(Slider $slide)
    {
       return view('admin.slider.edit',compact('slide'));
    }

    public function update(SliderFormRequest $request, Slider $slide )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $slide->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/slider/', $filename);
            $validatedData['image'] ="uploads/slider/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
        Slider::where('id',$slide->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slide->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/slider')->with('message', 'Sliders Updated Successfully');
    }
    public function destroy(Slider $slide)
    {
        if ($slide->count() > 0){
            $destination = $slide->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slide->delete();
            return redirect('admin/slider')->with('message', 'Sliders Deleted Successfully');
        }
        return redirect('admin/slider')->with('message', 'Something Went Wrong');
    }
}
