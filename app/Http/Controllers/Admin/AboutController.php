<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AboutFormRequest;

class AboutController extends Controller
{
    public function index(){
        $about  = About::all();
        return view('admin.about.index', compact('about')) ;
    }
    public function create ()
    {
        
        return view('admin.about.create');
    }
    public function store(AboutFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/about/', $filename);
            $validatedData['image'] ="uploads/about/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       About::create([

            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'shortdes' => $validatedData['shortdes'],
            'image' => $validatedData['image'],
            'img_class' => $validatedData['img_class'],
            'text_class' => $validatedData['text_class'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/abouts')->with('message', 'About section Added Successfully');
    }

    public function edit(About $abouts)
    {
        
       return view('admin.about.edit',compact('abouts'));
    }

    public function update(AboutFormRequest $request, About $abouts )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $abouts->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/about/', $filename);
            $validatedData['image'] ="uploads/about/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       About::where('id',$abouts->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'shortdes' => $validatedData['shortdes'],
            'image' => $validatedData['image'] ?? $abouts->image,
            'img_class' => $validatedData['img_class'],
            'text_class' => $validatedData['text_class'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/abouts')->with('message', 'About Section Updated Successfully');
    }
    public function destroy(About $abouts)
    {
        if ($abouts->count() > 0){
            $destination = $abouts->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $abouts->delete();
            return redirect('admin/abouts')->with('message', 'About Section Deleted Successfully');
        }
        return redirect('admin/abouts')->with('message', 'Something Went Wrong');
    }
}
