<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Post A Job</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/jobs">Jobs</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Post A Job</h1>
        <div class="row g-4">
            <div class="w-50 m-auto">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4">
                        Welcome to Your Gateway for Talent Discovery! By Completing This Form, You're Taking the First
                        Step Towards Finding Your Ideal Candidate. Let's Shape the Future Together!
                    </p>
                    <?php if (isset($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <p class="alert alert-danger">
                                <?= $error ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form method="POST" action="/jobs">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                                        value="<?= $oldJobData['title'] ?? '' ?>">
                                    <label for="title">Title</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Desription" id="description"
                                        style="height: 150px"
                                        name="description"><?= $oldJobData['description'] ?? '' ?></textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="vacancies" placeholder="vacancies"
                                        name="vacancies" value="<?= $oldJobData['vacancies'] ?? '' ?>">
                                    <label for="vacancies">Open Vacancies</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" id="level" name="level">
                                        <option value="Entry Level" <?= isset($oldJobData['level']) && $oldJobData['level'] === 'Entry Level' ? 'selected' : '' ?>>
                                            Entry Level
                                        </option>
                                        <option value="Junior" <?= isset($oldJobData['level']) && $oldJobData['level'] === 'Junior' ? 'selected' : '' ?>>
                                            Junior
                                        </option>
                                        <option value="Mid Level" <?= isset($oldJobData['level']) && $oldJobData['level'] === 'Mid Level' ? 'selected' : '' ?>>
                                            Mid Level
                                        </option>
                                        <option value="Senior" <?= isset($oldJobData['level']) && $oldJobData['level'] === 'Senior' ? 'selected' : '' ?>>
                                            Senior
                                        </option>
                                        <option value="Lead" <?= isset($oldJobData['level']) && $oldJobData['level'] === 'Lead' ? 'selected' : '' ?>>
                                            Lead
                                        </option>
                                    </select>
                                    <label for="level">Level</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="expYears" placeholder="expYears"
                                        name="expYears" value="<?= $oldJobData['expYears'] ?? '' ?>">
                                    <label for="expYears">Years of Experience</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" name="city_id" id="city">
                                        <?php foreach ($countries as $country): ?>

                                            <optgroup label="<?= $country['name'] ?>">

                                                <?php foreach ($cities as $city): ?>
                                                    <?php if ($city["country_id"] === $country['id']): ?>
                                                        <option value="<?= $city['city_id'] ?>" <?= isset($oldJobData['city']) && $oldJobData['city'] === $city['city_name'] ? 'selected' : '' ?>>
                                                            <?= $city['city_name'] ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                            </optgroup>

                                        <?php endforeach; ?>
                                    </select>
                                    <label for="city">Location</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="locationType" name="locationType">
                                        <option value="Onsite" <?= isset($oldJobData['locationType']) && $oldJobData['locationType'] === 'Onsite' ? 'selected' : '' ?>>
                                            OnSite
                                        </option>
                                        <option value="Remote" <?= isset($oldJobData['locationType']) && $oldJobData['locationType'] === 'Remote' ? 'selected' : '' ?>>
                                            Remote
                                        </option>
                                        <option value="Hybrid" <?= isset($oldJobData['locationType']) && $oldJobData['locationType'] === 'Hybrid' ? 'selected' : '' ?>>
                                            Hybrid
                                        </option>
                                    </select>
                                    <label for="locationType">Location Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="empType" name="empType">
                                        <option value="Full Time" <?= isset($oldJobData['empType']) && $oldJobData['empType'] === 'Full Time' ? 'selected' : '' ?>>
                                            Full Time
                                        </option>
                                        <option value="Part Time" <?= isset($oldJobData['empType']) && $oldJobData['empType'] === 'Part Time' ? 'selected' : '' ?>>
                                            Part Time
                                        </option>
                                    </select>
                                    <label for="empType">Employment Type</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="salaryMin"
                                        placeholder="Salary Minimum" name="salaryMin"
                                        value="<?= $oldJobData['salaryMin'] ?? '' ?>">
                                    <label for="salaryMin">Salary Min</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="salaryMax"
                                        placeholder="Salary Maximum" name="salaryMax"
                                        value="<?= $oldJobData['salaryMax'] ?? '' ?>">
                                    <label for="salaryMax">Salary Max</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="Male" <?= isset($oldJobData['gender']) && $oldJobData['gender'] === 'Male' ? 'selected' : '' ?>>
                                            Male
                                        </option>
                                        <option value="Female" <?= isset($oldJobData['gender']) && $oldJobData['gender'] === 'Female' ? 'selected' : '' ?>>
                                            Female
                                        </option>
                                        <option value="Any" <?= isset($oldJobData['gender']) && $oldJobData['gender'] === 'Any' ? 'selected' : '' ?>>
                                            Any
                                        </option>
                                    </select>
                                    <label for="gender">Gender</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="category" name="category_id">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['id'] ?>" <?= isset($oldJobData['category']) && $oldJobData['category'] === $category['name'] ? 'selected' : '' ?>>
                                                <?= $category['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="category">Job Category</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Requirements" id="requirements"
                                        style="height: 150px"
                                        name="requirements"><?= $oldJobData['requirements'] ?? '' ?></textarea>
                                    <label for="requirements">Requirements</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="">Skills</label>
                                <?php foreach ($skills as $skill): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $skill['id'] ?>"
                                            id="<?= $skill['id'] ?>" name="skills[]" <?= isset($oldJobData['skills']) && in_array($skill['id'], $oldJobData['skills']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= $skill['id'] ?>">
                                            <?= $skill['name'] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>