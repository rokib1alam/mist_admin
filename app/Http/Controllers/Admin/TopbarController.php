<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topbar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopbarFormRequest;

class TopbarController extends Controller
{
    public function index(){
        $topbars  = Topbar::all();
        return view('admin.topbar.index', compact('topbars')) ;
    }
    public function create ()
    {
        
        return view('admin.topbar.create');
    }
    
    public function store(TopbarFormRequest $request)
    {
        $validatedData = $request->validated();
        
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Topbar::create([
            'title' => $validatedData['title'],
            'mobile' => $validatedData['mobile'],
            'email' => $validatedData['email'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/topbars')->with('message', 'Topbar Added Successfully');
    }

    public function edit(Topbar $topbar)
    {
        
       return view('admin.topbar.edit',compact('topbar'));
    }

    public function update(TopbarFormRequest $request, Topbar $topbar )
    {
        $validatedData = $request->validated();
        

        
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Topbar::where('id',$topbar->id)->update([
            'title' => $validatedData['title'],
            'mobile' => $validatedData['mobile'],
            'email' => $validatedData['email'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/topbars')->with('message', 'Topbars Updated Successfully');
    }
    public function destroy(Topbar $topbar)
    {
        
        $header->delete();
        return redirect('admin/topbars')->with('message', 'Topbars Deleted Successfully');
        
        return redirect('admin/topbars')->with('message', 'Something Went Wrong');
    }
}
