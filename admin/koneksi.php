<?php
$host='localhost';
$user='root';
$pass='';
$db='db_kopikita';

$koneksi=mysqli_connect($host, $user, $pass);
if ($koneksi) {
    $buka=mysqli_select_db($koneksi,$db);
    if (!$buka) {
    } else {
    }
}
?>