<?php 
    include "../connect/koneksi.php";
    $data_produk = mysqli_query($koneksi, "SELECT * FROM products");
    $data_pelanggan = mysqli_query($koneksi, "SELECT * FROM customers");
    $data_pegawai = mysqli_query($koneksi, "SELECT * FROM employees");
    $data_order = mysqli_query($koneksi, "SELECT * FROM orders");
    $jml_produk = mysqli_num_rows($data_produk);
    $jml_pelanggan = mysqli_num_rows($data_pelanggan);
    $jml_pegawai = mysqli_num_rows($data_pegawai);
    $jml_order = mysqli_num_rows($data_order);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>
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
                            <li><a href="tampilOrder.php">Data Pesanan</a></li>
                            <li><a href="tampilProduk.php">Data Produk</a></li>
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
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-people-group"></span>
                        </div>
                        <div>
                            <h2><?php echo $jml_pelanggan; ?></h2>
                            <small> Pelanggan</small>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-car"></span>
                        </div>
                        <div>
                            <h2> <?php echo $jml_produk; ?></h2>
                            <small> Produk</small>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-file-circle-check"></span>
                        </div>
                        <div>
                            <h2> <?php echo $jml_order; ?></h2>
                            <small> Pesanan</small>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <span class="fa-solid fa-person"></span>
                        </div>
                        <div>
                            <h2> <?php echo $jml_pegawai; ?></h2>
                            <small> Pegawai</small>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    
</body>
</html>