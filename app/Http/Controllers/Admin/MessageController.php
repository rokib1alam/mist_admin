<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\MessageFormRequest;

class MessageController extends Controller
{
    public function index(){
        $messages  = Message::all();
        return view('admin.message.index', compact('messages')) ;
    }
    public function create ()
    {  
        return view('admin.message.create');
    }
    public function store(MessageFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/message/', $filename);
            $validatedData['image'] ="uploads/message/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Message::create([

            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/message')->with('message', 'Message section Added Successfully');
    }

    public function edit(Message $message)
    {
        
       return view('admin.message.edit',compact('message'));
    }

    public function update(MessageFormRequest $request, Message $message )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $message->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/message/', $filename);
            $validatedData['image'] ="uploads/message/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Message::where('id',$message->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $message->image,
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/message')->with('message', 'Message Section Updated Successfully');
    }
    public function destroy(Message $message)
    {
        if ($message->count() > 0){
            $destination = $message->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $message->delete();
            return redirect('admin/message')->with('message', 'Message Section Deleted Successfully');
        }
        return redirect('admin/message')->with('message', 'Something Went Wrong');
    }
}
