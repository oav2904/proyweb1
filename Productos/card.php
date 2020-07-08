<div class="card column is-one-quarter">
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?= $animal['name'] ?></p>
      </div>
    </div>

    <div class="content">
        <a class="button is-link" href="/animals/update.php?id=<?=$animal['id']?>">Edit</a>
        <a class="button is-danger" href="/animals/delete.php?id=<?=$animal['id']?>">Delete</a>
    </div>
  </div>
</div>