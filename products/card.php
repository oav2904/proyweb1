<div class="card column is-one-quarter">
  <div class="media">
    <div class="media-left">
      <figure class="image is-290x290">
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
      </figure>
      <div class="media-content">
        <p class="title is-4"><?= $product['id'] ?></p>
        <p class="title is-4"><?= $product['producto'] ?></p>
        <p class="title is-4"><?= $product['name'] ?></p>
        <p class="title is-4"><?= $product['stock'] ?></p>
        <p class="title is-4"><?= $product['price'] ?></p>
      </div>
   
      <footer class="card-footer">
      <?php
      if ($_SESSION['user_admin'] == 't') {
      ?>
        <a class="button is-link card-footer-item" href="/products/update.php?id=<?= $product['id'] ?>">Edit</a>
        <a class="button is-danger card-footer-item " href="/products/delete.php?id=<?= $product['id'] ?>">Delete</a>
      <?php
      } elseif ($_SESSION['user_admin'] == 'f') {
      ?>
        <a class="button is-link card-footer-item" href="">Carrito</a>
        <a class="button is-danger card-footer-item" href="">Ver</a>
      <?php
      }
      ?>
      </footer>
    </div>
  </div>
</div>