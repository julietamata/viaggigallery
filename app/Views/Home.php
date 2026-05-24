

<style>
        .login-wrapper {
            min-height: calc(100vh - 56px);
            display: flex;
        }

    
    .login-left {
        background-color: #2D1B2E;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 40px;
    }

    .login-left h1 {
        font-family: "Playfair Display", serif;
        color: #F5F0E8;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .login-left p {
        color: #E8E0F0;
        font-size: 1.1rem;
        text-align: center;
        max-width: 320px;
        opacity: 0.8;
        line-height: 1.7;
    }

    .login-left .decorative-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: rgba(232, 224, 240, 0.12);
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }

    /* Mitad derecha — crema con formulario */
    .login-right {
        flex: 1;
        background-color: #F5F0E8;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 40px;
    }

    .login-form-box {
        width: 100%;
        max-width: 400px;
    }

    .login-form-box h2 {
        font-family: "Playfair Display", serif;
        font-size: 2rem;
        color: #2D1B2E;
        margin-bottom: 8px;
    }

    .login-form-box .subtitle {
        color: #6B5B6E;
        font-size: 0.95rem;
        margin-bottom: 32px;
    }

    .form-label {
        font-weight: 700;
        color: #2D1B2E;
        font-size: 0.9rem;
        letter-spacing: 0.03em;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
        }

        .login-left {
            padding: 40px 24px;
            min-height: 220px;
        }

        .login-left h1 {
            font-size: 2rem;
        }
    }
</style>

<div class="login-wrapper">

    <!-- Izquierda -->
    <div class="login-left">
        <div class="decorative-circle">🖼</div>
        <h1> Viaggi Gallery </h1>
        <p>Guarda y organiza tus imágenes favoritas de todos tus viajes en un solo lugar.</p>
    </div>

    <!-- Derecha -->
    <div class="login-right">
        <div class="login-form-box">

            <h2>Iniciar sesión</h2>
            <p class="subtitle">Bienvenido de nuevo</p>

            <?php if (session()->getFlashdata('login_error')): ?>
                <div class="alert alert-danger text-center" style="border-radius: 10px;">
                    <?= session()->getFlashdata('login_error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('user/login') ?>" method="post">

                <div class="mb-4">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text"
                           class="form-control custom-input"
                           name="login"
                           placeholder="Tu usuario">
                </div>

                <div class="mb-4">
                    <label class="form-label">Contraseña</label>
                    <input type="password"
                           class="form-control custom-input"
                           name="password"
                           placeholder="••••••••">
                </div>

                <button type="submit" class="btn btn-purple w-100" style="padding: 12px;">
                    Entrar
                </button>

            </form>

            <div class="text-center mt-4">
                <span style="color: #6B5B6E; font-size: 0.9rem;">¿No tienes cuenta?</span>
                <a href="<?= base_url('user/register') ?>"
                   class="btn-outline-register ms-2"
                   style="font-size: 0.9rem; padding: 6px 16px;">
                    Crear cuenta
                </a>
            </div>

        </div>
    </div>

</div>

