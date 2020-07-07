<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/User.php';


use crojasaragonez\UtnDb\PgConnection;

$con = new PgConnection('postgres', '12345', 'isw', 5432, 'localhost');
$con->connect();

$user_model = new User($con);
