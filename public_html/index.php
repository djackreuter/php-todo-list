<?php require_once("../connect.php");

if(isset($_POST['submit'])) {
	$task = $_POST['task'];

	mysqli_query($conn, "INSERT INTO tasks (task) VALUES ('$task')");
	header('location: index.php');
}
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
		<title>PHP TODO List</title>
	</head>
	<body>
		<div class="jumbotron">
			<h3>Todo List</h3>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form method="POST" action="index.php">
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
				<tr>
					<td>1</td>
					<td class="task">This is the first task placeholder</td>
					<td class="delete">
						<a href="#">x</a>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>