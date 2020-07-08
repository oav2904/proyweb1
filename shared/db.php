<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Producto.php';



use crojasaragonez\UtnDb\PgConnection;

$con = new PgConnection('postgres', '29041999', 'proyectoweb1', 5432, 'localhost');
$con->connect();

$user_model = new User($con);
$poducto_model= new Producto($con);
$categoria_model= new Categoria($con);
