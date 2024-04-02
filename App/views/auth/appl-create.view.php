<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<div class="container mt-5">
    <div class="row">
        <form class="col-lg-8 col-md-8 col-sm-10 m-auto" action="appl-create" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-4">Signup As An Applicant</h3>
            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ])
                ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname"
                            value="<?= $fname ?? '' ?>">
                        <label for="fname">First Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname"
                            value="<?= $lname ?? '' ?>">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" placeholder="Your Email" name="email"
                            value="<?= $email ?? '' ?>">
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="pass1" placeholder="Your Pass" name="pass1">
                        <label for="pass">Enter your password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="pass2" placeholder="Confirm Your Password"
                            name="pass2">
                        <label for="pass2">Re-enter your password</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="tel" placeholder="Mobile number" name="phone"
                            value="<?= $phone ?? '' ?>">
                        <label for="tel">Mobile number</label>
                    </div>

                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="b_date" placeholder="Birth Date" name="b_date"
                            value="<?= $b_date ?? '' ?>">
                        <label for="b_date">Birth Date</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="title" placeholder="Birth Date" name="title"
                            value="<?= $title ?? '' ?>">
                        <label for="title">Profession title</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="exp_years" placeholder="Experience years"
                            name="exp_years" value="<?= $exp_years ?? '' ?>" min="0">
                        <label for="exp_years">Years of experience</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-select" name="gender" id="gender">

                            <option <?= (!isset($disabledGender)||empty($gender)) ? 'selected' : 'selected'?>  disabled>Choose your gender</option>
                            <option value="female" <?= $female ?? '' ?>>Female</option>
                            <option value="male" <?= $male ?? '' ?>>Male</option>';
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-select" name="exp_lvl" id="exp_lvl" value="<?= $exp_lvl ?? '' ?>">
                            <option <?= (!isset($disabledExp)||empty($exp_lvl)) ? 'selected' : 'selected'?> disabled>Choose your experience level</option>
                            <option value="entry-level" <?= $entry_lvl ?? '' ?>>Entry level</option>
                            <option value="junior" <?= $junior ?? '' ?>>Junior</option>
                            <option value="mid-level" <?= $mid_lvl ?? '' ?>>Mid level</option>
                            <option value="senior" <?= $senior ?? '' ?>>Senior</option>
                            <option value="lead" <?= $lead ?? '' ?>>Lead</option>
                        </select>
                        <label for="exp_lvl">Level of experience</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Information about your your" id="info"
                            style="height: 100px" name="info"><?= $info ?? '' ?></textarea>
                        <label for="info">Information about yourself (your bio)</label>
                    </div>
                </div>
                <div class=" col-6">
                    <?php echo $countries; ?>
                </div>
                <div class=" col-6">

                    <?php echo $cities; ?>
                </div>
                <div class=" col-12">

                    <?php echo $skills; ?>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="pp" name="pp">
                        <label for="pp">Your Profile picture</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="cv" placeholder=" " name="cv">
                        <label for="cv">Your CV</label>
                    </div>
                </div>
                <div class="col-12 ">
                    <button class="btn btn-success w-100 p-3" type="submit">Signup</butt>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>