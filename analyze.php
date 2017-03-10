<?php

	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_dbname = "weather";
	
	$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_dbname);
	mysqli_query($connection, "SET CHARSET UTF8");
	
	$sql = "SELECT * FROM `weather` ORDER BY `Time` ASC";
	$results = mysqli_query($connection, $sql);
	$foreCastDateString = array();
	$foreCastDate = array();
	$foreCastValue = array();
	while($result = mysqli_fetch_array($results))
	{
		//echo $result['Time'] ."<br>";
		array_push($foreCastDateString,$result['Time']);
		array_push($foreCastDate,strtotime($result['Time']));
		array_push($foreCastValue,$result['Temperature']-273);
	}
	//var_dump($foreCastDate);
	//var_dump($foreCastValue);
	
	
	$data = file_get_contents("http://yecccmu-test.herokuapp.com/dataTemp.json");
	
	$dataDate = array();
	$dataValue = array();
	
	$dataInJsons = json_decode($data);
	//var_dump($dataInJsons);
	foreach ($dataInJsons->feeds as $dataInJson)
	{
		$tmpDay = substr($dataInJson->created_at,0,10);
		$tmpTime = substr($dataInJson->created_at,11,8);
		$tmps = $tmpDay." ".$tmpTime;
		//date("Y-m-d H:i:s",strtotime($tmps))
		array_push($dataDate,strtotime($tmps));
		array_push($dataValue,$dataInJson->field1);
	}
	//var_dump($dataDate);
	//var_dump($dataValue);
	$sumTotal = array();
	
	for($i = 0;$i< count($foreCastDate);$i++)
	{
		if($i+1 != count($foreCastDate))
		{
			$j = 0;
			$sum = 0;
			$count = 0;
			foreach($dataDate as $tmpDate)
			{
				if($foreCastDate[$i] <= $tmpDate && $tmpDate <= $foreCastDate[$i+1])
				{
					$sum += ($dataValue[$j]^2) ;
					$count++;
				}
				
				$j++;
			}
			if($count == 0) $count = 1;
			array_push($sumTotal,$sum/$count);
		}
	}
	$dataChart = array(array("Date","Forcast","True Value"));
	$i=0;
	$j=0;
	foreach($foreCastDateString as $tmpDate)
	{
		if($i==0)
		{
			array_push($dataChart,array($tmpDate,$foreCastValue[$i],0));
			$i++;
		}
		else
		{
			array_push($dataChart,array($tmpDate,$foreCastValue[$i],$sumTotal[$j]));
			$i++;
			$j++;
		}
		
	}
	$dataEcho = array('day'=>$foreCastDateString,'forcast'=>$foreCastValue,'mean'=>$sumTotal);
	echo json_encode($dataChart);

?>
