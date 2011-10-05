$(document).ready(function(){
    $('.delete').click(function(event){
        event.preventDefault();
        var time = $(this).prev().prev().attr("id");
        $.post("./php_core/remove_student.php", {rectime: time}, function(){
            window.location.reload();
          });
      });

		$("label").hover(function(){
				$(this).addClass("hover-text");
		},
		function(){
				$(this).removeClass("hover-text");
		});

    $('.finish').click(function(event){
        event.preventDefault();
        var time = $(this).prev().attr("id");
        window.location= "./finish_student.php?rectime=" + time;
      });

    $('.edit').click(function(event){
		    event.preventDefault();
		    var bnum = $(this).attr('id');
		    var form_data = "<form id='edit-form' action='./edit_student.php' method='POST'>";
		    form_data += "<input type='hidden' name='bnumber' value='" + bnum + "'></form>";
		    $("#edit-div").append(form_data);
		    $('#edit-form').submit();
	    });

	  $('.label').toggle(function(){
		    $(this).next().next().next().show();
	    },
	    function(){
		    $(this).next().next().next().hide();

	    });


    });
