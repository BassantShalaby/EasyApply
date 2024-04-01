<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>


<!-- Header End -->
<div class="py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Job</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/jobs">Jobs</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit Job</h1>
        <div class="row g-4">
            <div class="w-50 m-auto">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <?php if (isset($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <p class="alert alert-danger">
                                <?= $error ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form method="POST" action="/jobs/update?id=<?= $job['id'] ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                                        value="<?= $job['title'] ?? '' ?>">
                                    <label for="title">Title</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Desription" id="description"
                                        style="height: 150px"
                                        name="description"><?= $job['description'] ?? '' ?></textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="vacancies" placeholder="vacancies"
                                        name="vacancies" value="<?= $job['open_vacancies'] ?? '' ?>">
                                    <label for="vacancies">Open Vacancies</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" id="level" name="level">
                                        <option value="Entry Level" <?= isset($job['level']) && $job['level'] === 'Entry Level' ? 'selected' : '' ?>>
                                            Entry Level
                                        </option>
                                        <option value="Junior" <?= isset($job['level']) && $job['level'] === 'Junior' ? 'selected' : '' ?>>
                                            Junior
                                        </option>
                                        <option value="Mid Level" <?= isset($job['level']) && $job['level'] === 'Mid Level' ? 'selected' : '' ?>>
                                            Mid Level
                                        </option>
                                        <option value="Senior" <?= isset($job['level']) && $job['level'] === 'Senior' ? 'selected' : '' ?>>
                                            Senior
                                        </option>
                                        <option value="Lead" <?= isset($job['level']) && $job['level'] === 'Lead' ? 'selected' : '' ?>>
                                            Lead
                                        </option>
                                    </select>
                                    <label for="level">Level</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="exp_years" placeholder="expYears"
                                        name="exp_years" value="<?= $job['exp_years'] ?? '' ?>">
                                    <label for="exp_years">Years of Experience</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" name="city_id" id="city">
                                        <?php foreach ($countries as $country): ?>

                                            <optgroup label="<?= $country['name'] ?>">

                                                <?php foreach ($cities as $city): ?>
                                                    <?php if ($city["country_id"] === $country['id']): ?>
                                                        <option value="<?= $city['city_id'] ?>" <?= isset($job['city']) && $oldJobData['city'] === $city['city_name'] ? 'selected' : '' ?>>
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
                                    <select class="form-select" id="location_type" name="location_type">
                                        <option value="Onsite" <?= isset($job['location_type']) && $job['location_type'] === 'Onsite' ? 'selected' : '' ?>>
                                            Onsite
                                        </option>
                                        <option value="Remote" <?= isset($job['location_type']) && $job['location_type'] === 'Remote' ? 'selected' : '' ?>>
                                            Remote
                                        </option>
                                        <option value="Hybrid" <?= isset($job['location_type']) && $job['location_type'] === 'Hybrid' ? 'selected' : '' ?>>
                                            Hybrid
                                        </option>
                                    </select>
                                    <label for="location_type">Location Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="emp_type" name="emp_type">
                                        <option value="Full Time" <?= isset($job['emp_type']) && $job['emp_type'] === 'Full Time' ? 'selected' : '' ?>>
                                            Full Time
                                        </option>
                                        <option value="Part Time" <?= isset($job['emp_type']) && $job['emp_type'] === 'Part Time' ? 'selected' : '' ?>>
                                            Part Time
                                        </option>
                                    </select>
                                    <label for="emp_type">Employment Type</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="salary_min"
                                        placeholder="Salary Minimum" name="salary_min"
                                        value="<?= $job['salary_min'] ?? '' ?>">
                                    <label for="salary_min">Salary Min</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="salary_max"
                                        placeholder="Salary Maximum" name="salary_max"
                                        value="<?= $job['salary_max'] ?? '' ?>">
                                    <label for="salary_max">Salary Max</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="Male" <?= isset($job['gender']) && $job['gender'] === 'Male' ? 'selected' : '' ?>>
                                            Male
                                        </option>
                                        <option value="Female" <?= isset($job['gender']) && $job['gender'] === 'Female' ? 'selected' : '' ?>>
                                            Female
                                        </option>
                                        <option value="Any" <?= isset($job['gender']) && $job['gender'] === 'Any' ? 'selected' : '' ?>>
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
                                            <option value="<?= $category['id'] ?>" <?= isset($job['category_id']) && (int) $job['category_id'] === $category['id'] ? 'selected' : '' ?>>
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
                                        name="requirements"><?= $job['requirements'] ?? '' ?></textarea>
                                    <label for="requirements">Requirements</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="">Skills</label>
                                <?php foreach ($skills as $skill): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $skill['id'] ?>"
                                            id="<?= $skill['id'] ?>" name="skills[]" <?= in_array($skill['id'], $selectedJobSkillsIds) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= $skill['id'] ?>">
                                            <?= $skill['name'] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-6">
                                <a class="btn btn-dark w-100 py-3" href="/jobs/show?id=<?= $job['id'] ?>">Cancel</a>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
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