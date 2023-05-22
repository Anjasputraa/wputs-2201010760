<?php
include_once("koneksidb.php");

$tb_name = "tbmahasiswa";

$sql = "CREATE TABLE $tb_name(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(25) UNIQUE NOT NULL,
    nama VARCHAR(30) NOT NULL,
    alamat VARCHAR(30) NOT NULL,
    email VARCHAR(255) NOT NULL,
    jurusan VARCHAR(30) NOT NULL

);";

$cnn    = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Koneksi Gagal");

$hasil  = mysqli_query($cnn, $sql);
if($hasil){
    echo "Tabel $tb_name, berhasil dibuat";
}else{
    echo "Tabel $tb_name, gagal dibuat";
}

mysqli_close($cnn);
