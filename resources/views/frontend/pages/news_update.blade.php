<div class="news-updates">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">News &amp; Updates</h2>
                    <a href="#">Read All News</a>
                </div>
                <div class="row">

                    @foreach ($classes as $class)
                        <div class="col-lg-6">
                            @if (isset($newses[$class->id][0]))
                                @foreach ($newses[$class->id] as $news)
                                    <div class="{{ $class->divclass }}">
                                        <a href="news-single.html" class="{{ $class->imgclass }}">
                                            <img src="{{ $news->image }}" alt="Image" class="img-fluid"></a>
                                        <div class="post-content">
                                            <div class="post-meta">
                                                <a href="#">{{ $news->date }}</a>
                                                <span class="mx-1">/</span>
                                                <a href="{{ $news->attach_document }}">{{ $news->notice_title }}</a>
                                            </div>
                                            <h3 class="post-heading"><a href="{{ $news->attach_document }}" download="{{ $news->attach_document }}">{{ $news->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="col-lg-3">
                <div class="section-heading">
                    <h2 class="text-black">Campus Videos</h2>
                    <a href="#">View All Video</a>
                </div>
                @foreach ($video as $videos)
                    <a href="{{ $videos->video }}" class=" video-1 mb-4  rounded mx-auto "  style="height: 150px; overflow: hidden;" data-fancybox="" data-ratio="2">
                        <span class="play">
                            <span class="icon-play"></span>
                        </span>
                        <img src="{{ $videos->image }}" alt="Image" class="img-fluid img-thumbnail rounded mx-auto d-block">
                    </a>
                @endforeach 
            </div>
        </div>
    </div>
</div>
