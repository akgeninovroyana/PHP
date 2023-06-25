<?php 
    include "../connect/koneksi.php";
    if(isset($_GET['kode'])&&$_GET['aksi']=="hapus"){
        mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$_GET[kode]'");
        header("Location: tampilAdmin.php");
    }
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="stylehome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    </head>
    <body>
    <div class="content">
        <span>GO EASY</span>
    </div>
        <div class="navigation">
            <ul>
                <li>
                    <a href="home.php">
                        <span class="icon">
                            <i class="fa fa-house"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa-solid fa-database"></i>
                        </span>
                        <span class="title">Data</span>
                    </a>
                    <div class="list">
                        <ul>
                            <li><a href="tampilAdmin.php">Data Admin</a></li>
                            <li><a href="tampilPelanggan.php">Data Pelanggan</a></li>
                            <li><a href="tampilPegawai.php">Data Pegawai</a></li>
                            <li><a href="tampilKantor.php">Data Kantor</a></li>
                            <li><a href="TampilOrder.php">Data Pesanan</a></li>
                            <li><a href="TampilProduk.php">Data Produk</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="logout.php">
                        <div class="keluar">
                        <span class="icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        <span class="title">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    
            <div class="main-content"> 
                <main>
                <div class="data">
                    <span>Data Admin</span>
                </div>
                    <div class="tabelHasil">
                        <table border=1>
                        <thead>
                            <tr>
                                <th colspan=2>Aksi</th>
                                <th>No.</th>
                                <th>Id Admin</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $ambil = mysqli_query($koneksi, "SELECT * FROM admin");
                                while ($tampil = mysqli_fetch_array($ambil)){
                                    echo "
                                        <tr>
                                            <td>
                                                <a href='ubahFormAdmin.php?kode=$tampil[id_admin]&aksi=edit'>
                                                    <span class='icon-action'><i class='fa-solid fa-pen-to-square'></i></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href='?kode=$tampil[id_admin]&aksi=hapus'>
                                                    <span class='icon-action'><i class='fa-solid fa-trash'></i></span>
                                                </a>
                                            </td>
                                            <td>$no</td>
                                            <td>$tampil[id_admin]</td>
                                            <td>$tampil[nama]</td>
                                            <td>$tampil[username]</td>
                                            <td>$tampil[email]</td>
                                            <td>$tampil[password]</td>
                                        </tr>";
                                    
                                    $no++;
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </main>
            </div>
    </body>
    </html>