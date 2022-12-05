<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoFormRequest;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }
    public function create()
    {
        return view('admin.videos.create');
    }
    public function store(VideoFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/Videos/', $filename);
            $validatedData['image'] = "uploads/Videos/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';

        Video::create([
            'title' => $validatedData['title'],
            'image' => $validatedData['image'],
            'video' => $validatedData['video'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/video')->with('message', 'Videos Added Successfully');
    }

    // public function edit(int $id)
    // {
    //     $class = DivClass::all();
    //     $newses = News::findOrFail($id);
    //     return view('admin.news.edit', compact('newses', 'class'));
    // }

    // public function update(NewsFormRequest $request, int $id)
    // {
    //     $validatedData = $request->validated();
    //     $newses = DivClass::findOrFail($validatedData['id'])
    //         ->newses()
    //         ->where('id', $id)
    //         ->first();

    //     if ($request->hasFile('image')) {
    //         $destination = $abouts->image;
    //         if (File::exists($destination)) {
    //             File::delete($destination);
    //         }
    //         $file = $request->file('image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $ext;

    //         $file->move('uploads/news/', $filename);
    //         $validatedData['image'] = "uploads/news/$filename";
    //     }
    //     $validatedData['status'] = $request->status == true ? '1' : '0';

    //     if ($newses) {
    //         $newses->update([
    //             'class_id' => $validatedData['class_id'],
    //             'date' => $validatedData['date'],
    //             'notice_title' => $validatedData['notice_title'],
    //             'title' => $validatedData['title'],
    //             'image' => $validatedData['image'] ?? $newses->image,
    //             'status' => $validatedData['status'],
    //         ]);

    //         return redirect('admin/news')->with('message', 'News Updated Successfully');
    //     } else {
    //         return redirect('admin/news')->with('message', 'No Such Newses id Found');
    //     }
    // }
    // public function destroy(News $newses)
    // {
    //     if ($newses->count() > 0) {
    //         $destination = $newses->image;
    //         if (File::exists($destination)) {
    //             File::delete($destination);
    //         }
    //         $newses->delete();
    //         return redirect('admin/news')->with('message', 'News Deleted Successfully');
    //     }
    //     return redirect('admin/news')->with('message', 'Something Went Wrong');
    // }
}
