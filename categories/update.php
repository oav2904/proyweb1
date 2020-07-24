<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$id = $_GET['id'] ?? '';
$category = $category_model->find($id)[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $father_category = $_POST['father_category'] ?? null;
    $category_model->update($id, $name, $father_category);
    exit;
    return header("Location: /categories");
}

require_once './form.php';
