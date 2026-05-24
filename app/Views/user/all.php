<div class="container">

    <h2 class="mb-4">Usuarios</h2>

    <div class="row">
        <?php foreach ($users as $u): ?>
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body text-center">

                        <h5><?= $u['name'] ?></h5>
                        <p class="text-muted"><?= $u['login'] ?></p>

                        <a class="btn btn-sm btn-outline-primary" href="<?= base_url('user/edit/'.$u['id']) ?>">Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="<?= base_url('user/delete/'.$u['id']) ?>">Borrar</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>