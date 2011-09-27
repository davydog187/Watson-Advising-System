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
		
    $.post("./php_core/find_finished.php", {date: dt, bnumber: bn, fname: fn, lname: ln, program: pg,
				reason: rs}, function(data) {
        var students_found = $.parseJSON(data);
        if(students_found.error != false){
            $("#walkin_results").append(students_found.error);
        }
        else{
           $.each(students_found.students, function(i, a){
                $('#walkin_results').append(a.rectime + " " + a.firstname + " " + a.lastname + " " + a.bnumber); 

             });
        }
        $('#walkin_results').show();

				});
	});

});
