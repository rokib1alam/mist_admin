<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Our Management</span>
                </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($managements as $management)
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-5 ">
                    <div class="feature-1 border rounded  person text-center ">
                        <img src="{{ $management->image }}" alt="Image" class=" img-fluid person_icon">
                        <div data-bs-spy="scroll" style="height: 210px;"  class="feature-1-content overflow-auto  mb-2">
                            <h2 >{{ $management->Name }}</h2>
                            <span class="position mb-3 d-block font-weight-bold" >{{ $management->designation }}</span>
                            <p>
                            <ul style="list-style: none;padding:0">
                               @if ($management->description)
                                      @forelse (explode("_",$management->description) as $item)
                                      <li>{{ $item }}</li>
                                  @empty
                                  @endforelse
                               @endif
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
