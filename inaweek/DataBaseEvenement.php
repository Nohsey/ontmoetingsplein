<?php

class DataBaseEvenement
{


//get



public function CreateEvent($ETitel ,$EInhoud ,$AdminId)
{
	$connection = $_SESSION['Connection'];
    $sql = "INSERT INTO `Evenementen`(`ETitel`, `EInhoud`, `Aid`) VALUES ('$ETitel','$EInhoud','$AdminId')";
	$result = mysqli_query($connection, $sql);
}

public function GetEventNameOnDate($date)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT ETitel FROM `Evenementen` WHERE Datum='$date' ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $titles = null;
    while($row = mysqli_fetch_array($result))
    {
        $titles[] = $row;
    }


    return $titles;
}

public function GetEventBTime($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT BeginTijd FROM Evenementen where ETitel='$title'";
    $result = mysqli_query($connection, $sql);
    $BTijd= mysqli_fetch_array($result);

		$pieces = explode(":", $BTijd[0]);

		$BTijddone = $pieces[0].":".$pieces[1];


    return $BTijddone;
}

public function GetEventETime($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT EindTijd FROM Evenementen where ETitel='$title'";
    $result = mysqli_query($connection, $sql);
    $ETijd= mysqli_fetch_array($result);

		$pieces = explode(":", $ETijd[0]);

		$ETijddone = $pieces[0].":".$pieces[1];


    return $ETijddone;
}
}
