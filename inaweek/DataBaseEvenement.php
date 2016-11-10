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
    $sql = "SELECT ETitel FROM `Evenementen` WHERE Datum='$date' AND `EindTijd` >= NOW() ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $titles = null;
    while($row = mysqli_fetch_array($result))
    {
        $titles[] = $row;
    }


    return $titles;
}
public function GetEventName()
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT ETitel FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $titles = null;
    while($row = mysqli_fetch_array($result))
    {
        $titles[] = $row;
    }


    return $titles;
}

public function GetEventinhoud($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT EInhoud FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() AND `ETitel`='$title'  ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $EInhoud = null;
    while($row = mysqli_fetch_array($result))
    {
        $EInhoud = $row;
    }


    return $EInhoud[0];
}

public function GetEventTimeStart($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT BeginTijd FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() AND `ETitel`='$title'  ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $Btijd = null;
    while($row = mysqli_fetch_array($result))
    {
        $Btijd = $row;
    }


    return $Btijd[0];
}

public function GetEventTimeEind($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT EindTijd FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() AND `ETitel`='$title'  ORDER BY BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $Etijd = null;
    while($row = mysqli_fetch_array($result))
    {
        $Etijd = $row;
    }


    return $Etijd[0];
}

public function CountEvent()
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT COUNT(ETitel) FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE()";
	  $result = mysqli_query($connection, $sql);



    $count = mysqli_fetch_array($result);


    return $count[0];
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
public function GetEventData($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT datum FROM Evenementen where ETitel='$title'";
    $result = mysqli_query($connection, $sql);
    $datum= mysqli_fetch_array($result);

		$pieces = explode("-", $datum[0]);

		$fulldata = $pieces[2]."-".$pieces[1]."-".$pieces[0];

    return $fulldata;
}
}
