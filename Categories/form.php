<form method="POST" enctype="multipart/form-data">
    <label>Nombre</label>
    <input type="text" name="name" value="<?= $category['name'] ?? '' ?>">
    <label>Categoría Padre</label>
    <input type="text" name="father_category" value="<?= $category['father_category'] ?? '' ?>">
    <button>Save</button>
</form>