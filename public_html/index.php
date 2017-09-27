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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

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
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card">
						<div class="task-list">
							<ul>
								<?php require("../connect.php");

								$query = $mysqli->query("SELECT * FROM tasks ORDER BY date ASC, time ASC");

								$numrows = mysqli_num_rows($query);
								if($numrows > 0) {
									while($row = mysqli_fetch_assoc($query)) {
										$task_id = $row['id'];
										$task_name = $row['task'];

										echo "<li>" . '$task_name' . "</li>";
									}
								}
								?>
							</ul>
						</div><!-- /.task-list -->
					</div><!-- /.wrap -->
				</div><!-- /.col-md-4 -->
			</div><!-- /.row justify-content-center -->
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form class="add-new-task" autocomplete="off">
						<div class="form-group">
							<input type="text" name="new-task" placeholder="Add a new item...">
						</div>
					</form>
				</div><!-- /.col-md-4 -->
			</div><!-- /.row justify-content-center -->
		</div><!-- /.container -->
	</body>
</html>