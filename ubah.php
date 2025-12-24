<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];

    $gambar = null;
    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;

        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = "UPDATE data_barang SET 
            nama='$nama', kategori='$kategori',
            harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok'";

    if ($gambar) {
        $sql .= ", gambar='$gambar'";
    }

    $sql .= " WHERE id_barang='$id'";
    
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

function is_select($var, $val) {
    return $var == $val ? 'selected="selected"' : '';
}

include("header.php");
?>

<h1>Ubah Barang</h1>
<div class="main">
    <form method="post" action="ubah.php" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <option <?= is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                <option <?= is_select('Elektronik', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                <option <?= is_select('Hand Phone', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" value="<?= $data['harga_jual']; ?>" required>
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" value="<?= $data['harga_beli']; ?>" required>
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" value="<?= $data['stok']; ?>" required>
        </div>
        <div class="input">
            <label>File Gambar</label>
            <?php if(!empty($data['gambar'])): ?>
                <div style="margin-bottom: 10px;">
                    <img src="<?= $data['gambar']; ?>" alt="Gambar Saat Ini" width="80" style="border:1px solid #ddd; border-radius:4px;">
                </div>
            <?php endif; ?>
            <input type="file" name="file_gambar">
        </div>
        <input type="hidden" name="id" value="<?= $data['id_barang']; ?>">
        <div class="submit">
            <input type="submit" name="submit" value="Simpan">
            <a href="index.php" class="btn-delete" style="margin-left: 10px; padding: 12px 20px;">Batal</a>
        </div>
    </form>
</div>

<?php
include("footer.php");
?>