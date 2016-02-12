$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var seat_id = sessionStorage.getItem('seatId');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "seat-action.php?action=edit&seatid="+seat_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".add").click(function() {                
    	var seat_id = sessionStorage.getItem('seatId');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "seat-action.php?action=add&seatid="+seat_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){
            $("#edit-delete").html(response);
          }
        });
  	  });
});