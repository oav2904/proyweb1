<?php
require_once '../shared/sessions.php';
require_once  '../shared/db.php';
require_once  '../shared/guard.php';
require_once  '../shared/header.php';
require_once   './carrito.php';

if ($_POST) {
    $sumatoria = 0;
    $SID = session_id();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        $sumatoria += ($producto['precio'] * $producto['cantidad']);
    }
    $factura_model->createFactura($_SESSION['user_id'], $sumatoria);
    $results = $factura_model->max();
    $id = $results[0]['id'];
    $stock = $product_model->stock($producto['id']);
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        if($stock['stock']> $producto['cantidad']){
            $factura_model->createdetalle($id, $producto['id'], $producto['nombre'], $producto['precio'], $producto['cantidad']);
            $product_model->reducirStock($producto['cantidad'],$producto['id']);
            unset($_SESSION['CARRITO']);
    }
}
}
