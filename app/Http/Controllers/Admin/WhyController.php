<?php

namespace App\Http\Controllers\Admin;

use App\Models\Why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WhyFormRequest;

class WhyController extends Controller
{
    public function index(){
        $mist  = Why::all();
        return view('admin.why.index', compact('mist')) ;
    }
    public function create ()
    {
        
        return view('admin.why.create');
    }
    public function store(WhyFormRequest $request)
    {
        $validatedData = $request->validated();

       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Why::create([
            'title' => $validatedData['title'],
            'icontext' => $validatedData['icontext'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/why')->with('message', 'Content Added Successfully');
    }
    public function edit(Why $mist)
    {
       return view('admin.why.edit',compact('mist'));
    }

    public function update(WhyFormRequest $request, Why $mist )
    {
        $validatedData = $request->validated();

        $validatedData ['status'] = $request->status == true ? '1' : '0';
       
        Why::where('id',$mist->id)->update([
            'title' => $validatedData['title'],
            'icontext' => $validatedData['icontext'],
            'description' => $validatedData['description'],

            'status' => $validatedData['status'],
        ]);

        return redirect('admin/why')->with('message', 'Content Updated Successfully');
    }
    public function destroy(Why $mist)
    {

        $mist->delete();
        return redirect('admin/why')->with('message', 'Content Deleted Successfully');

        return redirect('admin/why')->with('message', 'Something Went Wrong');
    }
}
