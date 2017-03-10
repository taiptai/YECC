<?php
// include_once("mysql_connection.inc.php");

	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_dbname = "weather";
	
	$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_dbname);
	mysqli_query($connection, "SET CHARSET UTF8");

	//$data = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/city?id=1153670&APPID=c7a5c06bd2977d6192a77602f2dbeae9&units=metric&mode=json");
	$data = file_get_contents("http://localhost/weather/forecast.json");

	$dataInJson = json_decode($data);
	var_dump($dataInJson);
	$nameCity = $dataInJson->city->name;
	foreach ($dataInJson->list as $tmpdata) {
		$tmptime = date($tmpdata->dt_txt);
		$sql = "INSERT INTO `weather`(`Name`, `Time`, `Temperature`, `Humidity`) VALUES ('$nameCity', '$tmptime', {$tmpdata->main->temp}, {$tmpdata->main->humidity})";
		// echo $sql;
		mysqli_query($connection, $sql); }
	}

mysqli_close($connection);
?>
