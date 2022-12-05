<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\HeaderFormRequest;

class HeaderController extends Controller
{
    public function index(){
        $headers  = Header::all();
        return view('admin.header.index', compact('headers')) ;
    }
    public function create ()
    {
        
        return view('admin.header.create');
    }
    public function store(HeaderFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image1')){
            $file = $request-> file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename1 = time().'.'. $ext;

            $file->move('uploads/header/', $filename1);
            $validatedData['image1'] ="uploads/header/$filename1";
       }
       if ($request->hasFile('image2')){
        $file = $request-> file('image2');
        $ext = $file->getClientOriginalExtension();
        $filename2 = time().'.'. $ext;

        $file->move('uploads/header1/', $filename2);
        $validatedData['image2'] ="uploads/header1/$filename2";
        }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Header::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'shortdes' => $validatedData['shortdes'],
            'image1' => $validatedData['image1'],
            'image2' => $validatedData['image2'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/headers')->with('message', 'Headers Added Successfully');
    }

    public function edit(Header $header)
    {
        
       return view('admin.header.edit',compact('header'));
    }

    public function update(HeaderFormRequest $request, Header $header )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image1')){

            $destination = $header->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename1 = time().'.'. $ext;

            $file->move('uploads/header/', $filename1);
            $validatedData['image1'] ="uploads/header/$filename1";
       }
       if ($request->hasFile('image2')){

        $destination = $header->image2;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $file = $request-> file('image2');
        $ext = $file->getClientOriginalExtension();
        $filename2 = time().'.'. $ext;

        $file->move('uploads/header1/', $filename2);
        $validatedData['image2'] ="uploads/header1/$filename2";
   }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Header::where('id',$header->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'shortdes' => $validatedData['shortdes'],
            'image1' => $validatedData['image1'] ?? $header->image1,
            'image2' => $validatedData['image2'] ?? $header->image2,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/headers')->with('message', 'Headers Updated Successfully');
    }
    public function destroy(Header $header)
    {
        if ($header->count() > 0){
            $destination = $header->image1;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $destination = $header->image2;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $header->delete();
            return redirect('admin/headers')->with('message', 'Headers Deleted Successfully');
        }
        return redirect('admin/headers')->with('message', 'Something Went Wrong');
    }
    
}
