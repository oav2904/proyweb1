<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
 ?>

<div class="container">

<div class="container">

    <div class="columns">
      <div class="column is-half">
          <h1>Animals</h1>
          <a class="button is-success" href="/productos/create.php">Nuevo Producto</a>
      </div>
      <div class="column is-half">
          <form method="GET">
              <input type="search" autofocus name="name" value="<?= $_GET['name'] ?? '' ?>">
              <input type="search" autofocus name="description" value="<?= $_GET['description'] ?? '' ?>">
              <input type="search" autofocus name="category" value="<?= $_GET['category'] ?? '' ?>">
              <input type="search" autofocus name="stock" value="<?= $_GET['stock'] ?? '' ?>">
              <input type="search" autofocus name="price" value="<?= $_GET['price'] ?? '' ?>">
              <input type="search" autofocus name="image" value="<?= $_GET['image'] ?? '' ?>">
              <button class="button is-primary">Search</button>
          </form>
      </div>
    </div>


</div>
<hr>
<div class="columns is-multiline">
    <?php
    $animals = $animal_model->read($_GET['name'] ?? '');
    if ($animals) {
        foreach ($animals as $animal) {
            require './card.php';
        }
    }
    ?>
</div>
</div>