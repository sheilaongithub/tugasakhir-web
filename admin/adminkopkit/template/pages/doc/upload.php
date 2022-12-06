<?php
 include "../../../../koneksi.php";

 $id = $_POST['id_kafe'];
 $nama = $_POST['nama_kafe'];
 $desc = $_POST['deskripsi'];;

//ketika diklik simpan
if (isset($_POST['simpan'])) {
    //membuat folder berupa images untuk menyimpan gambar yang diupload yaitu di dalam folder pages namanya images
    $direktori = "../images/";  
    //akan disimpan di lokasi file sementara karena nanti gambar akan diubah nama
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    //mengambil tipe file misal .jpg dkk
    $name = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
    //nama gambar akan disimpan sebagai kopiku.jpg atau sesuai tipe file dan nama kafe yang diinputkan
    $nama_baru = $_POST['nama_kafe'].".".$name;
    //memindahkan folder yang sebelumnya disimpan di lokasi file sementara ke folder yang dibuat pada lokal penyimpanan
    move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
    //menyimpan file gambar sesuai dengan nama yang dibuat jadi pada database akan disimpan seperti nama baru
    $gambar = $nama_baru;
    
    //ketika tidak ada gambar yang diupload, jadi di database dibuat null jika upload gambar tdk wajib
    if ($_FILES['gambar']['name'] == null) {
        //nama gambar akan diisi dengan - yang mana nantinya gambar akan ditampilkan default gambar.
        $gambar = '-';
    }
    
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_kafe VALUES ('$id', '$nama', '$desc', '$gambar')");

    header("location:../doc/documentation.php");
}
 ?> 3