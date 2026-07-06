<?php
return [
    'db' => [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'name' => getenv('DB_NAME') ?: 'skin_fyp',
        'user' => getenv('DB_USER') ?: 'root',
        'pass' => getenv('DB_PASS') ?: ''
    ],
    'flask_api' => [
        'url' => getenv('FLASK_API_URL') ?: 'https://ai-dermaassist-flask.onrender.com/predict'
    ],
    'uploads_dir' => __DIR__ . '/../../public/uploads'
];
?>
