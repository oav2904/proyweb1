<?php
require_once __DIR__ . '/sessions.php';
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?? 'E~Shop San Carlos' ?></title>
  <link rel="stylesheet" type="text/css" href="/css/bulma.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <?php
      if (isset($_SESSION['user_id']) || !empty($_SESSION['user_id'])) {
        $_SESSION['user_admin'];
        $true = 't';
        $false = 'f';
        if ($_SESSION['user_admin'] == $true) {
      ?>
          <a class="navbar-item" href="/page_1.php">
          <?php
        } else {
          ?>
            <a class="navbar-item" href="/page_2.php">
            <?php  }
        } else { ?>
            <a class="navbar-item" href="/">
            <?php }  ?>

            <img src="/imgs/eshop.png">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">

        <?php
        /**
         * array de el navbar
         */
        $menu = $category_model->chargeheader();

        if (isset($_SESSION['user_id']) || !empty($_SESSION['user_id'])) {
          if ($_SESSION['user_admin'] == $true) {
            foreach ($menu as $link) {
              /**
               * array de el navbar
               */
              $menus = array(
                'name' => $link['nameca'],
                'url' => "../categories/index.php?namefo=" . $link['nameca']
              );

              if ($link['father_category'] == null) {
        ?>
              <?php
                echo "<a class='navbar-item' href='" . $menus['url'] . "'>" . $menus['name'] . "</a>";
              }
              ?>
            <?php
            }
          } else { ?>
            <a class="navbar-item" href="../categories/index.php">
              Catálogo
            </a>
            <a class="navbar-item" href="../products/mostrarCarrito.php">
              Carrito(<?php echo count($_SESSION['CARRITO'])?>)
            </a>
        <?php }
        } ?>


      </div>
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <?php if (isset($_SESSION['user_id'])) { ?>
              <h3><?= $_SESSION['user_email'] ?></h3>
              <a class="button is-light" href="/logout.php">
                Log out
              </a>
            <?php } else { ?>
              <a class="button is-primary" href="/register.php">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light" href="/">
                Log in
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </nav>