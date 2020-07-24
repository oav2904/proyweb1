<div class="card column is-one-quarter">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?= $category['name'] ?></p>
      </div>
    </div>
    <div class="content">
      <?php
      if ($_SESSION['user_admin'] == 't') {
      ?>
        <a class="button is-link" href="/categories/update.php?id=<?= $category['id'] ?>">Edit</a>
        <a class="button is-danger" href="/categories/delete.php?id=<?= $category['id'] ?>">Delete</a>
      <?php
      } elseif ($_SESSION['user_admin'] == 'f') {
      ?>
        <a class="button is-link" href="">Carrito</a>
        <a class="button is-danger" href="">Ver</a>
      <?php
      }
      ?>
    </div>
  </div>
</div>