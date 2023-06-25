<?php 
    include "../connect/koneksi.php";

    $sql = mysqli_query($koneksi, "SELECT * FROM employees where employeeNumber = '$_GET[kode]'");
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
                        <span>Ubah Data Pegawai</span>
                    </div>
                    <form action="" method="post">
                        <fieldset>
                            <legend>Form Data Pegawai</legend>
                            <table>
                                <tr>
                                    <td>Employee Number</td>
                                    <td> : </td>
                                    <td><input type="text" name="emp_number" value="<?php echo $data['employeeNumber']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="last_name" value="<?php echo $data['lastName']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="first_name" value="<?php echo $data['firstName']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Extension</td>
                                    <td> : </td>
                                    <td><input type="text" name="ext" value="<?php echo $data['extension']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> : </td>
                                    <td><input type="email" name="email" value="<?php echo $data['email']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Office Code</td>
                                    <td> : </td>
                                    <td>
                                        <select name="off_code" required>
                                            <option><?php echo $data['officeCode']; ?></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM offices");
                                                while($data_from = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data_from[officeCode]>$data_from[officeCode] - $data_from[city] - $data_from[phone]</option>";
                                            ?>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reports To</td>
                                    <td> : </td>
                                    <td>
                                        <select name="report">
                                            <option><?php echo $data['reportsTo']; ?></option>
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
                                    <td>Job Title</td>
                                    <td> : </td>
                                    <td><input type="text" name="job_title" value="<?php echo $data['jobTitle']; ?>" required></td>
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
                            $query = mysqli_query($koneksi, "UPDATE employees set
                            employeeNumber = '$_POST[emp_number]',
                            lastName = '$_POST[last_name]',
                            firstName = '$_POST[first_name]',
                            extension = '$_POST[ext]',
                            email = '$_POST[email]',
                            officeCode = '$_POST[off_code]',
                            reportsTo = '$_POST[report]',
                            jobTitle = '$_POST[job_title]' WHERE employeeNumber = '$_GET[kode]'");

                            $status = "berhasil";
                        }

                        if($status == "berhasil"){
                            echo "<script> alert('Ubah data berhasil!'); window.location='tampilPegawai.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>