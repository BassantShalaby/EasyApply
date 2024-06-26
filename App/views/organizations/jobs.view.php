<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h2 class="display-3 text-white mb-3 animated slideInDown">Organization's Jobs List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Jobs Start -->
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <?= $org['name'] ?>'s&nbsp;&nbsp;Jobs Listing
        </h2>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <?php foreach ($jobs as $job): ?>
                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="/<?= $org['logo'] ?>" alt=""
                                style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h5 class="mb-3">
                                    <?= $job['title'] ?>
                                </h5>
                                <div class="d-flex mb-3">
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                                        <?= $job['emp_type'] ?>
                                    </span>
                                    <span class="text-truncate me-3 text-capitalize"><i
                                            class="fa fa-map-marker-alt text-primary me-2"></i>
                                        <?= $job['location_type'] ?>
                                    </span>
                                    <span class="text-truncate me-0"><i
                                            class="far fa-money-bill-alt text-primary me-2"></i>$
                                        <?= $job['salary_min'] ?> -
                                        <?= $job['salary_max'] ?>
                                    </span>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="text-truncate me-3"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Date
                                        Line:
                                        <?= date('d, M, Y', strtotime($job['created_at'])) ?>
                                    </small>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire
                                        Date:
                                        <?= date('d, M, Y', strtotime($job['expiry_date'])) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-success me-3 rounded-1" href="/jobs/show?id=<?= $job['id'] ?>">Details</a>
                                <a class="btn btn-dark me-3 rounded-1"
                                    href="/organizations/job-apps?id=<?= $job['id'] ?>">Applications</a>
                                <a class="btn btn-secondary me-3 rounded-1" href="/jobs/edit?id=<?= $job['id'] ?>">Edit</a>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="text-truncate me-3">
                                    Open Vacancies:
                                    <?= $job['open_vacancies'] ?>
                                </small>
                                <small class="text-truncate me-3">
                                    Hired:
                                    <?= $job['hired'] ?>
                                </small>
                                <small class="text-truncate me-3">
                                    Applied:
                                    <?= $job['applied'] ?>
                                </small>
                                <small class="text-truncate me-3">
                                    Status:
                                    <?= $job['job_status'] ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

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