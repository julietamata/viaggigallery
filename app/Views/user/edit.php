<div class="container">
    <h2 class="mb-4">Editar usuario</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= base_url('user/edit/'.$user['id']) ?>" method="post">

                <input class="form-control mb-2" type="text" name="name" value="<?= $user['name'] ?>">
                <input class="form-control mb-3" type="text" name="login" value="<?= $user['login'] ?>">

                <button class="btn btn-primary">Actualizar</button>
                <a href="<?= base_url('user') ?>" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>