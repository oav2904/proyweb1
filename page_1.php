<?php
require_once './shared/header.php';
require_once './shared/guard.php';
require_once './shared/db.php';
$results = $user_model->sumusers();
?>
<section class="section">
  <div class="container">
    <h1 class="title">
      Welcome <?= $results[0]['count'] ?>
    </h1>
    <p class="subtitle">
      Page 1 content
    </p>
  </div>
</section>


<?php require_once './shared/footer.php' ?>