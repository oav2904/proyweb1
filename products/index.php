<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
require_once '../shared/guard.php';

?>

<div class="container">
    <?php
    if ($_SESSION['user_admin'] == 't') {
    ?>
        <div class="container">

            <div class="columns">
                <div class="column is-half">
                    <h1>Productos</h1>
                    <a class="button is-success" href="/products/create.php">Nuevo Producto</a>
                </div>
                <div class="column is-half">
                    <form method="GET">
                        <input type="search" autofocus name="name" value="<?= $_GET['name'] ?? '' ?>">
                        <button class="button is-primary">Search</button>
                    </form>
                </div>
            </div>


        </div>
    <?php
    }
    ?>
    <hr>
    <div class="columns is-multiline">
        <?php
        $products = $product_model->read($_GET['name'] ?? '');
        if ($products) {
            foreach ($products as $product) {
                require './card.php';
            }
        }
        ?>
    </div>
</div>