<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<div class="container mt-5">
    <div class="row">
    <form class="col-lg-6 col-md-6 col-sm-10 my-5 m-auto" action="login"  method="post" >
    <?php session_start(); ?>
    <?= loadPartial('success', [
                'message' => $_SESSION['message'] ?? ''
            ])
                ?>
        <div class="row g-3">

            <div class="col-md-12">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="Organization Email">
                    <label for="email">Enter Your Email</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="password" class="form-control" id="pass1" placeholder="Your Pass" >
                    <label for="pass">Enter your password</label>
                </div>
            </div>

            <div class="col-12 ">
        <button class="btn btn-success w-100 fs-3"  type="submit">Login</butt>
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