<?php
session_start();
$host = 'localhost';
$db = 'db_shop';
$user = 'db_shop';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $whatsapp = $_POST['whatsapp'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity']; // Ambil kuantitas dari form

    // Format nomor WhatsApp
    $whatsappFormatted = 'wa.me/62' . preg_replace('/^0/', '', $whatsapp);

    // Simpan data pesanan ke database
    $stmt = $conn->prepare("INSERT INTO orders (name, address, product_name, whatsapp, quantity) VALUES (?, ?, ?, ?, ?)");
    $productName = ($productId == 1) ? 'Kopi Arabika' : 'Kopi Robusta';
    $stmt->bind_param("ssssi", $name, $address, $productName, $whatsappFormatted, $quantity); // Tambahkan quantity
    $stmt->execute();

    // Redirect atau beri pesan sukses
    header('Location: index.php?success=1');
    exit();
}
?>
