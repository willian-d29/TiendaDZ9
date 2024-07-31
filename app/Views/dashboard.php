+<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: #f8f9fa;
        }
        .sidebar {
            min-width: 400px;
            max-width: 400px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            font-size: 20px; 
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .content {
            margin-left: 400px;
            padding: 20px;
            flex: 1;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 2em;
            font-weight: bold;
        }
        .card-text {
            font-size: 1.2em;
        }
        .profile-section {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .profile-section h3 {
            margin-top: 10px;
            color: white;
        }
        .profile-section p {
            color: #d1d1d1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <img src="https://previews.123rf.com/images/yupiramos/yupiramos1405/yupiramos140502114/28549075-dise%C3%B1o-de-perfil-sobre-fondo-azul-ilustraci%C3%B3n-vectorial.jpg" alt="Profile Picture">
            <h3>WillianDev</h3>
            <p>Rol: Administrator</p>
        </div>
        <h2 style="text-align: center;">DZ9 Store</h2>

        <a href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= base_url('products') ?>"><i class="fas fa-box"></i> Gestionar Productos</a>
        <a href="<?= base_url('clients') ?>"><i class="fas fa-users"></i> Gestionar Clientes</a>
        <a href="<?= base_url('sales') ?>"><i class="fas fa-shopping-cart"></i> Gestionar Ventas</a>
        <a href="<?= base_url('admin') ?>"><i class="fas fa-user-cog"></i> Gestionar Usuarios</a>
        <a href="<?= base_url('reports/dashboard') ?>"><i class="fas fa-file-pdf"></i> Reportes</a>
        <a href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
    </div>

    <div class="content">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="card-title"><?= $totalProducts ?></div>
                        <div class="card-text">Productos</div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('products') ?>" class="text-white">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="card-title"><?= $totalSales ?></div>
                        <div class="card-text">Total Ventas</div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('sales') ?>" class="text-white">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="card-title"><?= $totalUsers ?></div>
                        <div class="card-text">Usuarios</div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('admin') ?>" class="text-white">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="card-title"><?= $totalClients ?></div>
                        <div class="card-text">Clientes</div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('clients') ?>" class="text-white">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
