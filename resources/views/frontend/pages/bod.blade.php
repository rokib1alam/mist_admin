<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Our Board of Directors</span>
                </h2>
            </div>
        </div>
        <div class="row">
            @foreach ($bods as $bod)
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-5 ">
                    <div class="feature-1 border rounded  person text-center ">
                        <img src="{{ $bod->image }}" alt="Image" class=" img-fluid">
                        <div style="height: 210px;" class="feature-1-content overflow-auto mb-2">
                            <h2>{{ $bod->Name }}</h2>
                            <span class="position mb-3 d-block font-weight-bold">{{ $bod->designation }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
