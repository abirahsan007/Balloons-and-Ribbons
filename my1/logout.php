<?php

    session_start();

    if ($_SESSION['uname']==true) {
        session_destroy();
        unset($_SESSION['uname']);
        header("location: index.php");
    }
    else{
        header('location: index.php');
    }
?>