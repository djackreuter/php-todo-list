<?php
$task = strip_tags($_POST['task']);
// create variables to set date and time for each new entry
$date = date('Y-m-d');
$time = date('H:i:s');

require("../../connect.php");

