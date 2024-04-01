<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Oragnization Account</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/organizations/show?id=<?= $org['id'] ?>">Account</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit Oragnization Account</h1>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <div>
                                    <a href="/applicants/edit" type="button" class="btn btn-light">Change Logo</a>
                                </div>
                            </div>
                            <!-- <div class="mt-3">
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
                        </div> -->
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
                                <label for="name">Name</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['name'] ?>" name="name"
                                    placeholder="Enter Organization name">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="industry">Industry</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['industry'] ?>" name="industry"
                                    placeholder="Enter Organization Industry">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="info">Details</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['info'] ?>" name="info"
                                    placeholder="Enter Organization Info">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['email'] ?>" name="email"
                                    placeholder="Enter Organization Email">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['phone'] ?>" name="phone"
                                    placeholder="Enter Organization Phone">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="link">Link</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org['link'] ?>" name="link"
                                    placeholder="Enter Organization Link">
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <label for="city">City</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="<?= $org_city['link'] ?>" name="city"
                                    placeholder="Enter Organization City">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select id="country" name="country">
                                    <!-- <?php
                                    foreach ($enum_values as $value) {
                                        echo "<option value=\"$value\">$value</option>";
                                    }
                                    ?> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <a href="/applicants/edit" type="button" class="btn btn-success">Update Settings</a>
                </div>
            </div>

        </div>
    </div>



    <?php
    loadPartial("footer");
    loadPartial("back-to-top");
    loadPartial("jslinks");
    ?>