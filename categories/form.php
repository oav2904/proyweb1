<section class="section">
    <div class="container">
        <h1 class="title">
            Categoría
        </h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="field">
                <label>Nombre categoría</label>
                <div class="control">
                    <input type="text" name="name" value="<?= $category['name'] ?? '' ?>">
                </div>
            </div>
            <div class="field">
                <label>Categoría Padre</label>
                <div class="control">
                    <input type="text" name="father_category" value="<?= $category['father_category'] ?? null ?>">
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