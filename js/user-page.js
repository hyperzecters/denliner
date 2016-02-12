$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var user_id = sessionStorage.getItem('user_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "user-action.php?action=edit&userid="+user_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".delete").click(function() {                
    	var user_id = sessionStorage.getItem('user_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "user-action.php?action=delete&userid="+user_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });
});