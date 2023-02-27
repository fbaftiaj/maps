<?php
    session_start();
    require "connect.php";
    $shto= true;
        $emri = mysqli_real_escape_string($connect, $_POST['ndryshoemri']);
        $mbiemri = mysqli_real_escape_string($connect, $_POST['ndryshombi']);
        $user = mysqli_real_escape_string($connect, $_POST['ndryshouser']);
        $tel = mysqli_real_escape_string($connect, $_POST['ndryshonrtel']);
        $email = mysqli_real_escape_string($connect, $_POST['ndryshoemail']);
        $komun = mysqli_real_escape_string($connect, $_POST['ndryshokomun']);
        $unik = mysqli_real_escape_string($connect, $_POST['uniqe']);


        $admin = $_SESSION['superadmin'];


    if(empty($emri)||empty($mbiemri)||empty($user)||empty($tel)||empty($email)||empty($komun)){
        $shto = false;
        echo "Të gjitha të dhënat duhet të plotësohen !";
    }
    else{
        $query1 = mysqli_query($connect, "SELECT * FROM admini WHERE adminID = '$unik' AND usernamee = '$user ';");

        if(mysqli_num_rows($query1) > 1){
            $shto = false;
            echo "Ky username tashmë ekziston !";
        }
        if(!preg_match('/^[0-9]*$/', $tel)){
            $shto = false;
            echo "Numri telefonit duhet të përmbajë vetëm numra !";
        }
        if(strlen($tel) >9 || strlen($tel) < 9){
            $shto = false;
            echo "Numri telefonit është shkruar gabim !";
        }
    }

    if($shto){
            $insert = mysqli_query($connect, "UPDATE admini SET emri = '$emri', mbiemri= '$mbiemri', usernamee = '$user', nrtel = '$tel', email = '$email', komuna = '$komun'  WHERE adminID = '$unik';");
            $insert2 = mysqli_query($connect, "UPDATE user SET emri = '$emri', mbiemri= '$emri', usernamee= '$user'  WHERE userID = '$unik';");
            echo  'success';

    }