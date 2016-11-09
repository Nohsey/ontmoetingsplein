<?php
include_once "DataBase.php";

		$servername = "www.kevinkotte.nl";
        $username = "kevink_helmond";
        $password = "Summa123";
        $dbname = "kevink_helmond";

        $connection = new mysqli($servername,$username,$password,$dbname);

$_SESSION['Connection'] = $connection;
$_SESSION['GId'] = 1;

$database = new DataBaseUser();

$FirstName = $database->GetFirstName();
$LastName = $database->GetLastName();
$Rights = $database->GetRightsId();
$LoginName = $database->GetLoginName();
$Loginpassword = $database->GetPassword();
$lastLogin = $database->GetLastLogin();
$MobileNumber = $database->GetMobileNumber();

var_dump($FirstName);
echo $FirstName;

var_dump($LastName);
echo $LastName;

var_dump($Rights);
echo $Rights;

var_dump($LoginName);
echo $LoginName;

var_dump($Loginpassword);
echo $Loginpassword;

var_dump($lastLogin);
echo $lastLogin;

var_dump($MobileNumber);
echo $MobileNumber;

$FirstName = rand(1,10);
$FirstName = $database->SetFirstName($FirstName);
var_dump($FirstName);
echo ($FirstName);

include_once "Register.php";
$register = new RegisterClass();
$register->register("GVD","123","HenkKotte@hotmail.com","Henk","Kotte");
?>