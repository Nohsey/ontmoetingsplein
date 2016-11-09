


public function GetEventBTime($title)
<<<<<<<

=======
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

>>>>>>>