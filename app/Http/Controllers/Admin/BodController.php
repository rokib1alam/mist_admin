<?php

namespace App\Http\Controllers\Admin;

use App\Models\BOD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BODFormRequest;

class BodController extends Controller
{
    public function index(){
        $bods  = BOD::all();
        return view('admin.bod.index', compact('bods')) ;
    }
    public function create ()
    {
        
        return view('admin.bod.create');
    }
    public function store(BODFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/bod/', $filename);
            $validatedData['image'] ="uploads/bod/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       BOD::create([

            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/bod')->with('message', 'BODS Added Successfully');
    }

    public function edit(BOD $bods)
    {
        
       return view('admin.bod.edit',compact('bods'));
    }

    public function update(BODFormRequest $request, BOD $bods )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $bods->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/bod/', $filename);
            $validatedData['image'] ="uploads/bod/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       BOD::where('id',$bods->id)->update([
            'Name' => $validatedData['Name'],
            'designation' => $validatedData['designation'],
            'image' => $validatedData['image'] ?? $bods->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/bod')->with('message', 'BODS Updated Successfully');
    }
    public function destroy(BOD $bods) 
    {
        if ($bods->count() > 0){
            $destination = $bods->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $bods->delete();
            return redirect('admin/bod')->with('message', 'BODS Deleted Successfully');
        }
        return redirect('admin/bod')->with('message', 'Something Went Wrong');
    }
}
