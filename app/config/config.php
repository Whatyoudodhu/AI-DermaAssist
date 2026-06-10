<?php
// config.php - DB and app settings
return [
    'db' => [
        'host' => '127.0.0.1',
        'name' => 'skin_fyp',
        'user' => 'root',
        'pass' => ''
    ],
    'flask_api' => [
        'url' => 'http://127.0.0.1:5000/predict'
    ],
    'uploads_dir' => __DIR__ . '/../../public/uploads'
];
?>