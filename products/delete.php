<?php
require_once '../shared/header.php';
require_once '../shared/db.php';

$id = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_model->delete($id);
    return header("Location: /products");
}

?>
<div class="container">
    <h1 class="title">¿Esta seguro?</h1>
    <form method="POST">
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-danger">Accept</button>
                <a class="delete is-large" href="/products"></a>
            </div>
        </div>
    </form>
</div>