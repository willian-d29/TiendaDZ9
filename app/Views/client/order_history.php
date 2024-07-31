<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pedidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Historial de Pedidos</h1>
        <ul class="list-group">
            <?php foreach ($sales as $sale): ?>
                <li class="list-group-item">
                    Pedido #<?= $sale['id'] ?> - Total: <?= $sale['total'] ?> $ - Fecha: <?= $sale['created'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
