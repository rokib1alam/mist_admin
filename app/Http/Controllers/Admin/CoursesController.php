<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CourseFormRequest;

class CoursesController extends Controller
{
    public function index(){
        $courses  = Course::all();
        return view('admin.course.index', compact('courses')) ;
    }
    public function create ()
    {
        
        return view('admin.course.create');
    }
    public function store(CourseFormRequest $request)
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/course/', $filename);
            $validatedData['image'] ="uploads/course/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Course::create([
            'department' => $validatedData['department'],
            'Depthead' => $validatedData['Depthead'],
            'hour' => $validatedData['hour'],
            'shortdesc' => $validatedData['shortdesc'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'admissionfee' => $validatedData['admissionfee'],
            'semesterfee' => $validatedData['semesterfee'],
            'tutionfee' => $validatedData['tutionfee'],
            'totalcost' => $validatedData['totalcost'],
            'status' => $validatedData['status'],

        ]);

        return redirect('admin/courses')->with('message', 'Courses Added Successfully');
    }
    public function edit(Course $course)
    {
       return view('admin.course.edit',compact('course'));
    }

    public function update(CourseFormRequest $request, Course $course )
    {
        $validatedData = $request->validated();
        

        if ($request->hasFile('image')){

            $destination = $course->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request-> file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;

            $file->move('uploads/course/', $filename);
            $validatedData['image'] ="uploads/course/$filename";
       }
       $validatedData ['status'] = $request->status == true ? '1' : '0';
       
       Course::where('id',$course->id)->update([
            'department' => $validatedData['department'],
            'Depthead' => $validatedData['Depthead'],
            'hour' => $validatedData['hour'],
            'shortdesc' => $validatedData['shortdesc'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $course->image,
            'admissionfee' => $validatedData['admissionfee'],
            'semesterfee' => $validatedData['semesterfee'],
            'tutionfee' => $validatedData['tutionfee'],
            'totalcost' => $validatedData['totalcost'],
            'status' => $validatedData['status'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/courses')->with('message', 'Courses Updated Successfully');
    }
    public function destroy(Course $course)
    {
        if ($course->count() > 0){
            $destination = $course->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $course->delete();
            return redirect('admin/courses')->with('message', 'Courses Deleted Successfully');
        }
        return redirect('admin/courses')->with('message', 'Something Went Wrong');
    }
}
