<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
require_once '../shared/guard.php';
$ob = $_GET['namefo'];
?>

<div class="container">

    <div class="container">

        <div class="columns">
            <div class="column is-half">
                <h1>Categorías</h1>
                <a class="button is-success" href="/categories/create.php">Nueva Categoría</a>
            </div>
        </div>


    </div>
    <hr>
    <div class="columns is-multiline">
        <?php
        $categories = $category_model->read($ob);
        
        if ($categories) {
            foreach ($categories as $category) {
                require './card.php';
            }
        }
        ?>
    </div>
</div>