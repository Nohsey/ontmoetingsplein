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
    $sql = "SELECT ETitel FROM `Evenementen` WHERE Datum='$date'";
	  $result = mysqli_query($connection, $sql);
    $titles = null;
    while($row = mysqli_fetch_array($result))
    {
        $titles[] = $row;
    }


    return $titles;
}
}
