<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            border-radius: 5px;
        }
        .btn-primary, .btn-warning, .btn-danger {
            margin: 2px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-warning:hover {
            background-color: #ffca2c;
            border-color: #ffc107;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Productos</h2>
    <a href="<?= base_url('/products/create') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Crear Producto</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Stock</th>
                <th>Fecha de Expiración</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><img src="<?= base_url($product['image']) ?>" alt="<?= $product['name'] ?>" width="50"></td>
                <td><?= $product['code'] ?></td>
                <td><?= $product['stock'] ?></td>
                <td><?= $product['expire'] ?></td>
                <td><?= $product['active'] ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="<?= base_url('/products/edit/'.$product['id']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                    <a href="<?= base_url('/products/delete/'.$product['id']) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
