<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$id = $_GET['id'] ?? '';
$animal = $animal_model->find($id)[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_POST['image'] ?? '';
    $category = $_POST['category'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $price = $_POST['price'] ?? '';
    $product_model->create($name, $description, $image, $category, $stock,$price);
    return header("Location: /productos");
}

require_once './form.php';
