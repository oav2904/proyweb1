<?php
require_once './shared/header.php';
require_once './shared/guard.php';
require_once './shared/db.php';
$results = $user_model->find($_SESSION['user_id']);
$sumproducts = $factura_model->proVendidos();
$totalproducts = $factura_model->totalVentas();
?>
<section class="section">
  <div class="container">
    <h1 class="title">
      Welcome <?= $results[0]['f_name']. ' '. 
      $results[0]['f_lastname']. ' '. 
      $results[0]['s_lastname'] ?>
    </h1>
    <p class="subtitle">
      La cantidad de productos vendidos es <?= $sumproducts[0]['sum'] ?> unidades
    </p>
    <p class="subtitle">
      El monto total de ventas es de <?= $totalproducts[0]['sum'] ?> colones
    </p>
  </div>
</section>


<?php require_once './shared/footer.php' ?>