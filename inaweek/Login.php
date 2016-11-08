<?php
include_once "DataBase.php"
$User = new DataBaseuser();

$FirstName = $user->GetFirstName();
echo $FirstName;