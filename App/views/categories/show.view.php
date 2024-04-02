<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Jobs Start -->
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All <?= isset($categoryName) ? $categoryName : '' ?> Jobs </h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
       
        <?php if (!empty($categoryJobs)): ?>

            <div>
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul>
            </div>
               
            <?php foreach($categoryJobs as $job): ?>

                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="/img/com-logo-2.jpg" alt=""
                                    style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3"><?= $job['title'] ?></h5>
                                    <span class="text-truncate me-3"><i
                                            class="fa fa-map-marker-alt text-primary me-2"></i>New York,
                                        USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?= $job['emp_type'] ?></span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?= $job['salary_max'] ?> $ - <?= $job['salary_min'] ?> $</span>
                                </div>
                            </div>
                            <div
                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i
                                            class="far fa-heart text-primary"></i></a>
                                    <a class="btn btn-primary" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i> <?= $job['expiry_date'] ?> </small>
                            </div>
                        </div>
                    </div>

            <?php endforeach ?>
            <?php else: ?>
                <div class="text-center">
                    <h3 class="text-danger">There are no jobs available for this category.</h3>
                </div>
            <?php endif ?>



        </div>
    </div>
</div>
<!-- Jobs End -->

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>