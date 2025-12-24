<?php
include("header.php");

$q = "";
$sql_where = "";

if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = " WHERE nama LIKE '%{$q}%'";
}

$sql_count = "SELECT COUNT(*) FROM data_barang";
if (!empty($sql_where)) {
    $sql_count .= $sql_where;
}
$result_count = mysqli_query($conn, $sql_count);
$count = 0;
if ($result_count) {
    $r_data = mysqli_fetch_row($result_count);
    $count = $r_data[0];
}

$per_page = 2;
$num_page = ceil($count / $per_page);
$limit = $per_page;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $offset = ($page - 1) * $per_page;
} else {
    $offset = 0;
    $page = 1;
}

$sql = "SELECT * FROM data_barang";
if (!empty($sql_where)) {
    $sql .= $sql_where;
}
$sql .= " LIMIT {$offset}, {$limit}";
$result = mysqli_query($conn, $sql);
?>

<h1>Data Barang</h1>

<div class="header-actions">
    <a href="tambah.php" class="btn-add">+ Tambah Barang</a>

    <form action="" method="get" class="search-form">
        <input type="text" name="q" placeholder="Cari nama barang..." value="<?php echo $q ?>">
        <input type="submit" name="submit" value="Cari">
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>
                        <?php if ($row['gambar'] != null && $row['gambar'] != ""): ?>
                            <img src="<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>">
                        <?php else: ?>
                            <span style="font-size: 12px; color: #888;">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="btn-edit">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn-delete"
                            onclick="return confirm('Yakin mau menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align:center; padding: 20px; color: #666;">
                    Data tidak ditemukan.
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<ul class="pagination">
    <?php if ($page > 1): ?>
        <li><a href="?page=<?= $page - 1 ?>&q=<?= $q ?>">&laquo;</a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $num_page; $i++) {
        $link = "?page={$i}";
        if (!empty($q)) $link .= "&q={$q}";
        $class = ($page == $i ? 'active' : '');
        echo "<li><a class=\"{$class}\" href=\"{$link}\">{$i}</a></li>";
    } ?>

    <?php if ($page < $num_page): ?>
        <li><a href="?page=<?= $page + 1 ?>&q=<?= $q ?>">&raquo;</a></li>
    <?php endif; ?>
</ul>

<?php
include("footer.php");
?>