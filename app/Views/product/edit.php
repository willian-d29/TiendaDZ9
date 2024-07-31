<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        img {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Editar Producto</h2>
    <form action="<?= base_url('/products/update/'.$product['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nombre del Producto</label>
            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" class="form-control" value="<?= $product['code'] ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" value="<?= $product['stock'] ?>" required>
        </div>
        <div class="form-group">
            <label for="expire">Fecha de Expiración</label>
            <input type="date" name="expire" class="form-control" value="<?= $product['expire'] ?>">
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image" class="form-control">
            <input type="hidden" name="current_image" value="<?= $product['image'] ?>">
            <?php if ($product['image']): ?>
                <img src="<?= base_url($product['image']) ?>" alt="Imagen del Producto" width="100">
            <?php endif; ?>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" value="1" <?= $product['active'] ? 'checked' : '' ?>>
            <label for="active" class="form-check-label">Activo</label>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
