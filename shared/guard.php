<?php

require_once 'sessions.php';

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    return header('Location: /');
}