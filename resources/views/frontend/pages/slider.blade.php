<div class="hero-slide owl-carousel site-blocks-cover">
  @foreach($sliders as $key => $slide)
    <div class=" {{ $key ==0 ? 'active' : ''}}">
        @if($slide->image)
            <div class="intro-section" style="background-image: url('{{ asset("$slide->image") }}')">;
        @endif
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>{{ $slide->title }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div></div> 

{{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  
    <div class="carousel-inner">
        @foreach($sliders as $key => $slide)
        <div class="carousel-item {{ $key ==0 ? 'active' : ''}} " >
            @if($slide->image)
                <img src="{{ asset("$slide->image") }}" style=" height:600px"  class="d-block w-100" alt="slider">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <h1>{{ $slide->title }}</h1>
                <p>{{ $slide->description }}</p>
            </div>
        </div>
        @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div></div> --}}