
    <div class="site-section">
        <div class="container">
          <div class="row mb-1 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
              <h2 class="section-title-underline mb-3">
                <span>Diploma Courses</span>
              </h2>
              <p> 8 বৎসর মেয়াদী ডিপ্লোমা-ইন-ইঞ্জিনিয়ারিং কোর্স সমূহ     
              </p>
            </div>
          </div>

            <div class="row">
                @foreach ($course as $courses )
                    <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a  href="{{ url ('courses/'.$courses->id)}}"><img src="{{$courses -> image}}" alt="Image" class="img-fluid "></a>
                        
                        <div class="category text-center "><h3>{{$courses -> department}}</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>Welcome to {{$courses -> department}}</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc text-justify mb-4">{{Str::limit($courses -> shortdesc,100)}}</p>
                        <p><a href="{{ url ('courses/'.$courses->id)}}" class="btn btn-primary rounded-0 px-4">Open</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div>

    
