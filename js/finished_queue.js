$(document).ready(function(){

	$("#datepicker").datepicker();

	$("#results_table > tbody >tr").live("mouseover mouseout", function(event){
		if(event.type == "mouseover"){
			$(this).addClass("hover");
		}
		else{
			$(this).removeClass("hover");
		}
	});

	$("#results_table > tbody > tr").live("click", function(event){
		$(this).addClass("selected").siblings().removeClass("selected");
	});

	$('#walkin_results').hide();

	$("#query_form").submit(function(event){
		event.preventDefault();

		$("#query_student").hide();

		var dt = $(this).find('input[name="datepicker"]').val(),
				bn   = $(this).find('input[name="bnumber"]').val(),
				fn   = $(this).find('input[name="firstname"]').val(),
				ln   = $(this).find('input[name="lastname"]').val(),
				pg   = $(this).find('input[name="program"]').val(),
				rs   = $(this).find('select[name="reason"]').val();

    $.post("./php_core/find_finished.php", {date: dt, bnumber: bn, fname: fn, lname: ln, program: pg,
				reason: rs}, function(data) {
        var students_found = $.parseJSON(data);
        if(students_found.error != false){
            $("#walkin_results").append(students_found.error);
        }
        else{
           $.each(students_found.students, function(i, student){
                buildStudent(student, i);
             });
        }
        $('#walkin_results').show();

				});
	});

});

function buildStudent(student, i){
		var datetime = student.rectime.split(" ");
		var row = "<tr><td>" + (i+1) + ".)</td><td>" + datetime[0] + "</td>"
			+ "<td>" + datetime[1] + "</td>"
			+ "<td>" + student.bnumber + "</td>"
			+ "<td>" + student.firstname + " " + student.lastname + "</td>"
			+ "<td>" + student.major + "</td>"
			+ "<td>" + student.reason + "</td>"
		$('#results_table > tbody').append(row);
}
