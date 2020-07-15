<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
?>

<div class="container">

    <div class="container">

        <div class="columns">
            <div class="column is-half">
                <h1>Animals</h1>
                <a class="button is-success" href="/categorys/create.php">Nueva Categoría</a>
            </div>
            <div class="column is-half">
                <form method="GET">
                    <input type="search" autofocus name="name" value="<?= $_GET['name'] ?? '' ?>">
                    <input type="search" autofocus name="father_category" value="<?= $_GET['father_category'] ?? '' ?>">
                    
                    <button class="button is-primary">Search</button>
                </form>
            </div>
        </div>


    </div>
    <hr>
    <div class="columns is-multiline">
        <?php
        $categories = $category_model->read($_GET['name'] ?? '');
        if ($categories) {
            foreach ($categories as $category) {
                require './card.php';
            }
        }
        ?>
    </div>
</div>