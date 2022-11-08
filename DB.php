<?php  
    $connection = mysqli_connect("localhost","root","", "bellarosa");
    $con = mysqli_connect("localhost","root","", "bellarosa");
    $error = mysqli_connect_error();
    if ($error != null){
        exit("on connection to the database". $error);//TODO remove error msg
    }
?>