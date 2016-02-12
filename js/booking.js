	$(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();

	  $("#from").change(function() {                

        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "venuename.php?location=from&venue="+$("#from").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#r_from").html(response);
          }
        });
  	  });

	  $("#to").change(function() {                

        $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "venuename.php?location=to&venue="+$("#to").val(), 
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#r_to").html(response);
          }
        });
  	  });

    $("#persons").change(function() {
      var persons = $("#persons").val();
      $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: 'venuename.php?persons='+persons+'&class='+$('.tickettype').val()+'&from='+$('#from_venue').val()+
          '&to='+$('#to_venue').val()+'&train='+$('#train').val()+'&departure='+$('select[name=departure]').val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#r_cs").html(response);
          }
        });
      });

    $("#group").click(function() {
      $("#persons").removeAttr('disabled');
      $("#price").text('Rp. 0,-');
    });

    $("#individu").click(function() {
      $("#persons").val('1');
      $("#persons").attr('disabled','disabled');
      $("#price").text('Rp. 0,-');
      $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: 'venuename.php?persons=1&class='+$('.tickettype').val()+'&from='+$('#from_venue').val()+'&to='+$('#to_venue').val()+
          '&train='+$('#train').val()+'&departure='+$('select[name=departure]').val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#r_cs").html(response);
          }
        });
    });

    $("#calculate").click(function() {
      if ($("#persons").val() != 0){
      $.ajax({    //create an ajax request to load_page.php
          type: "POST",
          url: "price.php?persons="+$("#persons").val(),
          data: $('.tickettype'),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#price").html(response);
          }
        });
    }
    });

    $("#booking").click(function() {
      $("#persons").removeAttr('disabled');
    });

    $("#check").click(function() {
      $.ajax({    //create an ajax request to load_page.php
          type: "GET",
          url: "venuename.php?getclass=&train="+$("#train").val(),
          dataType: "html",   //expect html to be returned                
          success: function(response){                    
            $("#r_class").html(response);
          }
        });
    });

    });
	
	