<?php 
use Framework\Session;
if (isset($message) && !empty($message)): ?>
    <div class="alert alert-success" role="alert">
        <?= $message ?>
        <?php Session::unset('message'); ?>
    </div>
<?php endif; ?>
