<?= view('header') ?>
  
<style>
    .gallery-wrapper {
        padding: 40px 0 60px;
    }

    /* Zona de subida */
    .upload-box {
        background-color: white;
        border-radius: 16px;
        padding: 24px 28px;
        margin-bottom: 32px;
        box-shadow: 0 2px 12px rgba(45,27,46,0.07);
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .upload-box input[type="file"] {
        border: 2px dashed #4A2545;
        border-radius: 10px;
        padding: 10px 16px;
        background-color: #F5F0E8;
        color: #2D1B2E;
        font-family: "Nunito", sans-serif;
        cursor: pointer;
        flex: 1;
        min-width: 200px;
    }

    .upload-box input[type="file"]::-webkit-file-upload-button {
        background-color: #4A2545;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-family: "Nunito", sans-serif;
        font-weight: 700;
        cursor: pointer;
        margin-right: 12px;
        transition: 0.2s;
    }

    .upload-box input[type="file"]::-webkit-file-upload-button:hover {
        background-color: #2D1B2E;
    }

    /* Select de orden */
    .order-select {
        width: 200px;
        border-radius: 10px;
        border: 2px solid #4A2545;
        padding: 9px 14px;
        font-weight: 700;
        color: #2D1B2E;
        background-color: white;
        font-family: "Nunito", sans-serif;
        cursor: pointer;
        transition: 0.2s;
    }

    .order-select:focus {
        outline: none;
        border-color: #2D1B2E;
        box-shadow: 0 0 0 3px rgba(74,37,69,0.12);
    }

    /* Grid de imágenes */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 24px;
    }

    .img-card {
        background-color: #E8E0F0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(45,27,46,0.08);
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
    }

    .img-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(45,27,46,0.15);
    }

    .img-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .img-card-body {
        padding: 14px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .img-name {
        font-size: 0.8rem;
        color: #6B5B6E;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px;
    }

    /* Estado vacío */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #6B5B6E;
    }

    .empty-state .empty-icon {
        font-size: 4rem;
        margin-bottom: 16px;
        opacity: 0.4;
    }

    .empty-state p {
        font-size: 1.1rem;
        font-weight: 600;
    }
</style>

<div class="container gallery-wrapper">

    <h1 class="title-font mb-4">Mis imágenes</h1>

    <!-- Subir imagen -->
    <form action="<?= base_url('image/upload') ?>"
          method="post"
          enctype="multipart/form-data">
        <div class="upload-box">
            <input type="file" name="image" required>
            <button type="submit" class="btn btn-purple">
                ↑ Subir imagen
            </button>
        </div>
    </form>

    <!-- Ordenar -->
    <form method="get" class="mb-4">
        <select class="order-select" name="order" onchange="this.form.submit()">
            <option value="recent"  <?= ($order ?? '') == 'recent'    ? 'selected' : '' ?>>Más recientes</option>
            <option value="old"     <?= ($order ?? '') == 'old'       ? 'selected' : '' ?>>Más antiguas</option>
            <option value="name_asc"  <?= ($order ?? '') == 'name_asc'  ? 'selected' : '' ?>>Nombre A-Z</option>
            <option value="name_desc" <?= ($order ?? '') == 'name_desc' ? 'selected' : '' ?>>Nombre Z-A</option>
        </select>
    </form>

    <!-- Grid -->
    <?php if (empty($images)): ?>
        <div class="empty-state">
            <div class="empty-icon">🖼</div>
            <p>Aún no tienes imágenes.<br>¡Sube tu primera foto!</p>
        </div>
    <?php else: ?>
        <div class="gallery-grid">
            <?php foreach($images as $img): ?>
                <div class="img-card">
                    <img src="<?= base_url('uploads/' . $img['file_name']) ?>"
                         alt="<?= $img['file_name'] ?>">
                    <div class="img-card-body">
                        <span class="img-name"><?= $img['file_name'] ?></span>
                        <a class="btn btn-delete"
                           href="<?= base_url('image/delete/' . $img['id']) ?>">
                            Eliminar
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?= view('footer') ?>