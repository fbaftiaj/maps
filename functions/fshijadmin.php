<?php 
session_start();
require "connect.php";
$delete = true;
    if(!isset($_SESSION['superadmin'])){
        header("location: index.php");
    }

else{
    if(!isset($_GET['pid'])){
        header("Location: ../superadmin.php");
        $delete = false;
    }
    else{
        $pid = mysqli_real_escape_string($connect, $_GET['pid']);

        $query = mysqli_query($connect, "DELETE FROM admini WHERE adminID = '$pid';");

        if($query){
            header("location: ../superadmin.php");
        }
    }
}

