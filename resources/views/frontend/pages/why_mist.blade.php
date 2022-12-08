    <div class="site-section">
        <div class="container ">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-4">
                    <h2 class="section-title-underline mb-2">
                        <span>Why MIST </span>
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($why as $mist)
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
                        <div class="feature-1 border">
                            <div class="icon-wrapper bg-primary">
                                <span class="{{ $mist->icontext }}"></span>
                            </div>
                            <div class="feature-1-content">
                                <h2>{{ $mist->title }}</h2>
                                <p>{{ $mist->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
