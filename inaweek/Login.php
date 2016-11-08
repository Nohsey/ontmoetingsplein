<?php
include_once "DataBase.php";

class Login
{

  Public function LoginFucntion($usr, $pass)
  {
    $User = new DataBaseUser();
    $connection = $_SESSION['Connection'];

      $sql = "SELECT * FROM Gebruiker where GInlogNaam='$usr'";
      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        $LoginUser = $row['GInlogNaam'];
        $LoginPass = $row['GWachtwoord'];

        if ($LoginUser == $usr && $LoginPass == $pass) {
          $_SESSION['Gid'] = $User->GetIdByUsername($LoginUser);

          return true;
        }
        else {
          return false;
        }

        # code...
      }


  }
}
