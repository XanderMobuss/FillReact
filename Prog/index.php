<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="row">

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sticky-top" style="width: 280px;min-height:  92vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">Home</a>
      </li>
      <li><a href="#" class="nav-link text-white">Dashboard</a></li>
      <li><a href="#" class="nav-link text-white">Orders</a></li>
      <li><a href="#" class="nav-link text-white">Products</a></li>
      <li><a href="#" class="nav-link text-white">Customers</a></li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

  <div class="col-md-9">
    <h2>Productos</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#productoModal">Agregar Producto</button>
    
    <div class="row">
      <?php include 'app/productController.php'; ?>

      <?php if (!empty($productos['data'])): ?>
        <?php foreach ($productos['data'] as $producto): ?>
          <div class="col-md-4">
            <div class="card">
              <img src="<?php echo $producto['cover'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($producto['name']); ?>" class="card-img-top" alt="<?php echo $producto['name']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $producto['name']; ?></h5>
                <p class="card-text"><?php echo $producto['description']; ?></p>
                <a href="details.php?id=<?php echo $producto['id']; ?>"><button class="btn btn-primary">Ver detalles</button></a>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#productoModal" onclick="setProduct('<?php echo htmlspecialchars(json_encode($producto), ENT_QUOTES); ?>')">Editar</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#productoModal" onclick="setProduct('<?php echo htmlspecialchars(json_encode($producto), ENT_QUOTES); ?>')">Eliminar</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No se encontraron productos.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productoModalLabel">Agregar/Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="productoForm">
            <div class="mb-3">
              <label for="productEmail" class="form-label">Correo</label>
              <input type="email" class="form-control" id="productEmail" required>
            </div>
            <div class="mb-3">
              <label for="productPassword" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="productPassword" required>
            </div>
            <div class="mb-3">
              <label for="productName" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" id="productName" required>
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Descripción</label>
              <textarea class="form-control" id="productDescription" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function setProduct(product) {
      product = JSON.parse(product);
      document.getElementById('productEmail').value = ''; 
      document.getElementById('productPassword').value = ''; 
      document.getElementById('productName').value = product.name; 
      document.getElementById('productDescription').value = product.description; 
    }

    

    document.getElementById('productoForm').onsubmit = function(e) {
      e.preventDefault();
      alert('Producto guardado');
      var modal = bootstrap.Modal.getInstance(document.getElementById('productoModal'));
      modal.hide();
    };
  </script>
</body>
</html>
