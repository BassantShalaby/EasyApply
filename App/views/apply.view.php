<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>

<section class="container m-3">
<form method="POST" action="/apply">

<?php if (isset($errors)): ?>
    <?php foreach ($errors as $error) : ?>
<div class="message bg-red-100 my-3 text-danger"> <?= $error ?> </div>
<?php endforeach;?>
    <?php endif;?>


    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="applicant_id" name="applicant_id" placeholder="applicant_id">
                <label for="applicant_id">applicant id</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="job_id" name="job_id" placeholder="job_id">
                <label for="job_id">job id</label>
            </div>
        </div>
        
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a message here" id="reason" name="reason"  style="height: 150px"> <?= $apply['reason'] ?? '' ?> </textarea>
                <label for="reason">Reasons</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Apply</button>
        </div>
    </div>
</form>

</section>

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>