<?php

require __DIR__ . '/vendor/autoload.php';

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
    'x' => $_POST['x'],
    'y' => $_POST['y'],
    'name' => $_POST['name'],
]);

$pusher->trigger('paint', 'paint-xy', $data);

