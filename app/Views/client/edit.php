<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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
            max-width: 600px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .btn:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2><i class="fas fa-user-edit"></i> Editar Cliente</h2>
    <form action="<?= base_url('/clients/update/'.$client['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre del Cliente</label>
            <input type="text" name="name" class="form-control" value="<?= $client['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" name="ruc" class="form-control" value="<?= $client['ruc'] ?>" required>
        </div>
        <div class="form-group">
            <label for="adress">Dirección</label>
            <input type="text" name="adress" class="form-control" value="<?= $client['adress'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
