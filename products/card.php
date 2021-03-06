<div class="card column is-one-quarter">
  <div class="media">
    <div class="media-left">
      <figure class="image is-290x290">
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
      </figure>
      <div class="media-content">
        <p class="title is-4"><?= $product['producto'] ?></p>
        <p class="title is-4"><?=$product['description']?></p>
        <p class="title is-5"><?= $product['price'] ?></p>
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
          <form method="post">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <input type="hidden" name="nombre" value="<?= $product['producto'] ?>">
            <input type="hidden" name="precio" value="<?= $product['price'] ?>">
            <input type="hidden" name="cantidad" value="<?php echo 1; ?>">
            <button name="btnCarrito" value="Agregar" class="button is-link card-footer-item" type="submit">Carrito</button>
          </form>
          <div class="popover is-popover-top">
            <button class="button is-primary popover-trigger" >Ver datalles</button>
            <div class = "popover-content" > 
            <p class="title is-6">SKU <?= $product['id'] ?> </p> 
            <p class="title is-5">Descripción: <br><?=  $product['description'] ?></p>
            </div>
          </div>

        <?php
        }
        ?>
      </footer>
    </div>
  </div>
</div>