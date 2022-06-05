<?php 
    if(!isset($_SESSION['id-user'])){header("Location: auth/login.php");exit();}