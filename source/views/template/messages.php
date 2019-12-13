<?php

if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}

if ($message['type'] === 'error'){
    $alertType= 'danger';
} else {
    $alertType = 'sucess';
}

?>

<?php if($message):?>
    <div class="my-3 alert alert-<?= $alertType ?>">
      <?= $message['message'] ?>
    </div>
<?php endif ?>