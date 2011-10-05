$(document).ready(function(){
    $("#walkin_results_form").submit(function(event){
      event.preventDefault();
      window.location = "./finished_queue.php"

      });


    });
