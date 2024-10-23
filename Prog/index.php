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
        </ul>
      </div>
    </div>
  </nav>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sticky-top" style="width: 280px; min-height: 92vh;">
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
  </div>

  <div class="col-md-9">
    <h2>Productos</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Agregar Producto</button>
    
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
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal" onclick="setProduct('<?php echo htmlspecialchars(json_encode($producto), ENT_QUOTES); ?>')">Editar</button>
                <button class="btn btn-danger" onclick="deleteProduct(<?php echo $producto['id']; ?>)">Eliminar</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No se encontraron productos.</p>
      <?php endif; ?>
    </div>
  </div>

  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addProductForm">
            <div class="mb-3">
              <label for="addProductName" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" id="addProductName" required>
            </div>
            <div class="mb-3">
              <label for="addProductDescription" class="form-label">Descripción</label>
              <textarea class="form-control" id="addProductDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="addProductFeatures" class="form-label">Características</label>
              <textarea class="form-control" id="addProductFeatures" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="addProductSlug" class="form-label">Slug</label>
              <input type="text" class="form-control" id="addProductSlug" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editProductForm">
            <input type="hidden" id="editProductId">
            <div class="mb-3">
              <label for="editProductName" class="form-label">Nombre del Producto</label>
              <input type="text" class="form-control" id="editProductName" required>
            </div>
            <div class="mb-3">
              <label for="editProductDescription" class="form-label">Descripción</label>
              <textarea class="form-control" id="editProductDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="editProductFeatures" class="form-label">Características</label>
              <textarea class="form-control" id="editProductFeatures" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="editProductSlug" class="form-label">Slug</label>
              <input type="text" class="form-control" id="editProductSlug">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function setProduct(product) {
      product = JSON.parse(product);
      document.getElementById('editProductId').value = product.id;
      document.getElementById('editProductName').value = product.name;
      document.getElementById('editProductDescription').value = product.description;
      document.getElementById('editProductFeatures').value = product.features;
      document.getElementById('editProductSlug').value = product.slug;
    }

    document.getElementById('addProductForm').onsubmit = function(e) {
      e.preventDefault();
      const data = {
        name: document.getElementById('addProductName').value,
        description: document.getElementById('addProductDescription').value,
        features: document.getElementById('addProductFeatures').value,
        slug: document.getElementById('addProductSlug').value
      };

      fetch('https://crud.jonathansoto.mx/api/products', {
        method: 'POST',
        headers: {
          'Authorization': 'Bearer 422|3swFeMEYBqDdjOsxSxr6gjMlFF5bix3kxg2qffuG',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(result => {
        alert('Producto agregado con éxito');
        location.reload();
      })
      .catch(error => {
        alert('Error al agregar el producto: ' + error.message);
      });
    };

    document.getElementById('editProductForm').onsubmit = function(e) {
      e.preventDefault();
      const data = {
        id: document.getElementById('editProductId').value,
        name: document.getElementById('editProductName').value,
        description: document.getElementById('editProductDescription').value,
        features: document.getElementById('editProductFeatures').value,
        slug: document.getElementById('editProductSlug').value
      };

      fetch(`https://crud.jonathansoto.mx/api/products/${data.id}`, {
        method: 'PUT',
        headers: {
          'Authorization': 'Bearer 422|3swFeMEYBqDdjOsxSxr6gjMlFF5bix3kxg2qffuG',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(result => {
        alert('Producto actualizado con éxito');
        location.reload();
      })
      .catch(error => {
        alert('Error al actualizar el producto: ' + error.message);
      });
    };

    function deleteProduct(id) {
      if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        fetch(`https://crud.jonathansoto.mx/api/products/${id}`, {
          method: 'DELETE',
          headers: {
            'Authorization': 'Bearer 422|3swFeMEYBqDdjOsxSxr6gjMlFF5bix3kxg2qffuG'
          }
        })
        .then(response => {
          if (response.ok) {
            alert('Producto eliminado con éxito');
            location.reload();
          } else {
            alert('Error al eliminar el producto');
          }
        })
        .catch(error => {
          alert('Error al eliminar el producto: ' + error.message);
        });
      }
    }
  </script>
</body>
</html>
