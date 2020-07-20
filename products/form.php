<?php
require_once '../shared/header.php';
require_once '../shared/db.php';
?>

<section class="section">
    <div class="container">
        <h1 class="title">
            Producto
        </h1>

        <form method="POST" enctype="multipart/form-data">
            <div class="field">
                <label>Nombre producto</label>
                <div class="control">
                    <input type="text" name="name" value="<?= $product['producto'] ?? '' ?>">
                </div>
            </div>
            <div class="field">
                <label>Descripción</label>
                <div class="control">
                    <input type="text" name="description" value="<?= $product['description'] ?? '' ?>">
                </div>
            </div>
            <div class="field">
                <label>Categoría</label>
                <div class="control">
                    <select name="category">

                      <option value="<?= $product['category'] ?? 0 ?>"><?= $product['name'] ?? 'Selecione' ?></option>   
                        <?php
                        $category = $category_model->chargeselect();
                        if ($category) {
                            foreach ($category as $categories) {
                        ?>
                                <option value="<?= $categories['id'] ?>"><?= $categories['name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="field">
                <label>Stock</label>
                <div class="control">
                    <input type="number" name="stock" value="<?= $product['stock'] ?? '' ?>">
                </div>
            </div>
            <div class="field">
                <label>Precio</label>
                <div class="control">
                    <input type="text" name="price" value="<?= $product['price'] ?? '' ?>">
                </div>
            </div>
            <div class="field">
                <label>Imagen</label>
                <div class="control">
                    <input type="file" id="image" name="image" value="<?= $product['imagen'] ?? '' ?>">
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button>Save</button>
                </div>
            </div>
        </form>
    </div>
</section>