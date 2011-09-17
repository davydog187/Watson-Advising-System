//code for queue
$(document).ready(function(){
	//Grabs the page to be used in functions
	var $page = $(this);

	//Load waiting queue when page is loaded
	loadList();

  $('.edit').click(function(event){
        event.preventDefault();
        var bnum = $(this).attr('id');
        var form_data = "<form id='edit-form' action='./edit_student.php' method='POST'>";
        form_data += "<input type='hidden' name='bnumber' value='" + bnum + "'></form>";
        $("#edit-div").append(form_data);
        $('#edit-form').submit();
    });



	//action for when a remove is clicked
	$(".remove").live("click", function(event){
		event.preventDefault();
		var time = $(this).attr("href");

		//remove student from the database and reload the list
		$.post("./php_core/remove_student.php", {rectime: time}, function(){
			loadList();
		    });
	    });

	//action for submitting data
	$("#new_waiter").submit(function(event){
		//Prevent default form action
		event.preventDefault();
		$("#submit").attr("disabled", "true");//prevents double clicking

		//Grab all form elements
		var bnum = $page.find('label[name="bnumber"]').text(),
		    reason_form = $page.find('#reason').val(),
		    comments_form = $page.find('textarea[name="comments"]').val();


		//send data to be added to waiting table
		$.post("./php_core/add_to_waiting.php", {bnumber: bnum, reason: reason_form, comments: comments_form},
		       function(){
			   loadList();
			   //Redirect after posting data
			   window.location = "./main_queue.php";
		       });
	    });

	//loads the list into the waiting div
	function loadList(){
	    $.post("./php_core/get_waiting.php", function(data){
		    var waiting_list = $.parseJSON(data);
		    $("#waiting").empty();
		    if(waiting_list.length==0){
			      $("#waiting").append("No students waiting.");
		    }
		    else{
			$.each(waiting_list, function(index, element){
				var person = "<tr>";
				person += "<td>" + (index+1) + ". </td";
				person += "<td id=\'queue_name\'>" + element.firstname + " " + element.lastname + "</td>";
				person += "<td><a class=\'remove' href=\'" + element.rectime + "\'>Remove</a></td>";
				person += "</tr>";
				$("#waiting").append(person);
			    });
		    }
		});
	};
    });
