<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

use \Gumlet\ImageResize;

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$image = $_POST['image'] ?? '';
$category = $_POST['category'] ?? '';
$stock = $_POST['stock'] ?? '';
$price = $_POST['price'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST) {
        extract($_POST, EXTR_OVERWRITE);
        if (!file_exists("fotos")) {
            mkdir("fotos", 0777);
        }
        $dirSubida = "../products/fotos/$name";
        $foto = $_FILES['image'];
        var_dump($image);
        $nomFoto = $foto['name'];
        $nomTemp = $foto['tmp_name'];
        $rutaSubida = "{$dirSubida}product.jpeg";
        $extArchivo = preg_replace('/image\//', '', $foto['type']);
        if ($extArchivo == 'jpeg' || $extArchivo == 'png' || $extArchivo == 'jpg') {
            if (move_uploaded_file($nomTemp, $rutaSubida)) {
                $images = new ImageResize($rutaSubida);
                $images->resize(280, 280);
                $images->save($rutaSubida);
                $image = $rutaSubida;
                $product_model->create($id, $name, $description, $image, $stock, $price, $category);
            } else {

                return false;
            }
        } else {

            trigger_error("Formato de imagen inválido, favor solo usar archivos jpeg, png o jpg. Gracias", E_USER_WARNING);
        }
    }
    return header("Location: /products");
}

require_once './form.php';
