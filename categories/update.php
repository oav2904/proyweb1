<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$id = $_GET['id'] ?? '';
$categoriy = $category_model->find($id)[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $father_category = $_POST['father_category'] ?? '';
   
    $category_model->create($name, $father_category);
    return header("Location: /categories");
}

require_once './form.php';
