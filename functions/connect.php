<?php 

    $connect = mysqli_connect("localhost", "root", "", "maps");


    if(!$connect){
        die(mysqli_connect_error());
    }