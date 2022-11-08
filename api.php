<?php
    include('DB.php');
    include('session.php');

    if(isset($_GET['logout'])){
        session_start();
        unset($_SESSION['admin']);
        header("location:index.php");
    }

    if(isset($_GET['delete'])){
        mysqli_query($con, "DELETE FROM `products` WHERE `products`.`id` = {$_GET['delete']}");
        header('location:products.php');
    }

    if(isset($_POST['add'])){
        $type = $_POST['type'];
        $id = $_POST['id'];
        array_push($_SESSION[$type], $id);
        $_SESSION[$type] = array_unique($_SESSION[$type]);  
    }

    if(isset($_POST['remove'])){
        $type = $_POST['type'];
        $id = $_POST['id'];
        $_SESSION[$type] = array_unique($_SESSION[$type]);
        unset($_SESSION[$type][array_search($id,$_SESSION[$type])]);
    }

    if(isset($_POST['kill'])){
        $_SESSION['cart'] = array();
    }

    function getCart($ids){
        global $con;
        $ret = array();
        foreach($ids as $id){
            $query = mysqli_query($con, "SELECT * from products where id=$id");
            $row = mysqli_fetch_assoc($query);
            array_push($ret, $row);
        }
        return $ret;
    }
