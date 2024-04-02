<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<div class="container my-5">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                    <?= $organization['name'] . ' Account' ?>
                </a></li>
        </ol>
    </nav>
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/<?= $organization['logo'] ?>" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>
                                <?= $organization['name'] ?>
                            </h4>
                            <p class="text-secondary mb-1">
                                <?= $organization['industry'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $organization['email'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $organization['phone'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $org_city[0] . ' , ' . $org_country[0] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 class="mb-0 text-primary">Info</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['name'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Industry</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['industry'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Details</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['info'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['email'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['phone'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['link'] ?>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $organization['phone'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $org_city[0] . ' , ' . $org_country[0] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Posted Jobs Count</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $org_jobs[0] ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row"> -->
            <div class="col">
                <button href="/organizations/edit?id=<?= $organization['id'] ?>" type="button" class="btn btn-secondary"
                    disabled>Edit Settings</button>
                <a href="/organizations/jobs?id=<?= $organization['id'] ?>" type="button" class="btn btn-success">Show
                    Jobs</a>

            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>