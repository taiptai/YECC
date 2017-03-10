<?php
	$data = file_get_contents("https://api.netpie.io/topic/testPrj/gearname/Wemos02?auth=GClHtjv2wbUwh0j:bTQbMklYoD72BlCjyvIGtOUDl");
	$dataInJson = json_decode($data);
	var_dump($dataInJson);
	foreach ($dataInJson->list as $tmpdata) {
	$tmptime = $tmpdata->payload;}
?>