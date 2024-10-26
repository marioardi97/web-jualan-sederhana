<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @media print {
            header, footer, button {
                display: none; /* Sembunyikan header, footer, dan tombol saat dicetak */
            }
            table {
                width: 100%;
                border-collapse: collapse; /* Atur tabel agar tidak ada jarak antar sel */
            }
            th, td {
                border: 1px solid black; /* Tambahkan border pada tabel */
                padding: 5px; /* Tambahkan padding pada sel */
                text-align: left; /* Rata kiri untuk teks di sel */
            }
        }

        .print-button {
            display: flex;
            justify-content: center; /* Pusatkan tombol secara horizontal */
            margin: 20px 0; /* Tambahkan jarak atas dan bawah */
        }

        button {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Pesanan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Panel - Daftar Pesanan</h1>
        <form method="POST" action="logout.php" style="display:inline;">
            <input type="submit" value="Logout" style="background-color: red; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
        </form>
    </header>
    <main>
        <div class="print-button">
            <button onclick="window.print()">
                Cetak Laporan
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Produk</th>
                    <th>WhatsApp</th>
                    <th>Kuantitas</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                $host = 'localhost';
                $db = 'db_shop';
                $user = 'root';
                $pass = '';

                $conn = new mysqli($host, $user, $pass, $db);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT * FROM orders");

                if (!$result) {
                    die("Query Error: " . $conn->error);
                }

                while ($order = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= htmlspecialchars($order['name']) ?></td>
                        <td><?= htmlspecialchars($order['address']) ?></td>
                        <td><?= htmlspecialchars($order['product_name']) ?></td>
                        <td>
                            <a href="https://<?= $order['whatsapp'] ?>" target="_blank">
                                <?= $order['whatsapp'] ?>
                            </a>
                        </td>
                        <td><?= $order['quantity'] ?> kg</td>
                        <td><?= $order['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
