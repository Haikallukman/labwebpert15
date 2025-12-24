<?php
include_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_cek = "SELECT gambar FROM data_barang WHERE id_barang='$id'";
    $result_cek = mysqli_query($conn, $sql_cek);
    $data = mysqli_fetch_array($result_cek);

    if ($data && $data['gambar'] != null) {
        if (file_exists($data['gambar'])) {
            unlink($data['gambar']);
        }
    }

    $sql = "DELETE FROM data_barang WHERE id_barang='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}
?>