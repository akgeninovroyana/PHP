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
                    <h3>Tambah Data Pegawai</h3>
                </header>
                    <form action="" method="post">
                        <fieldset>
                            <legend>Form Data Pegawai</legend>
                            <table>
                                <tr>
                                    <td>Employee Number</td>
                                    <td> : </td>
                                    <td><input type="text" name="emp_number" required></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="last_name" required></td>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td> : </td>
                                    <td><input type="text" name="first_name" required></td>
                                </tr>
                                <tr>
                                    <td>Extension</td>
                                    <td> : </td>
                                    <td><input type="text" name="ext" required></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> : </td>
                                    <td><input type="email" name="email" required></td>
                                </tr>
                                <tr>
                                    <td>Office Code</td>
                                    <td> : </td>
                                    <td>
                                        <select name="off_code" required>
                                            <option></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM offices");
                                                while($data = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data[officeCode]>$data[officeCode] - $data[city] - $data[phone]</option>";
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
                                            <option></option>
                                            <?php
                                                $impor_data = mysqli_query($koneksi, "SELECT * FROM employees");
                                                while($data = mysqli_fetch_array($impor_data)){
                                                    echo "<option value=$data[employeeNumber]>$data[employeeNumber] - $data[firstName] $data[lastName]</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Job Title</td>
                                    <td> : </td>
                                    <td><input type="text" name="job_title" required></td>
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
                            mysqli_query($koneksi, "INSERT INTO employees SET
                            employeeNumber = '$_POST[emp_number]',
                            lastName = '$_POST[last_name]',
                            firstName = '$_POST[first_name]',
                            extension = '$_POST[ext]',
                            email = '$_POST[email]',
                            officeCode = '$_POST[off_code]',
                            reportsTo = '$_POST[report]',
                            jobTitle = '$_POST[job_title]'");
                            
                            $status = "berhasil";
                        }
                        if($status == "berhasil"){
                            echo "<script> alert('Berhasil menambahkan data pegawai'); window.location='tampilKantor.php';</script>";
                        }
                    ?>
                </main>
            </div>
    </body>
    </html>