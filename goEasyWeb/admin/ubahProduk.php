<?php 
    include "../connect/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM products where productCode = '$_GET[kode]'");
    $data = mysqli_fetch_array($sql);
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
                    <div class="data">
                        <span>Ubah Data Produk</span>
                    </div>
                    <form action="" method="post">
                        <fieldset>
                        <legend>Form Data Produk</legend>
                            <table>
                                <tr>
                                    <td>Product Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_code" value="<?php echo $data['productCode']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_name" value="<?php echo $data['productName']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Line</td>
                                    <td> : </td>
                                    <td>
                                        <select name="prod_line" required>
                                            <option><?php echo $data['productLine']; ?></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM productlines");
                                                while($data_from = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data_from[productLine]>$data_from[productLine]</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Scale</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_scale" value="<?php echo $data['productScale']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Vendor</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_vendor" value="<?php echo $data['productVendor']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Product Description</td>
                                    <td> : </td>
                                    <td><input type="text" name="prod_desc" value="<?php echo $data['productDescription']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Quantity In Stock</td>
                                    <td> : </td>
                                    <td><input type="text" name="stock" value="<?php echo $data['quantityInStock']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Buy Price</td>
                                    <td> : </td>
                                    <td><input type="text" name="bPrice" value="<?php echo $data['buyPrice']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>MSRP</td>
                                    <td> : </td>
                                    <td><input type="text" name="msrp" value="<?php echo $data['MSRP']; ?>"></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Simpan" name="proses">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>

                    <?php
                        $status = "";
                        if(isset($_POST['proses'])){
                            $query = mysqli_query($koneksi, "UPDATE products set
                            productCode = '$_POST[prod_code]',
                            productName = '$_POST[prod_name]',
                            productLine = '$_POST[prod_line]',
                            productScale = '$_POST[prod_scale]',
                            productVendor = '$_POST[prod_vendor]',
                            productDescription = '$_POST[prod_desc]',
                            quantityInStock = '$_POST[stock]',
                            buyPrice = '$_POST[bPrice]',
                            MSRP = '$_POST[msrp]' WHERE productCode = '$_GET[kode]'");

                            $status = "berhasil";
                        }

                        if($status == "berhasil"){
                            echo "<script> alert('Ubah data berhasil!'); window.location='tampilProduk.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>