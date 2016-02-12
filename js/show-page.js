$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var show_id = sessionStorage.getItem('show_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "show-action.php?action=edit&showid="+show_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".delete").click(function() {                
    	var show_id = sessionStorage.getItem('show_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "show-action.php?action=delete&showid="+show_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".add").click(function() {                
      var show_id = sessionStorage.getItem('show_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "show-action.php?action=add&showid="+show_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
      });

});