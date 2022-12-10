<!-- A Lightbox is basically a slider (carousel) inside of a modal.

  Todos: fix active class (when you click on a photo, carousel in modal reverts to first slide)
 *solution: added data-slide-to and data-target to imgs
-->
<style>
    .close {
        font - size: 1.5rem;
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
$index = 8;

?>
<div class="container mb-5">
    <div class="carousol">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner " style="max-height: 400px">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=932&q=80"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="d-block w-100" alt="...">
                </div>
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
            @for ($i = 0; $i < $index; $i++)
                <div class="col-12 col-md-6 col-lg-3" style="height: 200px; margin:0 0 35px 0">
                    <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                        class="h-100 w-100" data-target="#indicators" data-slide-to="{{ $i }}" alt="" />
                </div>
            @endfor
        </div>
        <!-- Modal -->
        <div class="modal fade " id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="indicators" class="carousel slide" data-interval="false">
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < $index; $i++)
                                <li data-target="#indicators" data-slide-to="{{ $i }}" class="active"></li>
                            @endfor
                        </ol>
                        <div class="carousel-inner">

                            @for ($i = 0; $i < $index; $i++)
                                <div class="{{ $i == 0 ? 'carousel-item active' : 'carousel-item' }}">
                                    <img class="d-block w-100" style="height: 600px;"
                                        src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                                        alt=" slide">
                                </div>
                            @endfor

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
