<?php
include_once("koneksidb.php");
session_start();

if (!isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>


    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="datamahasiswa.php">Data Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datamatkul.php">Data Mata kuliah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datadosen.php">Data Dosen</a>
                        </li>
                    </ul>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-danger btn-sm me-md-2" data-bs-toggle="modal" data-bs-target="#myModal">Sign out</button></a>
                </div>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Sign Out</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Apakah yakin ingin keluar?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Batal </button>
                                <a href="logout.php"><button type="button" class="btn btn-primary">Yakin</button></a>
                            </div>
                        </div>
        </nav>
    </div>

    <div class="dashboard container"> <br> <br>
        <h1 class="text-center">Selamat Datang!</h1> <br>
        <p class="text-center">Perkenalkan saya Komang Agus Anjas Putra dengan NIM : 2201010760 <br>
            untuk memenuhi Ujian Tengah Semester dalam mata kuliah Pemrograman Web,
            disini saya menerapkan metode Create, Update, Read dan Delete ( CRUD ) untuk mengolah data. 
            Dalam project ini, saya menyelesaikan pengolahan Data Mahasiswa. </p>
    </div>

</body>

</html>
