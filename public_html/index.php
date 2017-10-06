<?php require_once("../connect.php");

$errors = "";

// enter a new task
if(isset($_POST['submit'])) {
	$task = $_POST['task'];
	$task = filter_var($task, FILTER_SANITIZE_STRING);
	if(empty($task) === true) {
		$errors = "You can't submit a blank task";
	} else {
		if($query = ("INSERT INTO tasks (task) VALUES ('$task')")) {
			$statement = $pdo->prepare($query);
			$statement->execute();
		}
		header('location: index.php');
	}
}

// delete task
if(isset($_GET['del_task'])) {
	$id = $_GET['del_task'];
	$query = "DELETE FROM tasks WHERE id = $id";
	$statement = $pdo->prepare($query);
	$statement->execute();
	// mysqli_query($mysqli, "DELETE FROM tasks WHERE id=$id");
	header('location: index.php');
}

// display tasks
$statement = $pdo->query("SELECT * FROM tasks");
$statement->setFetchMode(PDO::FETCH_ASSOC);
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

		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

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
		<title>PHP TO-DO List</title>
	</head>
	<body>
			<h3 class="display-3">To-do List</h3>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form method="POST" action="index.php">
						<?php if(isset($errors) === true) {
							echo '<p>' . $errors . '</p>';
						}
						?>
						<div class="form-group">
							<input class="input" type="text" name="task" placeholder="Add a new item...">
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div><!-- /.col-md-4 -->
			</div><!-- /.row justify-content-center -->
		</div><!-- /.container -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8">
					<table class="table">
						<thead class="thead">
							<tr>
								<th>Task No.</th>
								<th>Task</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while($row = $statement->fetch()) {
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
				</div><!-- /.col-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</body>
</html>