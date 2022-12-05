
    <!-- // 05 - Block -->
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>Testimonials</span>
            </h2>
          </div>
        </div>


        <div class="owl-slide owl-carousel">
          @foreach ($testi as $test )
            <div class="ftco-testimonial-1">
              <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                <img src="{{$test -> image}}" alt="Image" class="img-fluid mr-3">
                <div>
                  <h3>{{$test -> Name}}</h3>
                  <span>{{$test -> designation}}</span>
                </div>
              </div>
              <div>
                <p>&ldquo;{{$test -> description}}&rdquo;</p>
              </div>
            </div>
          @endforeach
          

        </div>
        
      </div>
    </div>
    
