<?php

function myevent($data) {
	echo "event: myevent\n";
	echo "data:";
	echo json_encode($data);
	echo "\n\n";
	ob_end_flush();
	flush();
}

header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");

$counter = rand(1, 10);
while(1) {
	$sumdata = ["x" => 2];

	// get game info
	// check if both players did something
	// if so, return new data for user

	myevent($sumdata);

	sleep(1);
}