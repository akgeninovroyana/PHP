<?php 
    include "../connect/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM customers where customerNumber = '$_GET[kode]'");
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
                        <span>Ubah Data Pelanggan</span>
                    </div>
                    <form action="" method="post">
                        <fieldset>
                            <legend>Form Data Pelanggan</legend>
                            <table>
                                <tr>
                                    <td>Customer Number</td>
                                    <td> : </td>
                                    <td><input type="text" name="cust_number" value="<?php echo $data['customerNumber']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Customer Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="cust_name" value="<?php echo $data['customerName']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Contact Last Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="last_name" value="<?php echo $data['contactLastName']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Contact First Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="first_name" value="<?php echo $data['contactFirstName']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td> : </td>
                                    <td><input type="text" name="phone" value="<?php echo $data['phone']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Address Line 1</td>
                                    <td> : </td>
                                    <td><input type="text" name="address1" value="<?php echo $data['addressLine1']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Address Line 2</td>
                                    <td> : </td>
                                    <td><input type="text" name="address2" value="<?php echo $data['addressLine2']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> : </td>
                                    <td><input type="text" name="city" value="<?php echo $data['city']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td> : </td>
                                    <td><input type="text" name="state" value="<?php echo $data['state']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Postal Code</td>
                                    <td> : </td>
                                    <td><input type="text" name="postal_code" value="<?php echo $data['postalCode']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td> : </td>
                                    <td><input type="text" name="country" value="<?php echo $data['country']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Sales Rep Employee Number</td>
                                    <td> : </td>
                                    <td>
                                        <select name="sales_number" required>
                                            <option><?php echo $data['salesRepEmployeeNumber']; ?></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM employees");
                                                while($data_from = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data_from[employeeNumber]>$data_from[employeeNumber] - $data_from[firstName] $data_from[lastName]</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Credit Limit</td>
                                    <td> : </td>
                                    <td><input type="text" name="credit_limit" value="<?php echo $data['creditLimit']; ?>"></td>
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
                            $query = mysqli_query($koneksi, "UPDATE customers set
                            customerNumber = '$_POST[cust_number]',
                            customerName = '$_POST[cust_name]',
                            contactLastName = '$_POST[last_name]',
                            contactFirstName = '$_POST[first_name]',
                            phone = '$_POST[phone]',
                            addressLine1 = '$_POST[address1]',
                            addressLine2 = '$_POST[address2]',
                            city = '$_POST[city]',
                            state = '$_POST[state]',
                            postalCode = '$_POST[postal_code]',
                            country = '$_POST[country]',
                            salesRepEmployeeNumber = '$_POST[sales_number]',
                            creditLimit = '$_POST[credit_limit]' WHERE customerNumber = '$_GET[kode]'");

                            $status = "berhasil";
                        }

                        if($status == "berhasil"){
                            echo "<script> alert('Ubah data berhasil!'); window.location='tampilPelanggan.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>