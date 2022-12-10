<div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
    <div class="container">
        @foreach ($about as $abouts )
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                    <span>{{$abouts->title}}</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead text-justify">{{str::limit($abouts->description,170)}}</p>
                
                    <p><a href="{{url('/about')}}">Read more</a></p>
                </div>
            </div>
        @endforeach
        
    </div>
</div>