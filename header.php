<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" />
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <a href="index.php" class="logo">INVENTORY SYSTEM</a>
            <div class="nav-links">
                <a href="index.php">Dashboard</a>
                <a href="tambah.php">Tambah Barang</a>
                <a href="#" style="color: #FFFFFFFF;">Login</a>
            </div>
        </div>
    </nav>
    <div class="container">