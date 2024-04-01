<?php if (isset($message)&&!empty($message)): ?>
    <div class="alert alert-success" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>