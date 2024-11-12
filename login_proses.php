<?php
    session_start();
    include ('koneksi.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "select * from guru where username = '$username' and password = '$password'");

    $cek = mysqli_num_rows($query);
    if($cek == true){
        $_SESSION['username'] = $username;
        header ("location:index.php");
    }
    else{
        header ("location:login.php");
    }
?>