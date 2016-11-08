<?php
class DataBaseUser
{
	
	
//get


	
Public function GetFirstName()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GVoorNaam FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $name= mysqli_fetch_array($result);
	
    return $name[0];
}

Public function GetLastName()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GAchterNaam FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $lastname= mysqli_fetch_array($result);
	
    return $lastname[0];
}

Public function GetRightsId()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GRechten_id FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $rights= mysqli_fetch_array($result);
	
    return $rights[0];
}

public function GetLoginName()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GInlogNaam FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $loginName= mysqli_fetch_array($result);
	
    return $loginName[0];
}

public function GetPassword()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GWachtwoord FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $password= mysqli_fetch_array($result);
	
    return $password[0];
}

public function GetLastLogin()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT GlaatsteLogin FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $lastLogin= mysqli_fetch_array($result);
	
    return $lastLogin[0];
}


public function GetMobileNumber()
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "SELECT Gmobiel_nummer FROM Gebruiker where Gid=$GId";
	$result = mysqli_query($connection, $sql);
    $nummer= mysqli_fetch_array($result);
	
    return $nummer[0];
}






//Set





public function SetFirstName($FirstName)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
	$sql = "UPDATE Gebruiker SET GVoorNaam='$FirstName' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $FirstName;
}

public function SetLastName($LastName)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$LastName' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $LastName;
}
public function SetRights($rights)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$rights' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $rights;
}
public function SetLoginName($LoginName)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$LoginName' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $LoginName;
}
public function SetPassword($Password)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$Password' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $Password;
}

public function SetLastLogin($LastLogin)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$LastLogin' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $LastLogin;
}

public function SetMobileNumber($MobileNumber)
{
	$connection = $_SESSION['Connection'];
    $GId = $_SESSION['GId'];
    $sql = "UPDATE Gebruiker SET GVoorNaam='$MobileNumber' WHERE Gid=$GId";
	$result = mysqli_query($connection, $sql);
	
    return $MobileNumber;
}
}