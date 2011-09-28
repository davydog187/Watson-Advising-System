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
           $.each(students_found.students, function(i, student){
                $('#walkin_results').append(a.rectime + " " + a.firstname + " " + a.lastname + " " + a.bnumber); 
                buildStudent(student);
             });
        }
        $('#walkin_results').show();

				});
	});

});

function buildStudent(){
   alert("cool!");
function buildStudent(student){
    $('#walkin_results').append("<div class='student_block'>");
    $('#walkin_results').append("<label id='" + student.rectime + "' class='queue_data label' class='center'>".$row['bnumber']." ".$row['firstname']." ".$row['lastname']."</label> <input class='finish' type='submit' value='Finish'> <input class='delete' type='submit' value='Delete'>";
    echo "<div class='queue_data' id='".$row['bnumber']."' style='display:none'>";
    echo "<table>";
    printRow("<td class='bold'>Email:</td>"."<td>".$row['email']."</td>");
		printRow("<td class='bold'>Program:</td>"."<td>".$row['major']."</td>");
		printRow("<td class='bold'>Calendar Year:</td>"."<td>".$row['year']."</td>");
		printRow("<td class='bold'>Reason:</td>"."<td>".$row['reason']."</td>");
		printRow("<td class='bold'>Comments:</td>"."<td>".$row['comments']."</td>");
		echo "</table>";
		echo "<a class='oblique edit' id='".$row['bnumber']."'href=''>Edit ".$row['firstname']."'s info.</a>";
		echo "</div>";
    echo "</div>";
}

}
