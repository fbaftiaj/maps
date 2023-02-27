<?php
    require "connect.php";

    $lok = true;

    if(!isset($_SESSION['admin'])){
        header("Location: ../index.php");
        $lok = false;
    }
    else{
        if(!isset($_POST['lokacionsubmit'])){
            header("Location: ../index2.php");
            $lok = false;
        }
        else{
            $lat = mysqli_real_escape_string($connect, $_POST['latitudee']);
            $lon = mysqli_real_escape_string($connect, $_POST['longitudee']);
            $shenja = mysqli_real_escape_string($connect, $_POST['shenja']);
            $pershkrimi = mysqli_real_escape_string($connect, $_POST['pershkrimi']);
        }
    }

    if(empty($shenja)){
        $lok = false;
        $error = "<span style='font-size: 11px;color:red; font-weight: 700;' class='mb-0'>Ju lutemi jepni një shenjë rrugore për këtë lokacion !</span>";
    }
    
    if($lok){
        $admin = $_SESSION['admin'];
        $date = date("Y-m-d");
        $ora = date("h:i");

        if(empty($pershkrimi)){
            $insert = mysqli_query($connect, "INSERT INTO kordinata(lati, longi, shenja, dataregj, oraregj, adminID, pershkrimi) VALUES ('$lat', '$lon', '$shenja', '$date', '$ora', '$admin', 'Nuk ka asnjë përshkrim !')");
            if($insert){
                    $last_id = mysqli_insert_id($connect);
            
                    if($last_id){
                        $code2 = "m"; 
                        $code = rand(1000, 900000000);
                        $userID  = $code2.'_'.$code.$last_id;
                        $query2 = mysqli_query($connect, "UPDATE kordinata SET korID = '$userID' WHERE kID = '$last_id';");
                    }
                }
        }
        else{
            $insert1 = mysqli_query($connect, "INSERT INTO kordinata(lati, longi, shenja, dataregj, oraregj, adminID, pershkrimi) VALUES ('$lat', '$lon', '$shenja', '$date', '$ora', '$admin', '$pershkrimi')");
            if($insert1){
                    $last_id = mysqli_insert_id($connect);
            
                    if($last_id){
                        $code2 = "m"; 
                        $code = rand(1000, 900000000);
                        $userID  = $code2.'_'.$code.$last_id;
                        $query2 = mysqli_query($connect, "UPDATE kordinata SET korID = '$userID' WHERE kID = '$last_id';");
                    }
                }
        }
        
    }