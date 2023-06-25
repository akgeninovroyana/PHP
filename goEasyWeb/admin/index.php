<?php
    session_start();
    include "../connect/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleindex.css">
    <title>Login</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <h2>ADMIN</h2>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="masuk()">Masuk</button>
                <button type="button" class="toggle-btn" onclick="daftar()">Daftar</button>
            </div>
            <form method="post" id="masuk" class="input-group">
                <input type="text" name="in-username" class="kolom" placeholder="Username" required>
                <input type="password" name="in-password" class="kolom" placeholder="Password" required>
                <button type="submit" class="submit" name="btn-masuk">Masuk</button>
            </form>
            <form id="daftar" method="POST" action="" class="input-group">
                <input type="text" class="kolom" name="re-name" placeholder="Nama" required>
                <input type="email" class="kolom" name="re-email" placeholder="Email" required>
                <input type="text" class="kolom" name="re-username" placeholder="Username" required>
                <input type="password" class="kolom" name="re-password" placeholder="Password" required>
                <input type="password" class="kolom" name="re-password2" placeholder="Konfirmasi Password" required>
                <button type="submit" class="submit" name="btn-daftar">Daftar</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("masuk");
        var y = document.getElementById("daftar");
        var z = document.getElementById("btn");

        function daftar(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function masuk(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
            <?php
                if(isset($_POST['btn-masuk'])){
                    $inusername = $_POST['in-username'];
                    $inpassword = $_POST['in-password'];
                    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$inusername'");
                    if(mysqli_num_rows($query) == 1){
                        $row = mysqli_fetch_assoc($query);
                        if(password_verify($inpassword, $row['password'])){
                            $_SESSION['userweb'] = $inusername;
                            header("location:home.php");
                            exit;
                        } else {
                            echo "<script> alert('Maaf, username dan password salah') </script>";
                        }
                    } 
                    exit;
                }
                if(isset($_POST['btn-daftar'])){
                    $name = $_POST['re-name'];
                    $email = $_POST['re-email'];
                    $username = $_POST['re-username'];
                    $password = $_POST['re-password'];
                    $password2 = $_POST['re-password2'];
                    if($password !== $password2){
                        echo "<script> alert('Konfirmasi password tidak sesuai') </script>";
                    } else {
                        $password = password_hash($_POST['re-password'], PASSWORD_DEFAULT);
                        $query = mysqli_query($koneksi, "INSERT INTO admin VALUES('', '$name', '$email', '$username', '$password')");
                        if($query){
                            echo "<script> alert('Berhasil daftar') </script>";
                        }
                    }
                    exit;
                }
            ?>
</body>
</html>