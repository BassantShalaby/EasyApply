<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<div class="container mt-5">
    <div class="row">
        <form class="col-lg-8 col-md-8 col-sm-10 m-auto" action="org-signup1" method="post">
            <h3 class="text-center mb-4">Signup As An Applicant</h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                        <label for="fname">First Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="name">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
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
                        <input type="tel" class="form-control" id="tel" placeholder="Mobile number" name="phone">
                        <label for="tel">Mobile number</label>
                    </div>

                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="b_date" placeholder="Birth Date" name="b_date">
                        <label for="b_date">Birth Date</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Information about your your" id="info"
                            style="height: 100px" name="info"></textarea>
                        <label for="info">Information about yourself (your bio)</label>
                    </div>
                </div>
                <div class="col-12">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="link" placeholder="Your Website" name="link">
                        <label for="link">Linkedin Profile</label>
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
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="pp" placeholder=" " name="pp">
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