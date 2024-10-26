<?php
session_start();
session_destroy();
header('Location: login.php'); // Ganti dengan halaman login
exit();
?>
