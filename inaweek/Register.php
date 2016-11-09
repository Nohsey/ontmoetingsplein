<?php
include_once "DataBase.php";
include_once "TestLogin.php";

class RegisterClass
{
    public function register($loginName,$LoginPassword,$loginEmail,$GFirstName,$GLastName)
    {
        $dataUser = new DataBaseUser();
        $dataUser->createUser($loginName,$LoginPassword,$loginEmail,$GFirstName,$GLastName);
        
    }
}