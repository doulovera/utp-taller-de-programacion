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

<script>
  const $agregarProducto = document.querySelectorAll('.btn-agregar');

  $agregarProducto.forEach((btn) => {
    btn.addEventListener('click', async () => {
      const productId = btn.id;
      const usuario = localStorage.getItem('usuario');

      if (!usuario) {
        alert('Debes iniciar sesión para agregar productos');
        return;
      }

      const { id: userId } = JSON.parse(usuario);

      const response = await fetch('/oechsle-web/php/views/agregarProductoAUsuario.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `productId=${Number(productId)}&userId=${userId}`,
      });

      const data = await response.json();

      if (data.success) {
        alert('Producto agregado correctamente');
      } else {
        alert('Ocurrió un error al agregar el producto');
      }
    });
  });
</script>
