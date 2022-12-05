<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\TestiFormRequest;

class TestimonialController extends Controller
{
    public function index(){
        $testi  = Testimonial::all();
        return view('admin.testimonial.index', compact('testi')) ;
    }
    public function create ()
    {
        
        return view('admin.testimonial.create');
    }
    public function store(TestiFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/testimonial/', $filename);
            $validatedData['image'] ="uploads/testimonial/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Testimonial::create([

            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/testimonials')->with('message', 'Testimonial Added Successfully');
    }

    public function edit(Testimonial $testi)
    {
        
       return view('admin.testimonial.edit',compact('testi'));
    }

    public function update(TestiFormRequest $request, Testimonial $testi )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $testi->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/testimonial/', $filename);
            $validatedData['image'] ="uploads/testimonial/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Testimonial::where('id',$testi->id)->update([
            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $testi->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/testimonials')->with('message', 'Testimonials Updated Successfully');
    }
    public function destroy(Testimonial $testi)
    {
        if ($testi->count() > 0){
            $destination = $testi->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $testi->delete();
            return redirect('admin/testimonials')->with('message', 'Testimonials Deleted Successfully');
        }
        return redirect('admin/testimonials')->with('message', 'Something Went Wrong');
    }
}
