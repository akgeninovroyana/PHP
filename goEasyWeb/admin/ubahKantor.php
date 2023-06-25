<?php 
    include "../connect/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM offices where officeCode = '$_GET[kode]'");
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
                        <span>Ubah Data Kantor</span>
                    </div>
                    <form action="" method="post">
                        <fieldset>
                            <legend>Form Data Kantor</legend>
                            <table>
                            <tr>
                                    <td>Office Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="off_code" value="<?php echo $data['officeCode']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> : </td>
                                    <td><input type="text" name="city" value="<?php echo $data['city']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td> : </td>
                                    <td><input type="text" name="phone" value="<?php echo $data['phone']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Address Line 1</td>
                                    <td> : </td>
                                    <td><input type="text" name="add_line_1" value="<?php echo $data['addressLine1']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Address Line 2</td>
                                    <td> : </td>
                                    <td><input type="text" name="add_line_2" value="<?php echo $data['addressLine2']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td> : </td>
                                    <td><input type="text" name="state" value="<?php echo $data['state']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td> : </td>
                                    <td><input type="text" name="country" value="<?php echo $data['country']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Postal Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="postal_code" value="<?php echo $data['postalCode']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Territory</td>
                                    <td> : </td>
                                    <td><input type="text" name="territory" value="<?php echo $data['territory']; ?>" required></td>
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
                            $query = mysqli_query($koneksi, "UPDATE offices set
                            officeCode = '$_POST[off_code]',
                            city = '$_POST[city]',
                            phone = '$_POST[phone]',
                            addressLine1 = '$_POST[add_line_1]',
                            addressLine2 = '$_POST[add_line_2]',
                            state = '$_POST[state]',
                            country = '$_POST[country]',
                            postalCode = '$_POST[postal_code]',
                            territory = '$_POST[territory]' WHERE officeCode = '$_GET[kode]'");

                            $status = "berhasil";
                        }

                        if($status == "berhasil"){
                            echo "<script> alert('Ubah data berhasil!'); window.location='tampilKantor.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>