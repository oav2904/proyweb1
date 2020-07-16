<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$name = $_POST['name'] ?? '';
$father_category = $_POST['father_category'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_model->create($name, $father_category);
    return header("Location: /categories");
}

require_once './form.php';
