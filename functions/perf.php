<?php 

    session_start();

    require "connect.php";
    $ndrysho = true;
    if(!isset($_SESSION['com'])){
        header("Location: ../index.php");
        $ndrysho = false;
    }

    else{
        $add  = $_SESSION['com'];

        $id = mysqli_real_escape_string($connect, $_POST['korId']);

    }

    if(empty($id)){
        echo "Të dhenat duhet te plotësohen !";
    }

    if($ndrysho){
        $quer = mysqli_query($connect, "UPDATE kordinata SET statusi = 'perfunduar' , komID = '$add' WHERE korID = '$id'");
        echo "success";
    }