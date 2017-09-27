<?php
$task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
// create variables to set date and time for each new entry
$date = date('Y-m-d');
$time = date('H:i:s');

require("../../connect.php");

$mysqli->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");

$query = $mysqli->query("SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'");

if($result = $mysqli->query($query)) {

	while($row = $result->fetch_assoc()) {
		$task_id = $row['id'];
		$task_name = $row['task'];
	}
}

$mysqli->close();

echo "<li>" . '$task_name' . "</li>";