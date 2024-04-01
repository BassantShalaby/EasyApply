<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>
<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Jobs Applied</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Jobs Applied</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<div class="container my-5">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Your Jobs Applied Listing</h1>
    <div class="d-flex justify-content-center">
        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
            <?php foreach ($status_values as $status_value): ?>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0 text-capitalize">
                            <?= $status_value ?>
                        </h6>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Job Title</th>
                <th scope="col">Applied Date</th>
                <th scope="col">Status</th>
                <th scope="col">Job Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
                <tr>

                    <td>
                        <a class="text-capitalize" href="/jobs/show?id=<?= $job['id'] ?>">
                            <?= $job['title'] ?>
                        </a>
                    </td>
                    <td>
                        <?= date('d, M, Y', strtotime($job['applied_date'])) ?>
                    </td>
                    <td class="text-capitalize">
                        <?= $job['application_status'] ?>
                    </td>
                    <td>
                        <a href="/jobs/show?id=<?= $job['id'] ?>" type="button" class="btn btn-success">Details</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>