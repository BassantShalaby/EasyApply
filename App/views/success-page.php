<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">
        Success
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">
                    Success
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">
                    You Applied For The Job successfully
                </h1>
                <h1 class="mb-4">
                    <?= $message ?>
                </h1>
                <a class="btn btn-primary py-3 px-5" href="/">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->


<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>