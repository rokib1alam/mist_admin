<div class="container-fluid  bg-light text-primary text-center header">
@foreach ( $headers as $head )
   <div class="row">
    <div class="col-md-2">
      <img class="img" src="{{ $head->image1 }}" alt="" height="120"  width="120">
    </div>
    <div class="col-md-8">
      <h1 class="maintitle">{{ $head->title }}</h1>
      <p class="subtitle d-none d-lg-block">{{ $head->description }}</p> 
      <p class="subtitle d-none d-lg-block">{{ $head->shortdes }}</p>
    </div>
    <div class="col-md-2">
      <img class="img" src="{{ $head->image2 }}" alt="" height="120"  width="120">
    </div>
  </div> 
@endforeach
  

</div>

<style>
.maintitle{
  font-size:35px;
  text-align:center;
}
@media screen and (max-width:400px) {
    .maintitle{
      
        font-size:20px;
        text-align:center;
      
    }
  }
  @media screen and (max-width:400px) {
    .img{
      height: 80px;
      width: 80px;
      margin: 0 auto;
    
      
    }
  }
  @media screen and (max-width:400px) {
    .img{
      height: 80px;
      width: 80px;
      margin: 0 auto;
    
      
    }
  }
  .subtitle{
    font-size:13px;
    
    text-align:center;
  }
</style>