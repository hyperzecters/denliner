$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var venue_id = sessionStorage.getItem('venue_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "venue-action.php?action=edit&venueid="+venue_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".delete").click(function() {                
    	var venue_id = sessionStorage.getItem('venue_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "venue-action.php?action=delete&venueid="+venue_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".add").click(function() {                
      var venue_id = sessionStorage.getItem('venue_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "venue-action.php?action=add&venueid="+venue_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
      });
});