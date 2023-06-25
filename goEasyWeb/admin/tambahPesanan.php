<?php 
    include "../connect/koneksi.php";
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
                <header>
                    <h3>Tambah Data Pesanan</h3>
                </header>
                    <form action="" method="post">
                        <fieldset>
                            <legend>Form Data Pesanan</legend>
                            <table>
                                <tr>
                                    <td>Order Number</td>
                                    <td> : </td>
                                    <td>
                                        <select name="order_number" required>
                                            <option></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM orders");
                                                while($data = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data[orderNumber]>$data[orderNumber]</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Code</td>
                                    <td> : </td>
                                    <td>
                                        <select name="prod_code" required>
                                            <option></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM products");
                                                while($data = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data[productCode]>$data[productCode] - $data[productName]</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Quantity Ordered</td>
                                    <td> : </td>
                                    <td><input type="text" name="quantity" required></td>
                                </tr>
                                <tr>
                                    <td>Price Each</td>
                                    <td> : </td>
                                    <td><input type="text" name="price_each"></td>
                                </tr>
                                <tr>
                                    <td>Order Line Number</td>
                                    <td> : </td>
                                    <td><input type="text" name="order_line" required></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Simpan" name="proses" required>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>

                    <?php
                        $status = "";
                        if(isset($_POST['proses'])){
                            mysqli_query($koneksi, "INSERT INTO orderdetails SET
                            orderNumber = '$_POST[order_number]',
                            productCode = '$_POST[prod_code]',
                            quantityOrdered = '$_POST[quantity]',
                            priceEach = '$_POST[price_each]',
                            orderLineNumber = '$_POST[order_line]'");
                            
                            $status = "berhasil";
                        }
                        if($status == "berhasil"){
                            echo "<script> alert('Berhasil menambahkan data kantor'); window.location='tampilPesanan.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>