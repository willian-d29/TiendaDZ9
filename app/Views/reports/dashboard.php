<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Reportes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            margin: auto;
            margin-bottom: 80px;
            height: 40vh;
            width: 80vw;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Dashboard de Reportes</h2>

    <div class="row mb-3">
        <div class="col">
            <div class="btn-group">
                <a href="<?= base_url('reports/export/products/pdf') ?>" class="btn btn-danger">Exportar Productos PDF</a>
                <a href="<?= base_url('reports/export/products/xls') ?>" class="btn btn-success">Exportar Productos XLS</a>
                <a href="<?= base_url('reports/export/products/html') ?>" class="btn btn-info">Exportar Productos HTML</a>
            </div>
        </div>
        <div class="col">
            <div class="btn-group">
                <a href="<?= base_url('reports/export/sales/pdf') ?>" class="btn btn-danger">Exportar Ventas PDF</a>
                <a href="<?= base_url('reports/export/sales/xls') ?>" class="btn btn-success">Exportar Ventas XLS</a>
                <a href="<?= base_url('reports/export/sales/html') ?>" class="btn btn-info">Exportar Ventas HTML</a>
            </div>
        </div>
        <div class="col">
            <div class="btn-group">
                <a href="<?= base_url('reports/export/customers/pdf') ?>" class="btn btn-danger">Exportar Clientes PDF</a>
                <a href="<?= base_url('reports/export/customers/xls') ?>" class="btn btn-success">Exportar Clientes XLS</a>
                <a href="<?= base_url('reports/export/customers/html') ?>" class="btn btn-info">Exportar Clientes HTML</a>
            </div>
        </div>
    </div>

    <div class="chart-container">
        <h3>Stock de Productos</h3>
        <canvas id="productChart"></canvas>
    </div>

    <div class="chart-container">
        <h3>Total de Ventas</h3>
        <canvas id="salesChart"></canvas>
    </div>

    <div class="chart-container">
        <h3>Compras de Clientes</h3>
        <canvas id="clientChart"></canvas>
    </div>

    <div class="chart-container">
        <h3>Ventas por Producto</h3>
        <canvas id="productSalesChart"></canvas>
    </div>
</div>

<script>
    // Datos para el gráfico de productos
    const productNames = <?= json_encode($productNames) ?>;
    const productStocks = <?= json_encode($productStocks) ?>;
    const productColors = productNames.map(() => '#' + Math.floor(Math.random()*16777215).toString(16));

    // Configuración del gráfico de productos
    const productChartConfig = {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Stock de Productos',
                data: productStocks,
                backgroundColor: productColors
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Datos para el gráfico de ventas
    const saleDates = <?= json_encode($saleDates) ?>;
    const salesTotal = <?= json_encode($salesTotal) ?>;
    const saleColors = saleDates.map(() => '#' + Math.floor(Math.random()*16777215).toString(16));

    // Configuración del gráfico de ventas
    const salesChartConfig = {
        type: 'line',
        data: {
            labels: saleDates,
            datasets: [{
                label: 'Total de Ventas',
                data: salesTotal,
                backgroundColor: saleColors,
                borderColor: saleColors,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Datos para el gráfico de clientes
    const clientNames = <?= json_encode($clientNames) ?>;
    const clientPurchases = <?= json_encode($clientPurchases) ?>;
    const clientColors = clientNames.map(() => '#' + Math.floor(Math.random()*16777215).toString(16));

    // Configuración del gráfico de clientes
    const clientChartConfig = {
        type: 'pie',
        data: {
            labels: clientNames,
            datasets: [{
                label: 'Compras de Clientes',
                data: clientPurchases,
                backgroundColor: clientColors
            }]
        },
        options: {
            responsive: true
        }
    };

    // Datos para el gráfico de ventas por producto
    const productSales = <?= json_encode($productSales) ?>;
    const productSalesColors = productNames.map(() => '#' + Math.floor(Math.random()*16777215).toString(16));

    // Configuración del gráfico de ventas por producto
    const productSalesChartConfig = {
        type: 'doughnut',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Ventas por Producto',
                data: productSales,
                backgroundColor: productSalesColors
            }]
        },
        options: {
            responsive: true
        }
    };

    // Renderizar los gráficos
    new Chart(document.getElementById('productChart'), productChartConfig);
    new Chart(document.getElementById('salesChart'), salesChartConfig);
    new Chart(document.getElementById('clientChart'), clientChartConfig);
    new Chart(document.getElementById('productSalesChart'), productSalesChartConfig);
</script>

</body>
</html>
