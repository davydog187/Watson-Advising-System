$(document).ready(function(){
	$("#update_form").submit(function(event){
		$("input").attr("disabled", false);
		return true;
	});

});
