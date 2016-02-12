$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var tickettype_id = sessionStorage.getItem('ticket_typeId');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "tickettype-action.php?action=edit&tickettypeid="+tickettype_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".add").click(function() {                
    	var tickettype_id = sessionStorage.getItem('ticket_typeId');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "tickettype-action.php?action=add&tickettypeid="+tickettype_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });
});