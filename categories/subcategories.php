<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
require_once '../shared/guard.php';
if ($_GET) {
    $father_category = $_GET['id'];
}
?>

<div class="columns is-multiline">
    <?php
    $categories = $category_model->read($_GET['name'] ?? '', $father_category);
    if ($categories) {
        foreach ($categories as $category) {
            require './card.php';
        }
    }
    ?>
</div>