<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            width: 100%;
            height: auto;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1><?= $product['name'] ?></h1>
        <img src="<?= base_url('uploads/' . $product['image']) ?>" alt="<?= $product['name'] ?>" class="product-image mb-3">
        <p><strong>Precio: </strong><?= $product['price'] ?> $</p>
        <p><?= $product['description'] ?></p>
        <form action="<?= base_url('client/add_to_cart') ?>" method="post">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <div class="form-group">
                <label for="quantity">Cantidad:</label>
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 100px;">
            </div>
            <button type="submit" class="btn btn-success">Añadir al Carrito</button>
        </form>
        <a href="<?= base_url('client/products') ?>" class="btn btn-secondary mt-3">Volver a Productos</a>
    </div>
</body>
</html>
