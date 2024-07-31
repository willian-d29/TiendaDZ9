<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url("https://png.pngtree.com/thumb_back/fh260/background/20230704/pngtree-abstract-geometric-background-in-black-a-fresh-design-perfect-for-presentations-image_3717055.jpg") no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .welcome-message {
            text-align: center;
            margin-top: 50px;
            font-size: 2em;
        }
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .btn-primary, .btn-danger {
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Tienda</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('client/products') ?>">Ver Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('client/cart') ?>">Mis Compras</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('client/checkout') ?>">Proceder al Pago</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('client/order_history') ?>">Historial de Pedidos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/logout') ?>">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="welcome-message">
            <h2>Bienvenido, <?= session()->get('username') ?></h2>
        </div>
        <ul class="list-group mt-4">
            <li class="list-group-item">
                <a href="<?= base_url('client/products') ?>" class="btn btn-primary">Ver Productos</a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('client/cart') ?>" class="btn btn-primary">Ver Carrito</a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('client/checkout') ?>" class="btn btn-primary">Proceder al Pago</a>
            </li>
            <li class="list-group-item">
                <a href="<?= base_url('client/order_history') ?>" class="btn btn-primary">Historial de Pedidos</a>
            </li>
        </ul>
        <a href="<?= base_url('/logout') ?>" class="btn btn-danger mt-4">Cerrar Sesión</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
