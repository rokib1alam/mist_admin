<?php

namespace App\Http\Controllers\Admin;

use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\File;
use App\Http\Requests\ManagementFormRequest;

class ManagementController extends Controller
{
    public function index(){
        $management  = Management::all();
        return view('admin.management.index', compact('management')) ;
    }
    public function create ()
    {
        
        return view('admin.management.create');
    }
    public function store(ManagementFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/management/', $filename);
            $validatedData['image'] ="uploads/management/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Management::create([

            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/management')->with('message', 'Management Added Successfully');
    }

    public function edit(Management $managements)
    {
        
       return view('admin.management.edit',compact('managements'));
    }

    public function update(ManagementFormRequest $request, Management $managements )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $managements->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/management/', $filename);
            $validatedData['image'] ="uploads/management/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Management::where('id',$managements->id)->update([
            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $managements->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/management')->with('message', 'management Updated Successfully');
    }
    public function destroy(Management $managements)
    {
        if ($managements->count() > 0){
            $destination = $managements->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $managements->delete();
            return redirect('admin/management')->with('message', 'management Deleted Successfully');
        }
        return redirect('admin/management')->with('message', 'Something Went Wrong');
    }
}
