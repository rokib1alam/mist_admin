<div class="py-2 bg-white">
  <div class="container">
    <div class="row align-items-center">
      @foreach ($topbars as $top )
        <div class="col-lg-9 d-none d-lg-block">
          <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> {{$top->title}}</a> 
          <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span>{{$top->mobile}}</a> 
          <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> {{$top->email}}</a> 
        </div>
      @endforeach

      <div class="col-lg-3 text-right">
        <a href="{{url('/login')}}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
        <a href="{{url('/register')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
      </div>
    </div>
  </div>
</div>