<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$image = $_POST['image'] ?? '';
$category = $_POST['category'] ?? '';
$stock = $_POST['stock'] ?? '';
$price = $_POST['price'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_model->create($name, $description, $image, $category, $stock,$price);
    return header("Location: /products");
}

require_once './form.php';
