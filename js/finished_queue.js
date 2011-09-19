$(document).ready(function(){

	$("#datepicker").datepicker();

	$("#query_form").submit(function(event){
		event.preventDefault();

		$("#query_student").hide();

		var dt = $(this).find('input[name="datepicker"]').val(),
				bn   = $(this).find('input[name="bnumber"]').val(),
				fn   = $(this).find('input[name="firstname"]').val(),
				ln   = $(this).find('input[name="lastname"]').val(),
				pg   = $(this).find('input[name="program"]').val(),
				rs   = $(this).find('select[name="reason"]').val();
//		alert(date + bn + fn + ln + pg + rs);
		$.post("./php_core/find_finished.php", {date: dt, bnumber: bn, fname: fn, lname: ln, program: pg,
				reason: rs}, function(data) {



				});
	});

});
