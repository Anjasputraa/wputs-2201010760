<?php
include_once("koneksidb.php");
session_start();

if (isset($_SESSION['username'])) {
    header("location: dashboard.php");
}

$username   = "";
$passkey    = "";
$err        = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $passkey    = $_POST['password'];
    if ($username == '' or $passkey == '') {
        $err .= "<li> Silahkan masukkan Username dan Password! </li>";
    }
    if (empty($err)) {
        $sql    = "SELECT * FROM tbusers WHERE username= '$username'";
        $hasil  = mysqli_query($cnn, $sql);
        $r1     = mysqli_fetch_array($hasil);
        if ($r1['passkey'] != md5($passkey)) {
            $err .= "<li> Username atau Password salah! </li>";
        }
    }
    if (empty($err)) {
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

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

        .login {
            width: 460px;
            height: min-content;
            padding: 20px;
            border-radius: 12px;
            background-color: rgb(214, 235, 250);
        }

        .login h1 {
            font-size: 36px;
            margin-bottom: 25px;
            margin-top: 18px;
        }

        .login form .form-group {
            margin-bottom: 12px;
        }

        .login form input {
            font-size: 17px;
            margin-top: 15px;
        }
    </style>

</head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1> <br>
        <?php
        if ($err) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "<ul>$err</ul>" ?>
            </div> <?php
                }
                    ?>
        <form action="login.php" method="POST">

            <div class="form-group">
                <label class="form-label" for="username">Username :</label>
                <input class="form-control" type="text" name="username" placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password :</label>
                <input class="form-control" type="password" name="password" placeholder="Masukkan password">
            </div>

            <button class="btn btn-success w-100" type="submit" name="login"> Login </button>

            <div> <br>
                Belum punya akun? <a href="register.php"> Register </a>
            </div>

        </form>
    </div>
</body>

</html>
