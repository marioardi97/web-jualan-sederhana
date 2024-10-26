<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopitem - Jual Kopi Online</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function openOrderForm(productId, productName) {
            document.getElementById('orderForm').style.display = 'flex';
            document.getElementById('productId').value = productId;
            document.getElementById('selectedProduct').innerText = productName; // Menampilkan produk yang dipilih

            // Scroll ke form
            document.getElementById('orderForm').scrollIntoView({ behavior: 'smooth' });
        }

        function showPopup() {
            document.getElementById('successPopup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('successPopup').style.display = 'none';
            window.location.href = 'https://shop.marioardi.dev'; // Redirect ke halaman utama
        }

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                showPopup();
            }
        };
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: #a5693f;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        h1, h2 {
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin: 1rem;
            text-align: center;
            width: 250px;
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-card h3 {
            margin-top: 1rem;
        }

        .product-card p {
            margin-bottom: 1rem;
        }

        .product-card button {
            background-color: #a5693f;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-card button:hover {
            background-color: #804c29;
        }

        footer {
            background-color: #a5693f;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        #orderForm {
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0; 
            background-color: rgba(0,0,0,0.7); 
            z-index: 1000; 
            justify-content: center; 
            align-items: center;
        }

        #orderForm div {
            background-color: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="submit"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #a5693f;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #804c29;
        }

        #successPopup {
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0; 
            background-color: rgba(0,0,0,0.5); 
            z-index: 1000; 
            justify-content: center; 
            align-items: center;
        }

        #successPopup div {
            background: white; 
            padding: 20px; 
            border-radius: 5px; 
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kopitem - Jual Kopi Online</h1>
    </header>
    <main>
        <div class="container">
            <h2>Produk Kopi</h2>
            <div class="product-card">
                <img src="kopi-arabika.jpg" alt="Kopi Arabika">
                <h3>Kopi Arabika</h3>
                <p>Rp 50.000</p>
                <button onclick="openOrderForm(1, 'Kopi Arabika')">Beli</button>
            </div>
            <div class="product-card">
                <img src="kopi-robusta.jpg" alt="Kopi Robusta">
                <h3>Kopi Robusta</h3>
                <p>Rp 40.000</p>
                <button onclick="openOrderForm(2, 'Kopi Robusta')">Beli</button>
            </div>

            <!-- Form Pemesanan -->
            <div id="orderForm">
                <div>
                    <h3>Form Pemesanan</h3>
                    <p>Anda telah memilih: <strong id="selectedProduct"></strong></p>
                    <form method="POST" action="order.php">
                        <input type="hidden" id="productId" name="productId">
                        <label for="quantity">Kuantitas (kg):</label>
                        <select id="quantity" name="quantity" required>
                            <option value="">Pilih kuantitas</option>
                            <option value="1">1 kg</option>
                            <option value="2">2 kg</option>
                            <option value="3">3 kg</option>
                            <option value="4">4 kg</option>
                            <option value="5">5 kg</option>
                        </select>
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required>
                        <label for="address">Alamat:</label>
                        <input type="text" id="address" name="address" required>
                        <label for="whatsapp">Nomor WhatsApp:</label>
                        <input type="text" id="whatsapp" name="whatsapp" required>
                        <input type="submit" value="Kirim Pesanan">
                    </form>
                    <button onclick="document.getElementById('orderForm').style.display='none'">Tutup</button>
                </div>
            </div>

            <!-- Popup Pesanan Berhasil -->
            <div id="successPopup">
                <div>
                    <h3>Pesanan Berhasil!</h3>
                    <p>Admin akan menghubungi Anda segera.</p>
                    <button onclick="closePopup()">Tutup</button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Kopitem - Jual Kopi Online</p>
    </footer>
</body>
</html>
