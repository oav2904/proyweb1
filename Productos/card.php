<div class="card column is-one-quarter">
  <div class="card-content">
    <div class="media">
    <div class="media-left">
        <figure class="image is-48x48">
          <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4"><?= $product['name'] ?></p>
        <p class="title is-4"><?= $product['description'] ?></p>
        <p class="title is-4"><?= $product['category'] ?></p>
        <p class="title is-4"><?= $product['stock'] ?></p>
        <p class="title is-4"><?= $product['price'] ?></p>
      </div>
    </div>
    <div class="content">
        <a class="button is-link" href="/productos/update.php?id=<?=$product['id']?>">Edit</a>
        <a class="button is-danger" href="/productos/delete.php?id=<?=$product['id']?>">Delete</a>
    </div>
  </div>
</div>