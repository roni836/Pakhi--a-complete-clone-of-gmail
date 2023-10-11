<?php

    // Constant Work

    define("PROJECT_NAME","Pakhi- A messenger for you");
    
    // Connection Work

    $connect = mysqli_connect('localhost','root','','pakhi') or die("Database connection failed");

    // Session Work

    session_start();

    // Function

    function redirect($page){
        echo "<script>window.open('$page','_self')</script>";
    }

    function alert($msg){
        echo "<script>alert('$msg')</script>";
    }

    if(isset($_SESSION['account'])){
        $email = $_SESSION['account'];
        $query = mysqli_query($connect,"SELECT * FROM accounts WHERE email ='$email'");
        $getuserdata = mysqli_fetch_array($query);
    }
    // Get my User id

//    $myuserid = $getuserdata['user_id'];
?>