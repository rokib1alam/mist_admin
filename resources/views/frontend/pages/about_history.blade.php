
<div class="container">
  @foreach ($abouts as $about )
      <div class="row">
      
        <div class="{{$about->img_class}}">
        
          <img src="{{$about->image}}" alt="Image" class="img-fluid"> 
        </div>
        <div class="{{$about->text_class}}">
          <h2 class="section-title-underline mb-5">
            <span>{{$about->title}} </span>
          </h2>
          <p class="text-justify">{{$about->description}}</p>
          <p class="text-justify">{{$about->shortdes}}</p>
        </div>
      </div>
  @endforeach
    
</div>
    