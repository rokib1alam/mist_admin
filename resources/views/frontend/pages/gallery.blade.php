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
        margin: 2rem;
        width: 100%;
    }

    .col-12 img:hover {
        opacity: 1;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<div class="container">
    <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
        <div class="col-12 col-md-6 col-lg-3" style="height: 300px; margin:0 0 35px 0">
            <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                class="h-100" data-target="#indicators" data-slide-to="0" alt="" />
        </div>
        <div class="col-12 col-md-6 col-lg-3" style="height: 300px; margin:0 0 35px 0">
            <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                class="h-100" data-target="#indicators" data-slide-to="1" alt="" />
        </div>

        <div class="col-12 col-md-6 col-lg-3" style="height: 300px; margin:0 0 35px 0">
            <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                class="h-100" data-target="#indicators" data-slide-to="3" alt="" />
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="indicators" class="carousel slide" data-interval="false">
                    <ol class="carousel-indicators">
                        <li data-target="#indicators" data-slide-to="0" class="active"></li>
                        <li data-target="#indicators" data-slide-to="1"></li>
                        <li data-target="#indicators" data-slide-to="3"></li>

                    </ol>
                    <div class="carousel-inner">

                        <div class="carousel-item active">

                            <img class="d-block w-100" style="height: 600px;"
                                src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 600px;"
                                src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                                alt="Second slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 600px;"
                                src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/231442813/original/27e952d5225aceaef4b816f146465f66e679384f/do-react-js-frontend-javascript-and-node-js-development.png"
                                alt="Fourth slide">
                        </div>

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
