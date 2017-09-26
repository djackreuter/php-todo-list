// call the add task function
add_task();

function add_task() {
	$('.add-new-task').submit(function() {
		var new_task = $('.add-new-task input[name=new-task]').val();

		if(new_task !== '') {
			$.post('../php/add-task.php', { task: new_task }, function(data) {
				$('.add-new-task input[name=new-task]').val('');
				$(data).appendTo('.task-list ul').hide().fadeIn();
			});
		}
		// make sure form doesn't submit twice
		return false;
	});
}