<?= view('header') ?>

<style>
    .gallery-wrapper {
        padding: 40px 0 60px;
    }

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

    .img-owner {
        font-size: 0.75rem;
        color: #4A2545;
        font-weight: 700;
        padding: 2px 8px;
        background: #F5F0E8;
        border-radius: 20px;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #6B5B6E;
    }
</style>

<div class="container gallery-wrapper">

    <h1 class="title-font mb-4">Panel de administrador </h1>

    <?php if (empty($images)): ?>
        <div class="empty-state">
            <div style="font-size:4rem;opacity:.4">🖼</div>
            <p>No hay imágenes subidas todavía.</p>
        </div>
    <?php else: ?>
        <div class="gallery-grid">
            <?php foreach($images as $img): ?>
                <div class="img-card">
                    <img src="<?= base_url('uploads/' . $img['file_name']) ?>"
                         alt="<?= $img['file_name'] ?>">
                    <div class="img-card-body">
                        <div>
                            <div class="img-name"><?= $img['file_name'] ?></div>
                            <span class="img-owner"><?= $img['login'] ?></span>
                        </div>
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