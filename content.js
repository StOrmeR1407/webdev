$(document).ready(function(){
	
	$('#execute').click(function(){
		$.post('call-api.php',	          
    	{							
        	ten: $('#ten').val(),	   
      		email: $('#email').val(),
      		web: $('#web').val(),
      		gender: gender_check = $("input[name='radioGroup']:checked").val(),
      		time: $('#time').find(":selected").val(),
      		time_check: $('#calendar').val(),
      		story: $('#story').val(),
    	},
	    function(data){
	    	$('#result').html(data);
	    	$('#result').css('color','gray');		   
	    });	    	    
	});	
	
	$('#set_cookies').click(function(){
		$.post('cookies.php',	          
    	{							
        	ten: $('#ten').val(),	   
      		email: $('#email').val(),
      		web: $('#web').val(),
      		gender: gender_check = $("input[name='radioGroup']:checked").val(),    	
      		name_cookies: $('#name_cookies').val(),
    	},
	    function(data){
	    	$('#result').html(data);
	    	$('#result').css('color','gray');		   
	    });	    	    
	});
	
	$('#set_session').click(function(){
		$.post('session.php',	          
    	{							
        	ten: $('#ten').val(),	   
      		email: $('#email').val(),
      		web: $('#web').val(),
      		gender: gender_check = $("input[name='radioGroup']:checked").val(),    	
    	},
	    function(data){
	    	$('#result').html(data);
	    	$('#result').css('color','gray');		   
	    });	    	    
	});
});
