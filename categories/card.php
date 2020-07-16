<div class="card column is-one-quarter">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?= $category['name'] ?></p>
        <p class="title is-4"><?= $category['father_category'] ?></p>
      </div>
    </div>
    <div class="content">
      <a class="button is-link" href="/categories/update.php?id=<?= $category['id'] ?>">Edit</a>
      <a class="button is-danger" href="/categories/delete.php?id=<?= $category['id'] ?>">Delete</a>
    </div>
  </div>
</div>