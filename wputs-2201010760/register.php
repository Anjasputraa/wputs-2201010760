<?php
include_once("koneksidb.php");
session_start();

$sukses     = "";
$error      = "";

if (isset($_POST["register"])) {
    $nama       = $_POST["nama"];
    $email      = $_POST["email"];
    $username   = $_POST["username"];
    $passkey    = $_POST["password"];
    $konfirmasi = $_POST["konfirmasi"];

    if ($passkey == $konfirmasi) {
        $sql    = "SELECT * FROM tbusers WHERE email='$email'";
        $hasil  = mysqli_query($cnn, $sql);
        if (!$hasil->num_rows > 0) {
            $sql    = "INSERT INTO tbusers(nama,email,username,passkey,iduser) VALUES('$nama','$email','$username','" . md5($passkey) . "','" . md5($nama) . "');";
            $hasil  = mysqli_query($cnn, $sql);
            if ($hasil) {
                $sukses     = "Register Berhasil, Silahkan login dengan username tersebut!";
                $nama       = "";
                $email      = "";
                $username   = "";
                $_POST['password'];
                $_POST['konfirmasi'];
            } else {
                $error = "Gagal membuat register!";
            }
        } else {
            $error = "Email sudah terdaftar";
        }
    } else {
        $error = "Password tidak sama dengan konfirmasi password!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register {
            width: 600px;
            height: min-content;
            padding: 20px;
            border-radius: 12px;
            background-color: rgb(214, 235, 250);
        }

        .register h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .register form .form-group {
            margin-bottom: 12px;
        }

        .register form input {
            font-size: 17px;
            margin-top: 15px;
        }
    </style>

</head>

<body>

    <div class="register">
        <h1 class="text-center">Register</h1>
        <?php
        if ($error) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div> <?php
                }
                    ?>
        <?php
        if ($sukses) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div> <?php
                }
                    ?>

        <form action="register.php" method="POST">

            <div class="form-group">
                <label class="form-label" for="nama">Nama Lengkap User :</label>
                <input class="form-control" type="text" name="nama" placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email :</label>
                <input class="form-control" type="email" name="email" placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label class="form-label" for="username">Username :</label>
                <input class="form-control" type="text" name="username" placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password :</label>
                <input class="form-control" type="password" name="password" placeholder="Masukkan password">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Konfirmasi Password :</label>
                <input class="form-control" type="password" name="konfirmasi" placeholder="Masukkan konfirmasi password">
            </div>

            <button class="btn btn-primary w-100" type="submit" name="register"> Register </button>

            <div> <br>
                sudah punya akun? <a href="login.php"> Login </a>
            </div>

        </form>
    </div>

</body>

</html>
