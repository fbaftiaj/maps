<?php 

    require "connect.php";


    $login = true;

    if(!isset($_POST['kyqusubmit'])){
        exit();
        $login = false;
    }
    else{
        $user = mysqli_real_escape_string($connect, $_POST['loginuser']);
        $pass = mysqli_real_escape_string($connect, $_POST['loginpass']);
    }




if(empty($user) || empty($pass)){
    $login = false;
    $error = "<span style='font-size: 11px;color:red; font-weight: 700;' class='mb-0'>Të gjitha të dhënat duhet të plotësohen !</span>";
}
else{

    $query = mysqli_query($connect, "SELECT usernamee, pass FROM user");

    if(mysqli_num_rows($query) > 0){
        $fetch  = mysqli_fetch_assoc($query);
        if(!password_verify($pass, $fetch['pass'])) {
            $login = false;
            $errorp = "<span style='font-size: 11px;color:red; font-weight: 700;' class='mb-0'>Username ose fjalëkalimi i gabuar !</span>";
        }
    }
}

if($login){
    $query1 = mysqli_query($connect, "SELECT * FROM user WHERE usernamee = '$user'");
    $fetch1  = mysqli_fetch_assoc($query1);


    if($fetch1['roli'] == "admin"){
        session_start();
        $_SESSION['admin'] = $fetch1['userID'];
        header("Location: index2.php");
    }
    elseif($fetch1['roli'] == "kompani"){
        session_start();
        $_SESSION['com'] = $fetch1['userID'];
        header("Location: index3.php");
    }
    else{
        session_start();
        $_SESSION['superadmin'] = $fetch1['userID'];
        header("Location: superadmin.php");
    }
    
}