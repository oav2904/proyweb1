<?php
require_once './shared/header.php';
require_once './shared/db.php';
?>
<section class="section">
  <div class="container">
    <h1 class="title">
      Sign Up
    </h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $p_name = $_POST['p_nombre'] ?? '';
      $f_lastname = $_POST['p_apellido'] ?? '';
      $s_lastname = $_POST['s_apellido'] ?? '';
      $email = $_POST['mail'] ?? '';
      $password = $_POST['p_contra'] ?? '';
      $repassword = $_POST['s_contra'] ?? '';
      $address = $_POST['address'] ?? '';
      $phone_number = $_POST['phone_number'] ?? '';
      $errors = '';
      if ($password == $repassword) {
        $results = $user_model->create($p_name, $f_lastname, $s_lastname, $email, $password, $address, $phone_number);
        header('Location: /page_1.php');
        exit();
      } else {

        $errors = 'No concuerdan las contraseñas';
      }
    }
    ?>
    <form method="POST">
      <div class="field">
        <label class="label">Name</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" name="p_nombre" type="text" required placeholder="Name input" value="">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">First lastname</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" required placeholder="Lastname input" value="" name="p_apellido">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Second lastname</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Lastname input" value="" name="s_apellido">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" required placeholder="Email input" value="" name="mail">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Phone number</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" required placeholder="Phone number" value="" name="phone_number">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">Address</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" name="address" type="text" required placeholder="Address input" value="">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" required type="password" placeholder="Password input" value="" name="p_contra">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Re~Password</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" required type="password" placeholder="Confirmation password input" value="" name="s_contra">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
        <div class="control">
          <button class="button is-link is-light">Cancel</button>
        </div>
      </div>
      <p class="help is-danger"><?= $errors ?? '' ?></p>
    </form>
  </div>
</section>
<?php require_once './shared/footer.php' ?>