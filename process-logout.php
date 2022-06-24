<?php
    session_start();
    if(isset($_SESSION['LoginOK'])){
        unset($_SESSION['LoginOK']);
        header('location: index.php');
    }
    else if(isset($_SESSION['AdminLoginOK'])) {
        unset($_SESSION['AdminLoginOK']);
        header('location: /BTL_PTPM/login/web/index.php');
    }
?>