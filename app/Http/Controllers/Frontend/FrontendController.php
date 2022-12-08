<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BOD;
use App\Models\Why;
use App\Models\News;
use App\Models\About;
use App\Models\Video;
use App\Models\Course;
use App\Models\Header;
use App\Models\Slider;
use App\Models\Topbar;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Management;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $testi = Testimonial::where('status', '0')->get();
        $abouts = About::orderBy('id', 'asc')
            ->take(1)
            ->get();
        $video = Video::orderBy('id', 'asc')
            ->take(2)
            ->get();
        $course = Course::orderBy('id', 'asc')
            ->take(3)
            ->get();
        $messages = Message::orderBy('id', 'asc')
            ->take(1)
            ->get();

        $result['classes'] = DB::table('div_class')
            ->where(['status' => 0])
            ->get();
        // $resul['lession']=DB::table('lessions')->where(['status'=>1])->get();

        foreach ($result['classes'] as $class) {
            $result['newses'][$class->id] = DB::table('news')
                ->where(['status' => 0])
                ->where(['class_id' => $class->id])
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
        }

        return view('frontend.index', $result, compact('sliders', 'headers', 'topbars', 'why', 'course', 'testi', 'abouts', 'messages','video'));
    }

    public function create()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $course = Course::where('status', '0')->get();
        return view('frontend.courses', compact('headers', 'topbars', 'why', 'course'));
    }
    public function course(Course $courses)
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        return view('frontend.pages.course_single', compact('courses', 'headers', 'topbars', 'why'));
    }
    public function abouts()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $abouts = About::where('status', '0')->get();
        return view('frontend.about', compact('abouts', 'headers', 'topbars', 'why'));
    }
    public function bods()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $bods = BOD::where('status', '0')->get();
        return view('frontend.bod', compact('bods', 'headers', 'topbars', 'why'));
    }
    public function managements()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $managements = Management::where('status', '0')->get();
        return view('frontend.management', compact('managements', 'headers', 'topbars', 'why'));
    }
    public function admissions()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();

        return view('frontend.admission', compact('headers', 'topbars', 'why'));
    }



    public function contacts()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $contacts = Contact::all();
        return view('frontend.contact', compact('contacts', 'headers', 'topbars', 'why'));
    }

    public function store_contact(ContactFormRequest $request)
    {
        $validatedData = $request->validated();

       

        Contact::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
            'message' => $validatedData['message']
        ]);

        return redirect('/contact')->with('message', 'Message Added Successfully');
    }
    
    public function notice()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        $newses = News::where('status', '0')->get();
        return view('frontend.notice', compact('newses', 'headers', 'topbars', 'why'));
    }


    public function gallery()
    {
        $headers = Header::where('status', '0')->get();
        $topbars = Topbar::where('status', '0')->get();
        $why = Why::where('status', '0')->get();
        // $newses = News::where('status', '0')->get();
        return view('frontend.gallery', compact( 'headers', 'topbars', 'why'));
    }






}
