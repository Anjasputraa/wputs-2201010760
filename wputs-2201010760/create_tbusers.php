<?php
include_once("koneksidb.php");

$tb_name = "tbusers";

$sql = "CREATE TABLE $tb_name(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    email VARCHAR(225) NOT NULL,
    username VARCHAR(20) NOT NULL,
    passkey VARCHAR(255) NOT NULL,
    iduser VARCHAR(255) NOT NULL
);";

$cnn    = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Koneksi Gagal");

$hasil  = mysqli_query($cnn, $sql);
if($hasil){
    echo "Tabel $tb_name, berhasil dibuat";
}else{
    echo "Tabel $tb_name, gagal dibuat";
}

mysqli_close($cnn);
