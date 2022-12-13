<!-- A Lightbox is basically a slider (carousel) inside of a modal.

  Todos: fix active class (when you click on a photo, carousel in modal reverts to first slide)
 *solution: added data-slide-to and data-target to imgs
-->
<style>
    .close {
        font-size: 1.5rem;
    }

    .col-12 img {
        opacity: 0.7;
        cursor: pointer;

    }

    .col-12 img:hover {
        opacity: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<?php
?>
<div class="container mb-5">
    <div class="carousol">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner " style="max-height: 500px">
                @foreach ($imgs as $i => $img)
                    <div class="{{ $i == 0 ? 'carousel-item active' : 'carousel-item' }}">
                        <img src="{{ $img->image }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="img_div mt-5">
        <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
            @foreach ($imgs as $i => $img)
                <div class="col-12 col-md-6 col-lg-3" style="height: 200px; margin:0 0 35px 0">
                    <img src="{{ $img->image }}" class="h-100 w-100" data-target="#indicators"
                        data-slide-to="{{ $i }}" alt="" />
                </div>
            @endforeach
        </div>
        <!-- Modal -->
        <div class="modal fade " id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="indicators" class="carousel slide" data-interval="false">
                        <ol class="carousel-indicators">
                            @foreach ($imgs as $i => $img)
                                <li data-target="#indicators" data-slide-to="{{ $i }}" class="active"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">

                            @foreach ($imgs as $i => $img)
                                <div class="{{ $i == 0 ? 'carousel-item active' : 'carousel-item' }}">
                                    <img class="d-block w-100" style="height: 600px;width:100%;"
                                        src="{{ $img->image }}" alt=" slide">
                                </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
