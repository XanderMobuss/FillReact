<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 400px;">
            <div class="text-center mb-4">
                <img src="https://www.blucactus.com.mx/wp-content/uploads/2022/05/Blucactus-Cuales-son-las-estrategias-de-mercado-de-McDonalds.png" alt="Logo" class="img-fluid rounded-circle">
            </div>
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="Ingrese su correo" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" method="POST">Entrar</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>