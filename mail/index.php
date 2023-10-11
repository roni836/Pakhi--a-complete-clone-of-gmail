<?php

include_once "../config/config.php";

if(!isset($_SESSION['account'])){
    redirect('login.php');
}
else{
    redirect('inbox.php');
}
?>