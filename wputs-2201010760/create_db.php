<?php
include_once("koneksidb.php");

$cnn    = mysqli_connect($db_host, $db_user, $db_pass);

if ($cnn) {
    echo "Koneksi Sukses";
    $sql = "CREATE DATABASE " . $db_name;

    $hasil = mysqli_query($cnn, $sql);

    if ($hasil) {
        echo "Database " . $db_name . " berhasil dibuat";
    } else {
        echo "Database " . $db_name . " gagal dibuat";
    }
} else {
    echo "Koneksi Gagal<br>" . mysqli_connect_error();
}
