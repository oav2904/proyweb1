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
                    <select name="father_category">
                      <option value="<?= $category['father_category'] ?? null ?>"><?= $category['name'] ?? 'Selecione' ?></option>   
                        <?php
                        $category = $category_model->chargeselectca();
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
            <div class="field is-grouped">
                <div class="control">
                    <button>Save</button>
                </div>
            </div>
        </form>
    </div>
</section>