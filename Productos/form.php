<form method="POST">
    <label>Animal</label>
    <input type="text" name="name" value="<?= $animal['name'] ?? '' ?>">
    <button>Save</button>
</form>