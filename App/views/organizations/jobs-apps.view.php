<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>
<!-- Header End -->
<div class="container-fluid py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Applications</h1>
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Manage Job</li>
                        </ol>
                </nav>
        </div>
</div>
<!-- Header End -->

<div class="container my-5">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Manage Job</h1>
        <table class="table text-center">
                <thead>
                        <tr>
                                <!-- <th scope="col">No</th> -->
                                <th scope="col">Job Title</th>
                                <th scope="col">Applicant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Applying Reason</th>
                                <th scope="col">Change Application Status</th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($applications as $application): ?>
                                <tr>
                                        <td>
                                                <?= $application['job_title'] ?>
                                        </td>
                                        <td>
                                                <a class="text-capitalize"
                                                        href="/applicants/show?id=<?= $application['applicant_id'] ?>">
                                                        <?= $application['applicant_name'] ?>
                                                </a>
                                        </td>
                                        <td class="text-capitalize">
                                                <?= $application['status'] ?>
                                        </td>
                                        <td>
                                                <?= $application['reason'] ?>
                                        </td>
                                        <td>
                                                <form method="post" action="/organizations/updateStatus?id=<?= $job['id'] ?>">
                                                        <div class="row g-3 align-items-center justify-content-center">
                                                                <div class="col-auto">
                                                                        <select name="new_status" class="form-select">
                                                                                <?php foreach ($status_values as $status_value): ?>
                                                                                        <option class="text-capitalize"
                                                                                                value="<?= $status_value ?>">
                                                                                                <?= $status_value ?>
                                                                                        </option>
                                                                                <?php endforeach ?>
                                                                        </select>
                                                                </div>
                                                                <div class="col-auto">
                                                                        <input type="hidden" name="applicant_id"
                                                                                value="<?php echo $application['applicant_id']; ?>">
                                                                        <button type="submit"
                                                                                class="btn btn-sm btn-primary rounded-1">Update
                                                                                Status</button>
                                                                </div>
                                                        </div>
                                                </form>
                                        </td>
                                </tr>
                        <?php endforeach ?>
                </tbody>
        </table>
</div>

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>