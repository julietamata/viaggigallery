<?php setlocale(LC_TIME, "esp"); ?>

<div class="container publication-container">

    <h2 class="mb-4 title-font">Publicaciones</h2>

    <!-- Formulario -->
    <?php if (isset(session()->user)) { ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="<?= base_url('publication/add') ?>" method="post">
                    <textarea class="form-control mb-2" name="content" rows="3" placeholder="¡Cuéntanos de ti!"></textarea>
                    <button class="btn btn-purple">Publicar</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            Inicia sesión para poder publicar.
        </div>
    <?php } ?>


  


<?php foreach ($posts as $item): ?>
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <strong><?= $item['name']; ?></strong>
                <small class="text-muted">
                    <?= strftime("%d %b %Y %H:%M", strtotime($item['posted_time'])); ?>
                </small>
            </div>

            <p class="mt-2"><?= $item['content']; ?></p>

            <div class="text-end">
                <?php
               
               
               if (isset(session()->user) && session()->user == $item['user']) {
                ?>
                    <a class="btn btn-sm btn-edit"
                       href="<?= base_url('publication/edit/'.$item['id']) ?>">
                       Editar
                    </a>

                    <a class="btn btn-sm btn-delete"
                       href="<?= base_url('publication/delete/'.$item['id']) ?>">
                       Borrar
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
