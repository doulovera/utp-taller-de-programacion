<?php
session_start();
session_destroy();
header('Location: /oechsle-web/index.html');
?>
