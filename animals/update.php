<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$id = $_GET['id'] ?? '';
$animal = $animal_model->find($id)[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $animal_model->update($id, $name);
    return header("Location: /animals");
}

require_once './form.php';
 ?>