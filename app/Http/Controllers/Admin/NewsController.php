<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\DivClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\NewsFormRequest;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $class = DivClass::where('status', '0')->get();
        return view('admin.news.index', compact('news', 'class'));
    }
    public function create()
    {
        $class = DivClass::all();
        return view('admin.news.create', compact('class'));
    }
    public function store(NewsFormRequest $request)
    {
        $validatedData = $request->validated();

        $class = DivClass::findOrFail($validatedData['class_id']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/News/', $filename);
            $validatedData['image'] = "uploads/News/$filename";
        }

        if ($request->hasFile('attach_document')) {
            $file = $request->file('attach_document');
            $ext = $file->getClientOriginalExtension();
            $filename2 = time() . '.' . $ext;

            $file->move('uploads/News/PDF/', $filename2);
            $validatedData['attach_document'] = "uploads/News/PDF/$filename2";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';

        $news = $class->newses()->create([
            'class_id' => $validatedData['class_id'],
            'date' => $validatedData['date'],
            'notice_title' => $validatedData['notice_title'],
            'title' => $validatedData['title'],
            'attach_document' => $validatedData['attach_document'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/news')->with('message', 'News Added Successfully');
    }

    public function edit(int $news_id)
    {
        $class = DivClass::all();
        $newses = News::findOrFail($news_id);
        return view('admin.news.edit', compact('newses', 'class'));
    }

    public function update(NewsFormRequest $request, int $news_id, News $news)
    {
        $validatedData = $request->validated();
        $newses = DivClass::findOrFail($validatedData['class_id'])
            ->newses()
            ->where('id', $news_id)
            ->first();

        if ($request->hasFile('image')) {
            $destination = $news->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/news/', $filename);
            $validatedData['image'] = "uploads/news/$filename";
        }
        if ($request->hasFile('attach_document')) {
            $destination = $news->attach_document;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('attach_document');
            $ext = $file->getClientOriginalExtension();
            $filename2 = time() . '.' . $ext;

            $file->move('uploads/News/PDF/', $filename2);
            $validatedData['attach_document'] = "uploads/News/PDF/$filename2";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';

        if ($newses) {
            $newses->update([
                'class_id' => $validatedData['class_id'],
                'date' => $validatedData['date'],
                'notice_title' => $validatedData['notice_title'],
                'title' => $validatedData['title'],
                'image' => $validatedData['image'] ?? $newses->image,
                'attach_document' => $validatedData['attach_document'] ?? $newses->attach_document,
                'status' => $validatedData['status'],
            ]);

            return redirect('admin/news')->with('message', 'News Updated Successfully');
        } else {
            return redirect('admin/news')->with('message', 'No Such Newses id Found');
        }
    }
    public function destroy(News $newses)
    {
        if ($newses->count() > 0) {
            $destination = $newses->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $newses->delete();
            return redirect('admin/news')->with('message', 'News Deleted Successfully');
        }
        return redirect('admin/news')->with('message', 'Something Went Wrong');
    }
}
