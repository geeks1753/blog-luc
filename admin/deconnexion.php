<?php
// on inclut le heder
include_once('includes/header.php');

session_start();

        if($_SESSION['pseudo'] !== "" AND $_SESSION['pass'] !== ""){
            $firstname = $_SESSION['pseudo'];
            $Pass = $_SESSION['pass'];
        }
        unset($_SESSION['pseudo']);
        unset($_SESSION['psw']); 
        session_destroy();
        header('location: ../index.php');

 // on inclut le footer
include_once('includes/footer.php');

?>