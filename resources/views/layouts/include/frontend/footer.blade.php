
    <@php
        use Illuminate\Support\Str;
    @endphp
     
    <div class="footer">
      <div class="container pt-2">
        <div class="row text-justify">
          <div class="col-lg-6">   
              @foreach ($about as $abouts ) 
              <p class="mb-1"><img src="{{asset('images/slider/logo-2.png')}}" alt="Image" class="img-fluid"></p>
              <p>{{ str::limit($abouts->description,150)}} </p>  
              <p><a href="{{url('/about')}}">Learn More</a></p>
              @endforeach
             
  
          </div>
          <div class="col-lg-2">
            <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul>
          </div>
          <div class="col-lg-2">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Math</a></li>
                  <li><a href="#">Science &amp; Engineering</a></li>
                  <li><a href="#">Arts &amp; Humanities</a></li>
                  <li><a href="#">Economics &amp; Finance</a></li>
                  <li><a href="#">Business Administration</a></li>
                  <li><a href="#">Computer Science</a></li>
              </ul>
          </div>
          <div class="col-lg-2">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Help Center</a></li>
                  <li><a href="#">Support Community</a></li>
                  <li><a href="#">Press</a></li>
                  <li><a href="#">Share Your Story</a></li>
                  <li><a href="#">Our Supporters</a></li>
              </ul>
          </div>
        </div>
