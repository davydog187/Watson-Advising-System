$(document).ready(function(){
	var $page = $(this);

	$("#finish_form").submit(function(event){
		$page.find('input').removeAttr('disabled');
		return true;
	});

});
