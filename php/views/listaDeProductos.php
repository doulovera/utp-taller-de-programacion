<?php
// Archivo que obtiene los productos
require_once __DIR__ . '/../controllers/productos.php';
require_once __DIR__ . '/../controllers/usuarios.php';

// función para calcular el descuento
function calculateDiscount($price, $discount) {
  return $price - ($price * $discount / 100);
}

$productosController = new ProductosController();

foreach ($productosController->listarProductos() as $product) {
?>
  <div class="product-container">
    <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">

    <small>
      <?= $product['brand']; ?>
    </small>

    <h3>
      <?= $product['name']; ?>
    </h3>

    <div class="precios">
      <div>
        <p>
          Precio de lista
        </p>
        <p class="precio">
          <?= $product['price']; ?>
        </p>
      </div>
      
      <?php if ($product['discount'] > 0) { ?>
        <div>
          <p>
            Descuento
          </p>
          <p class="precio">
            <?= calculateDiscount($product['price'], $product['discount']); ?>
          </p>
        </div>
      <?php } else { ?>
        <div>
          <p>&nbsp;</p>
        </div>
      <?php } ?>
    </div>

    <button class="btn-agregar" id="<?php echo htmlspecialchars($product['id']); ?>">
      Agregar
    </button>
  </div>
  <?php
}
?>
