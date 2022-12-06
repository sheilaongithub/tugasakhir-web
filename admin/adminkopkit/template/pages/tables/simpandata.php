 <?php
 include "../../../../koneksi.php";

 $id = $_POST['id_kategori'];
 $kategori = $_POST['nama_kategori'];

$simpan = mysqli_query($koneksi, "insert into tb_kategori values ('$id', '$kategori')");
if ($simpan) {
}
 ?> 