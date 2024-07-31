<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Pagar</h1>
        <form action="<?= base_url('client/complete_order') ?>" method="post">
            <div class="form-group">
                <label for="card_number">Número de Tarjeta:</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="card_expiry">Fecha de Expiración:</label>
                <input type="text" name="card_expiry" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="card_cvc">CVC:</label>
                <input type="text" name="card_cvc" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Completar Pedido</button>
        </form>
    </div>
</body>
</html>
