<div class="container">

    <?php if (session()->get('user') == $post['user']) { ?>

        <h2 class="mb-4">Editar publicación</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="<?= base_url('publication/edit/'.$post['id']) ?>" method="post">

                    <textarea 
                    class="form-control mb-3" name="content" rows="3"><?= $post['content'] ?>
                    </textarea>

                    <button class="btn btn-primary">Actualizar</button>
                    <a href="<?= base_url('publication') ?>" class="btn btn-secondary">Cancelar</a>

                </form>
            </div>
        </div>

    <?php } else { ?>

        <div class="alert alert-danger">
            No tienes permiso.
        </div>

    <?php } ?>

</div>