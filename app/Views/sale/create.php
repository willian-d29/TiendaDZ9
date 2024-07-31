<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Venta</title>
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
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
    </style>
    <script>
        function updateTotal() {
            let total = 0;
            const quantities = document.querySelectorAll('.product-quantity');
            quantities.forEach(quantityInput => {
                const productId = quantityInput.dataset.productId;
                const price = parseFloat(document.querySelector(`#product-price-${productId}`).value);
                const quantity = parseInt(quantityInput.value);
                total += price * quantity;
            });
            document.getElementById('total').value = total.toFixed(2);
        }

        function toggleQuantityInput(checkbox) {
            const quantityInput = document.querySelector(`#quantity-${checkbox.dataset.productId}`);
            quantityInput.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                quantityInput.value = 0;
                updateTotal();
            }
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1><i class="fas fa-cart-plus"></i> Crear Nueva Venta</h1>
    <form action="<?= base_url('sales/store') ?>" method="post">
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="created" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="client">Cliente:</label>
            <select name="client_id" class="form-control" required>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" id="total" name="total" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="products">Productos:</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Producto</th>
                        <th>Precio ($)</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><input type="checkbox" id="product-<?= $product['id'] ?>" data-product-id="<?= $product['id'] ?>" onclick="toggleQuantityInput(this)"></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?><input type="hidden" id="product-price-<?= $product['id'] ?>" value="<?= $product['price'] ?>"></td>
                            <td><input type="number" id="quantity-<?= $product['id'] ?>" class="form-control product-quantity" name="products[<?= $product['id'] ?>]" min="0" data-product-id="<?= $product['id'] ?>" value="0" disabled onchange="updateTotal()"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Guardar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
