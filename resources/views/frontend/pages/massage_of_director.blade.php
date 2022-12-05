@foreach ($messages as $message )
    <div class="container" >
        <div class="row mb-2 justify-content-center text-center" >
            <h2 class="section-title-underline mb-2 mt-5 ">
                <span >{{$message->title}}</span>
            </h2> 
        </div>
    </div>
    <div class="container">

        <img class="img-director" src="{{$message->image}}" alt="Director">
            <div class="text">
                {{$message->description}}  
            </div>
    </div> 
@endforeach

   
<style>
    .img-director{
        float:left;
        width:300px;
        height:240px;
        padding:0 10px 0 0;
    }
    .text{
        text-align:justify;
    }
</style>