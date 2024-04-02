<?php
use Framework\Session;

?>

<?php $successMessage = Session::getFlashMessage('successMessage'); ?>
<?php if ($successMessage): ?>
    <p class='alert alert-success'>
        <?= $successMessage ?>
    </p>
<?php endif; ?>

<?php $errorMessage = Session::getFlashMessage('errorMessage'); ?>
<?php if ($errorMessage): ?>
    <p class='alert alert-danger'>
        <?= $errorMessage ?>
    </p>
<?php endif; ?>