<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('frontend.pages.contact', compact('contacts'));
    }
    
    public function create()
    {
        return view('frontend.pages.contact');
    }
    public function store(ContactFormRequest $request)
    {
        $validatedData = $request->validated();

 
        Contact::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
            'message' => $validatedData['message'],
        ]); 
        return redirect('frontend/contact')->with('message', 'Message Added Successfully');
    }

    // public function edit(Topbar $topbar)
    // {

    //    return view('admin.topbar.edit',compact('topbar'));
    // }

    // public function update(ContactFormRequest $request, Topbar $topbar )
    // {
    //     $validatedData = $request->validated();

 
    //    Topbar::where('id',$topbar->id)->update([
    //         'title' => $validatedData['title'],
    //         'mobile' => $validatedData['mobile'],
    //         'email' => $validatedData['email'],
     //     ]);

    //     return redirect('admin/topbars')->with('message', 'Topbars Updated Successfully');
    // }
    public function destroy(Contact $contact)
    {
        $header->delete();
        return redirect('frontend/pages')->with('message', 'Contact Deleted Successfully');

        return redirect('frontend/pages')->with('message', 'Something Went Wrong');
    }
}
