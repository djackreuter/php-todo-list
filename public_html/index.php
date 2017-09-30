<?php require_once("../connect.php");

$errors = "";

if(isset($_POST['submit'])) {
	$task = $_POST['task'];
	$task = filter_var($task, FILTER_SANITIZE_STRING);
	if(empty($task) === true) {
		$errors = "You can't submit a blank task";
	} else {
		$stmt = $mysqli->stmt_init();
		if($stmt->prepare("INSERT INTO tasks (task) VALUES ('$task')")) {
			$stmt->bind_param("s", $task);
			$stmt->execute();
			$stmt->fetch();
			$stmt->close();
		}
		header('location: index.php');
	}
}

if(isset($_GET['del_task'])) {
	$id = $_GET['del_task'];
	mysqli_query($mysqli, "DELETE FROM tasks WHERE id=$id");
	header('location: index.php');
}

$tasks = mysqli_query($mysqli, "SELECT * FROM tasks");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
				integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css"/>

		<!-- jQuery v3.0 -->
		<!--		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
				  integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
				  crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
				  integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
				  crossorigin="anonymous"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<title>PHP TO-DO List</title>
	</head>
	<body>
		<div class="jumbotron">
			<h3>To-do List</h3>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form method="POST" action="index.php">
						<?php if(isset($errors) === true) {
							echo '<p>' . $errors . '</p>';
						}
						?>
						<div class="form-group">
							<input type="text" name="task" placeholder="Add a new item...">
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div><!-- /.col-md-4 -->
			</div><!-- /.row justify-content-center -->
		</div><!-- /.container -->
		<table class="table">
			<thead class="thead-inverse">
				<tr>
					<th>N</th>
					<th>Task</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				while($row = mysqli_fetch_array($tasks)) {
					echo '<tr>';
					echo '<td>' . $i . '</td>';
					echo '<td class="task">' . $row['task'] . '</td>';
					echo '<td class="delete">' .
						'<a href="index.php?del_task=' . $row['id'] . '">x</a>' .
						'</td>';
					echo '</tr>';
					$i++;
				}
				?>
			</tbody>
		</table>
	</body>
</html>