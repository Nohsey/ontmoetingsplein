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
    $sql = "SELECT ETitel FROM `Evenementen` WHERE Datum='$date' AND `EindTijd` >= NOW() ORDER BY Datum";
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
    $sql = "SELECT ETitel FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() ORDER BY Datum, BeginTijd";
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
    $sql = "SELECT EInhoud FROM `Evenementen` WHERE `EindTijd` >= NOW() AND `Datum` >= CURDATE() AND `ETitel`='$title'  ORDER BY Datum, BeginTijd";
	  $result = mysqli_query($connection, $sql);
    $EInhoud = null;
    while($row = mysqli_fetch_array($result))
    {
        $EInhoud = $row;
    }


    return $EInhoud[0];
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




public function GetEventName1()
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT aeName FROM `AanvraagEvenement` WHERE `aeDate` >= CURDATE() ORDER BY aeDate, aeBeginTijd";
	  $result = mysqli_query($connection, $sql);
    $titles = null;
    while($row = mysqli_fetch_array($result))
    {
        $titles[] = $row;
    }


    return $titles;
}

public function GetEventinhoud1($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT aeInhoud FROM `AanvraagEvenement` WHERE `aeDate` >= CURDATE() AND `aeName`='$title'  ORDER BY aeDate, aeBeginTijd";
	  $result = mysqli_query($connection, $sql);
    $EInhoud = null;
    while($row = mysqli_fetch_array($result))
    {
        $EInhoud = $row;
    }


    return $EInhoud[0];
}

public function CountEvent1()
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT COUNT(aeName) FROM `AanvraagEvenement` WHERE `aeDate` >= CURDATE()";
	  $result = mysqli_query($connection, $sql);



    $count = mysqli_fetch_array($result);


    return $count[0];
}

public function GetEventBTime1($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT aeBeginTijd FROM AanvraagEvenement where aeName='$title'";
    $result = mysqli_query($connection, $sql);
    $BTijd= mysqli_fetch_array($result);

		$pieces = explode(":", $BTijd[0]);

		$BTijddone = $pieces[0].":".$pieces[1];


    return $BTijddone;
}

public function GetEventETime1($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT aeEindTijd FROM AanvraagEvenement where aeName='$title'";
    $result = mysqli_query($connection, $sql);
    $ETijd= mysqli_fetch_array($result);

		$pieces = explode(":", $ETijd[0]);

		$ETijddone = $pieces[0].":".$pieces[1];


    return $ETijddone;
}
public function GetEventData1($title)
{
    $connection = $_SESSION['Connection'];
    $sql = "SELECT aeDate FROM AanvraagEvenement where aeName='$title'";
    $result = mysqli_query($connection, $sql);
    $datum= mysqli_fetch_array($result);

		$pieces = explode("-", $datum[0]);

		$fulldata = $pieces[2]."-".$pieces[1]."-".$pieces[0];

    return $fulldata;
}

}
