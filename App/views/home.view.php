<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Carousel Start -->
<div class="p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                You Deserved</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                rebum sea elitr.</p>
                            <a href="/jobs" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                A Job</a>
                            <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                Talent</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                That Fit You</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                rebum sea elitr.</p>
                            <a href="/jobs" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                A Job</a>
                            <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                Talent</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Search Start -->
<?php
loadPartial("search");
?>
<!-- Search End -->


<!-- Category Start -->
<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            <?php foreach ($categories as $category): ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item text-center rounded p-4" href="/category/show?id=<?= $category['id'] ?>">
                        <!-- <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i> -->
                        <h6 class="mb-3">
                            <?= $category['name'] ?>
                        </h6>
                        <!-- <p class="mb-0"> <?= $category['job_count'] ?> Vacancy</p> -->
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class="col-6 text-start">
                        <img class="img-fluid w-100" src="img/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid w-100" src="img/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
                    dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="/about">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Jobs Start -->
<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured</h6>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li> -->
            </ul>
            <div class="text-center wow fadeInUp" data-wow-delay="0.3s">
                <?php foreach ($jobs as $job): ?>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">
                                        <?= $job['title'] ?>
                                    </h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                        <?= "{$job['city_name']}, {$job['country_name']}" ?>
                                    </span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                        <?= $job['emp_type'] ?>
                                    </span>
                                    <?php if ($job['salary_min']): ?>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
                                            <?= '$' . formatSalary($job['salary_min']) ?>
                                            -
                                            <?= '$' . formatSalary($job['salary_max']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div
                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-primary" href="/jobs/show?id=<?= $job['id'] ?>">Details</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>
                                    Date Line:
                                    <?= date('d M, Y', strtotime($jobs[0]['created_at'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->


<!-- Testimonial Start -->
<div class="py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="text-center mb-5">Our Clients Say!!!</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>