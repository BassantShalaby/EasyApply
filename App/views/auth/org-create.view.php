<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<div class="container mt-5">
    <div class="row">
        <form class="col-lg-8 col-md-8 col-sm-10 m-auto" action="org-create" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-4">Signup As An Organization</h3>
            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ])
                ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Organisation Name" name="name" value="<?= $name ?? '' ?>">
                        <label for="name">Organization Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" placeholder="Organization Email"
                            name="email" value="<?= $email ?? '' ?>">
                        <label for="email">Organization Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="pass1" placeholder="Your Pass" name="pass1" >
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
                        <input type="tel" class="form-control" id="tel" placeholder="Subject" name="phone" value="<?= $phone ?? '' ?>">
                        <label for="tel">Mobile number</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Information about your organization" id="info"
                            style="height: 100px" minlength="100" maxlength="255"name="info"><?= $info ?? '' ?></textarea>
                        <label for="info">Information about your organization</label>
                    </div>
                </div>
                <div class="col-12">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="link" placeholder="Organization Website"
                            name="link" value="<?= $link ?? '' ?>">
                        <label for="link">Organization Website</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="logo" placeholder=" " name="logo">
                        <label for="logo">Organization Logo</label>
                    </div>
                </div>
                <div class=" col-6">
                    <?php echo $countries; ?>
                </div>
                <div class=" col-6">

                    <?php echo $cities; ?>
                </div>
                <div class=" col-12">

                    <?php echo $industries; ?>
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