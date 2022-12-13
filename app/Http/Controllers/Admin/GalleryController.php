<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\GalleryFormRequest;

class GalleryController extends Controller
{
    public function index()
    {
        $imgs = Gallery::all();
        return view('admin.gallery.index', compact('imgs'));
    }
    public function create()
    {
        return view('admin.gallery.create');
    }
    public function store(GalleryFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/gallery/', $filename);
            $validatedData['image'] = "uploads/gallery/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Gallery::create([
            'title' => $validatedData['title'],
            'image' => $validatedData['image'],
            'imgTag' => $validatedData['imgTag'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/gallery')->with('message', 'Content Added Successfully');
    }
    public function edit(Gallery $galleris)
    {
        return view('admin.gallery.edit', compact('galleris'));
    }

    public function update(GalleryFormRequest $request, Gallery $galleris)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('image')){

            $destination = $galleris->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/gallery/', $filename);
            $validatedData['image'] ="uploads/gallery/$filename";
       }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Gallery::where('id', $galleris->id)->update([
            'title' => $validatedData['title'],
            'image' => $validatedData['image'],
            'imgTag' => $validatedData['imgTag'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/gallery')->with('message', 'Content Updated Successfully');
    }
    public function destroy(Gallery $galleris)
    {
        if ($galleris->count() > 0){
            $destination = $galleris->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $galleris->delete();
            return redirect('admin/gallery')->with('message', 'Image Deleted Successfully');
        }  

        return redirect('admin/gallery')->with('message', 'Something Went Wrong');
    }
}
