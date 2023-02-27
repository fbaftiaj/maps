<?php
    session_start();
    require "connect.php";
    $shto= true;
        $emri = mysqli_real_escape_string($connect, $_POST['ndryshoemri']);
        $user = mysqli_real_escape_string($connect, $_POST['ndryshouser']);
        $komun = mysqli_real_escape_string($connect, $_POST['ndryshokomun']);
        $unik = mysqli_real_escape_string($connect, $_POST['uniqe']);


        $admin = $_SESSION['superadmin'];


    if(empty($emri)|empty($user)||empty($komun)){
        $shto = false;
        echo "Të gjitha të dhënat duhet të plotësohen !";
    }
    else{
        $query1 = mysqli_query($connect, "SELECT * FROM kompania WHERE komID = '$unik' AND usernamee = '$user ';");

        if(mysqli_num_rows($query1) > 1){
            $shto = false;
            echo "Ky username tashmë ekziston !";
        }
    }

    if($shto){
            $insert = mysqli_query($connect, "UPDATE kompania SET emri = '$emri', usernamee= '$user',  komuna = '$komun'  WHERE komID = '$unik';");
            $insert2 = mysqli_query($connect, "UPDATE user SET emri = '$emri', mbiemri= '$emri', usernamee= '$user'  WHERE userID = '$unik';");
            echo  'success';

    }