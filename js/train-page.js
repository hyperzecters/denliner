$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

    $(".edit").click(function() {                
    	var train_id = sessionStorage.getItem('train_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "train-action.php?action=edit&trainid="+train_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".delete").click(function() {                
    	var train_id = sessionStorage.getItem('train_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "train-action.php?action=delete&trainid="+train_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
  	  });

    $(".add").click(function() {                
      var train_id = sessionStorage.getItem('train_id');
        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "train-action.php?action=add&trainid="+train_id+"&page="+$("#page-value").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#edit-delete").html(response);
          }
        });
      });
});