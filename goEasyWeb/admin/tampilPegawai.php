<?php 
    include "../connect/koneksi.php";
    if(isset($_GET['kode'])&&$_GET['aksi']=="hapus"){
        mysqli_query($koneksi, "DELETE FROM employees WHERE employeNumber = '$_GET[kode]'");
        header("Location: tampilPegawai.php");
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
                    <span>Data Pegawai</span>
                </div>
                    <div class="tabelHasil">
                        <table border=1>
                        <thead>
                            <tr>
                                <th colspan=2>Aksi</th>
                                <th>No.</th>
                                <th>Employee Number</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Extension</th>
                                <th>Email</th>
                                <th>Office Code</th>
                                <th>Reports To</th>
                                <th>Job Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $ambil = mysqli_query($koneksi, "SELECT * FROM employees");
                                while ($tampil = mysqli_fetch_array($ambil)){
                                    echo "
                                        <tr>
                                            <td>
                                                <a href='ubahPegawai.php?kode=$tampil[employeeNumber]'>
                                                    <span class='icon-action'><i class='fa-solid fa-pen-to-square'></i></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href='?kode=$tampil[employeeNumber]&aksi=hapus'>
                                                    <span class='icon-action'><i class='fa-solid fa-trash'></i></span>
                                                </a>
                                            </td>
                                            <td>$no</td>
                                            <td>$tampil[employeeNumber]</td>
                                            <td>$tampil[lastName]</td>
                                            <td>$tampil[firstName]</td>
                                            <td>$tampil[extension]</td>
                                            <td>$tampil[email]</td>
                                            <td>$tampil[officeCode]</td>
                                            <td>$tampil[reportsTo]</td>
                                            <td>$tampil[jobTitle]</td>
                                        </tr>";
                                    
                                    $no++;
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </main>
            </div>
            <a href="tambahPegawai.php">
                <button class="add-float">
                    <i class="fa-solid fa-circle-plus fa-3x"></i>
                    <span>Tambah Pegawai</span>
                </button>
            </a>
    </body>
    </html>