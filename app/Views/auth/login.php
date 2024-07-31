<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('https://png.pngtree.com/thumb_back/fh260/background/20230704/pngtree-abstract-geometric-background-in-black-a-fresh-design-perfect-for-presentations-image_3717055.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            display: flex;
            width: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .login-image {
            flex: 1;
            background: url('https://cdn.create.vista.com/downloads/36f3894a-0f53-4950-90af-0e2361841bfa_1024.jpeg') no-repeat center center;
            background-size: cover;
        }

        .login-form {
            flex: 1;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 0 10px 10px 0;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            animation: fadeInDown 1s ease-in-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-form label {
            color: #333;
        }

        .login-form .form-control {
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .login-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .login-form .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .footer-links {
            text-align: center;
            margin-top: 10px;
        }

        .footer-links a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .input-group-text {
            cursor: pointer;
            background-color: white;
            border: 1px solid #ced4da;
            border-left: none;
            display: flex;
            align-items: center;
            height: calc(1.5em + 0.75rem + 2px);
        }

        .input-group .form-control {
            border-right: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Bienvenido, inicia sesión</h2>
            <p>Ingresa tus credenciales para acceder al sistema. Estamos encantados de tenerte de vuelta.</p>
            <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('loginAuth') ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Escribe email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        <span class="input-group-text" id="toggle-password"><i class="fas fa-eye-slash" id="toggle-password-icon"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo de Usuario</label>
                    <select name="type" class="form-control" required>
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
            <div class="footer-links">
                <a href="<?= base_url('register') ?>">Registrarse</a>
            
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('toggle-password-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>
</html>
