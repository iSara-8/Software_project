<?php

if(!isset($_SESSION))session_start();
if(!isset($_SESSION['cart']))
    $_SESSION['cart'] = array();

if(!isset($_SESSION['wish']))
    $_SESSION['wish'] = array();
$admin = isset($_SESSION['admin']);
