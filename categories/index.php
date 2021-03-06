<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
require_once '../shared/guard.php';
if($_GET){
    $father_category = $_GET['id'];
}
?>

<div class="container">
<?php
    if ($_SESSION['user_admin'] == 't') {
    ?>

    <div class="container">

        <div class="columns">
            <div class="column is-half">
                <h1>Categorías</h1>
                <a class="button is-success" href="/categories/create.php">Nueva Categoría</a>
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
        $categories = $category_model->read($_GET['name'] ?? '',$father_category);
        if ($categories) {
            foreach ($categories as $category) {
                require './card.php';
            }
        }
        ?>
    </div>
</div>