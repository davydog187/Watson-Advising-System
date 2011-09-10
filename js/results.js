$(document).ready(function(){
	//Action for back button
	$("#back").click(function(event){
		window.location = "./index.php";
	    });

	//Action for submit button
	$("#search_form").submit(function(event){

		//Prevent default form action
		event.preventDefault();

		//Hide the search form
		$("#search").hide();

		//grab form element data
		var bn = $(this).find('input[name="bnumber"]').val(),
		    fn = $(this).find('input[name="fname"]').val(),
		    ln = $(this).find('input[name="lname"]').val();

		//Perform ajax magic!! MUAHAHA
		$.post("./php_core/find_student.php", {bnumber: bn, fname: fn, lname: ln}, function(data){
			if(data!=""){
			    $("#results").append(data);
			}
			else{
			    $("#results").append("No students matched the search criteria");
			    $("#submit").hide();
			}
			//Show new data
			$("#search_results").show();
		    });

	    });
    });
