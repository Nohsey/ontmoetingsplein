<?php
session_start();

		$servername = "www.kevinkotte.nl";
        $username = "kevink_helmond";
        $password = "Summa123";
        $dbname = "kevink_helmond";

        $connection = new mysqli($servername,$username,$password,$dbname);

$_SESSION['Connection'] = $connection;

include_once "DataBaseUser.php";
include_once "Login.php";
include_once "DataBaseEvenement.php";

?>
