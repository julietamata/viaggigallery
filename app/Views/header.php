<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Viaggi Gallery </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --cream:     #F5F0E8;
            --dark-plum: #2D1B2E;
            --plum:      #4A2545;
            --lavender:  #E8E0F0;
            --soft-text: #6B5B6E;
            --white:     #FFFFFF;
        }

        body {
            background-color: var(--cream);
            font-family: "Nunito", sans-serif;
            color: var(--dark-plum);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAVBAR ── */
        .navbar-custom {
            background-color: var(--dark-plum);
            padding: 14px 0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.2);
        }

        .navbar-brand {
            color: var(--lavender) !important;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.03em;
            text-decoration: none;
            transition: color 0.2s;
        }

        .navbar-brand:hover {
            color: var(--white) !important;
        }

        .nav-logo {
            color: var(--white) !important;
            font-family: "Playfair Display", serif;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-decoration: none;
        }

        .user-name {
            color: var(--lavender);
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .btn-logout {
            background-color: transparent;
            border: 1.5px solid var(--lavender);
            color: var(--lavender);
            border-radius: 8px;
            padding: 6px 18px;
            font-size: 0.88rem;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background-color: #aa2525;
            border-color: #aa2525;
            color: white;
        }

        /* ── Botoncitos ── */
        .btn-purple {
            background-color: var(--plum);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 10px 22px;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-purple:hover {
            background-color: var(--dark-plum);
            color: white;
        }

        .btn-delete {
            background-color: #8B3A3A;
            border: none;
            color: white;
            border-radius: 8px;
            padding: 7px 16px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .btn-delete:hover {
            background-color: #5C1F1F;
            color: white;
        }

        .btn-outline-register {
            border: 2px solid var(--plum);
            color: var(--plum);
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 700;
            transition: 0.2s;
            background: transparent;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-register:hover {
            background-color: var(--plum);
            color: white;
        }

        
        .custom-input {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid var(--lavender);
            background-color: var(--white);
            transition: 0.2s;
            font-family: "Nunito", sans-serif;
        }

        .custom-input:focus {
            border-color: var(--plum);
            box-shadow: 0 0 0 3px rgba(74,37,69,0.12);
            outline: none;
        }

        
        .card {
            border: none;
            border-radius: 16px;
            background-color: var(--lavender);
            box-shadow: 0 4px 16px rgba(45,27,46,0.08);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(45,27,46,0.14);
        }

     
        .title-font {
            font-family: "Playfair Display", serif;
            font-weight: 700;
            color: var(--dark-plum);
        }

    
        main {
            flex: 1;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container d-flex align-items-center justify-content-between">

        
        <span class="nav-logo" style="font-size: 1.8rem;"> Viaggi Gallery </span>

      
        <div class="d-flex align-items-center gap-4 position-absolute start-50 translate-middle-x">
            <!-- <a class="navbar-brand" href="<?= base_url('publication') ?>">
                Publicaciones
            </a> -->
            <a class="navbar-brand" href="<?= base_url('gallery') ?>">
                Mis imágenes
            </a>
            <?php if (session()->get('role') === 'admin'): ?>
                <a class="navbar-brand" href="<?= base_url('admin/gallery') ?>">
                    Panel Admin imágenes
                </a>
                <a class="navbar-brand" href="<?= base_url('user') ?>">
                    Panel Admin Usuarios
                </a>
            <?php endif; ?>

            
        </div>

        <!-- Usuario y botón derecha -->
        <?php if (session()->get('user')): ?>
            <div class="d-flex align-items-center gap-3">
                <span class="user-name"><?= session()->get('name') ?></span>
                <a class="btn-logout" href="<?= base_url('user/logout') ?>">Salir</a>
            </div>
        <?php else: ?>
            <div style="width: 120px;"></div>
        <?php endif; ?>

    </div>
</nav>

<main>