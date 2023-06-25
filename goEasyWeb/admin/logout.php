<?php
    session_start();
    session_destroy();
    echo "<script> alert('Log out berhasil!'); window.location='index.php';</script>";
?>