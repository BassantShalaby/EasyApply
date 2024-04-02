<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/jobs">Jobs</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Details</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Job Detail Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-baseline justify-content-between mb-5">
                    <div class="text-start ps-3 pe-5">
                        <h3 class="mb-3 text-dark">
                            <?= $job['title'] ?>
                        </h3>
                        <hr>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                            <?= "{$job['city_name']}, {$job['country_name']}" ?>
                        </span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>
                            <?= $job['emp_type'] ?>
                        </span>
                        <?php if (!empty($job['salary_min'])): ?>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
                                <?= '$' . formatSalary($job['salary_min']) ?>
                                -
                                <?= '$' . formatSalary($job['salary_max']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="/jobs/edit?id=<?= $job['id'] ?>">Edit</a>

                        <form class="d-inline" action="/jobs/destroy?id=<?= $job['id'] ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="mb-5 mx-5">

                    <?php if ($job['description']): ?>
                        <h4 class="mb-3">Job description</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($job['description'] as $description): ?>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>
                                    <?= $description ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ($job['requirements']): ?>
                        <h4 class="mb-3">Requirements</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($job['requirements'] as $requirement): ?>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>
                                    <?= $requirement ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ($skills): ?>
                        <h4 class="mb-3">Skills</h4>
                        <ul class="list-unstyled">
                            <?php foreach ($skills as $skill): ?>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>
                                    <?= $skill['name'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <section class="container m-3">
            <form method="POST" action="/jobs/show?id= <?= $job_id ?>">
                <?php if (isset($errors)): ?>
                    <?php foreach ($errors as $error) : ?>
                        <div class="message bg-red-100 my-3 text-danger"> <?= $error ?> </div>
                    <?php endforeach;?>
                <?php endif;?>

                <div class="row g-3">                
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a message here" id="reason" name="reason"  style="height: 150px"> <?= $apply['reason'] ?? '' ?> </textarea>
                            <label for="reason">Reasons</label>
                        </div>
                    </div>
                    <div class="col-12">
                    <?php if (!isset($_SESSION['token'])): ?>
                        <button class="btn btn-primary w-100 py-3" disabled type="submit">Apply</button>
                    <?php else: ?>
                        <button class="btn btn-primary w-100 py-3" type="submit">Apply</button>
                    <?php endif ?>

                    </div>
                </div>
            </form>
        </section>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summery</h4>

                    <p><i class="fa fa-angle-right text-primary me-2"></i>
                        Published On:
                        <?= date('d M, Y', strtotime($job['created_at'])) ?>
                    </p>

                    <?php if ($job['open_vacancies']): ?>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>
                            Vacancy:
                            <?= $job['open_vacancies'] ?> Position
                        </p>
                    <?php endif; ?>

                    <p><i class="fa fa-angle-right text-primary me-2"></i>
                        Job Nature:
                        <?= $job['emp_type'] ?>,
                        <?= $job['location_type'] ?>
                        Position
                    </p>

                    <?php if ($job['salary_min']): ?>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>
                            Salary:
                            <?= '$' . formatSalary($job['salary_min']) ?>
                            -
                            <?= '$' . formatSalary($job['salary_max']) ?>
                        </p>
                    <?php endif; ?>

                    <p><i class="fa fa-angle-right text-primary me-2"></i>
                        Location:
                        <?= "{$job['city_name']}, {$job['country_name']}" ?>
                    </p>

                </div>
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Company Details</h4>
                    <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr
                        vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata
                        aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd
                        clita labore.</p>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Job Detail End -->

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>