<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

use crojasaragonez\UtnDb\PgConnection;

$con = new PgConnection('postgres', '29041999', 'proweb1', 5432, 'localhost');
$con->connect();

// Instancia de los diferentes modelos de la página
$user_model = new User($con);
$product_model = new Producto($con);
$category_model= new Categoria($con);
