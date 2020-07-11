<form method="POST"  enctype="multipart/form-data">
    <label>Producto</label>
    <input type="text" name="name" value="<?= $product['name'] ?? '' ?>">
    <label>Descripción</label>
    <input type="text" name="description" value="<?= $product['description'] ?? '' ?>">
    <label>Categoría</label>
    <input type="text" name="category" value="<?= $product['category'] ?? '' ?>">
    <label>Stock</label>
    <input type="number" name="stock" value="<?= $product['stock'] ?? '' ?>">
    <label>Precio</label>
    <input type="text" name="price" value="<?= $product['price'] ?? '' ?>">
    <label>Imagen</label>
    <input type="file" name="image" accept="image/png, .jpeg, .jpg " value="<?= $product['imagen'] ?? '' ?>"  >
    <button>Save</button>
</form>