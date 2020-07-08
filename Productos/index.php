<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
 ?>

<div class="container">

<div class="container">

    <div class="columns">
      <div class="column is-half">
          <h1>Animals</h1>
          <a class="button is-success" href="/animals/create.php">New Animal</a>
      </div>
      <div class="column is-half">
          <form method="GET">
              <input type="search" autofocus name="name" value="<?= $_GET['name'] ?? '' ?>">
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