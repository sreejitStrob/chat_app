<?php

  require __DIR__ . '/vendor/autoload.php';

  if(isset($_POST['name'])){
    $options = array(
      'cluster' => 'ap2',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      '7455a3c52b935d083656',
      '11f660f05efe0b40d313',
      '938995',
      $options
    );

    $data = json_encode([
      'name' => $_POST['name'],
      'message' => $_POST['message'],
      'color' => $_POST['color']
    ]);

    $pusher->trigger('chat-app', 'chat-message', $data);
  }
?>
