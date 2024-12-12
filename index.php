<?php
include('db.php'); // Incluir la conexión a la base de datos

// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo con Navbar y Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar de Bootstrap -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Mi Sitio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Panel de Administrador</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Contenedor para las tarjetas -->
  <div class="container mt-5">
    <div class="row">
      <?php
      if ($result->num_rows > 0) {
        // Mostrar productos en tarjetas
        while($row = $result->fetch_assoc()) {
          echo '<div class="col-md-4 mb-4">';
          echo '  <div class="card" style="width: 18rem;">';
          echo '    <img src="uploads/' . $row['imagen'] . '" class="card-img-top" alt="...">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">' . $row['nombre'] . '</h5>';
          echo '      <p class="card-text">' . $row['descripcion'] . '</p>';
          echo '      <a href="producto.php?id=' . $row['id'] . '" class="btn btn-primary">Ver Producto</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
      } else {
        echo "No hay productos disponibles.";
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
