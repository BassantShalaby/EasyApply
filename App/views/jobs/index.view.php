<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Jobs Start -->
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Featured Jobs</h1>
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
<!-- Jobs End -->
<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>