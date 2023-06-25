<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "database";

    $koneksi = mysqli_connect($host, $user, $pass);
        if($koneksi){
            $buka = mysqli_select_db($koneksi,$db);
            echo "";
            if (!$koneksi){
                echo"Koneksi gagal";
            }
        } else {
            echo "MySQL tidak terhubung";
        }
?>
