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
        if($category['father_category'] == null){
      ?>
        <button class="button is-link" href="">Ver subcategorias
          <form action="subcategories.php?id=<?php echo $category['id']?>" method="get">
            <input type="hidden" id="id" name="id" value="<?php echo $category['id'] ?? null ?>">
      </button>
      <?php
      } 
      else{
    
      ?>
       <button class="button is-link" href="">Ver productos
          <form action="products/index.php?id=<?php echo $category['id']?>" method="get">
            <input type="hidden" id="id" name="id" value="<?php echo $category['id'] ?? null ?>">
      <?php
      }
    }
      ?>
    </div>
  </div>
</div>