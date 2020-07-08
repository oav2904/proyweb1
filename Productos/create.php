<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$name = $_POST['name'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal_model->create($name);
    return header("Location: /animals");
}

require_once './form.php';
 ?>