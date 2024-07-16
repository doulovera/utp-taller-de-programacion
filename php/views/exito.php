<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: /oechsle-web/login.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      const usuario = {
        id: '<?php echo $_SESSION['id']; ?>',
        email: '<?php echo $_SESSION['email']; ?>',
        nombre: '<?php echo $_SESSION['nombre']; ?>',
        avatar: '<?php echo $_SESSION['avatar']; ?>',
        productos: JSON.parse('<?php echo $_SESSION['productos']; ?>' || '[]'),
      }

      localStorage.setItem('usuario', JSON.stringify(usuario));
      window.location.href = '/oechsle-web/index.html';
    </script>
  </head>
</html>