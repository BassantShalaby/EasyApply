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
                    <?= $applicant['first_name'] . ' ' . $applicant['last_name'] . ' Profile' ?>
                </a></li>
        </ol>
    </nav>
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            <h4>
                                <?= $applicant['first_name'] . ' ' . $applicant['last_name'] ?>
                            </h4>
                            <p class="text-secondary mb-1">
                                <?= $applicant['title'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $applicant['email'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $applicant['bio'] ?>
                            </p>
                            <p class="text-muted font-size-sm">
                                <?= $applicant_city[0] . ' , ' . $applicant_country[0] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  mt-3">
                <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3">Skills</h5>
                    <?php foreach ($applicant_skills as $applicant_skill): ?>

                        <small>
                            <?= $applicant_skill['skill_name'] .
                                ' : ' . $applicant_skill['category_name'] ?>
                        </small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    <?php endforeach ?>
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
                            <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['first_name'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['last_name'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary text-capitalize">
                            <?= $applicant['gender'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Birthdate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['birthdate'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['email'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['phone'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant_city[0] . ' , ' . $applicant_country[0] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0 text-primary">Work Experience</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Title</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['title'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Bio</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['bio'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Level</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['experience'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Experience Years</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['exp_years'] . ' years' ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Download CV</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $applicant['cv'] ?>
                            <a href="" download>
                                <button type="submit" class="btn btn-outline-secondary mx-2">
                                    Download CV
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- <div class="row"> -->
            <div class="col">
                <a href="/applicants/edit?id=<?= $applicant['id'] ?>" type="button" class="btn btn-secondary">Edit Settings</a>
                <a href="/applicants/jobs?id=<?= $applicant['id'] ?>" type="button" class="btn btn-success">Jobs Applied</a>

            </div>
            <!-- </div> -->
        </div>
    </div>

    <?php
    loadPartial("footer");
    loadPartial("back-to-top");
    loadPartial("jslinks");
    ?>