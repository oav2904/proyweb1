<?php
require_once './shared/header.php';
require_once './shared/guard.php';
$results = $user_model->find($_SESSION['user_id']);
$sumproducts =  $user_model->proAddforClient($_SESSION['user_id']);
$totalproducts = $user_model->proSumforClient($_SESSION['user_id']);
?>

<section class="section">
  <div class="container">
    <h1 class="title">
      Bienvenido <?= $results[0]['f_name']. ' '. $results[0]['f_lastname']. ' '. $results[0]['s_lastname'] ?>
    </h1>
    <p class="subtitle">
      Total de productos adquiridos por el cliente <?= $sumproducts[0]['sum'] ?> unidades
    </p>
    <p class="subtitle">
      Monto total de compras realizadas por el cliente <?= $totalproducts[0]['sum'] ?> colones
    </p>
  </div>
</section>
<?php require_once './shared/footer.php' ?>