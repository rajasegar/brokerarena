// broker_analytics.js
$(document).ready(function() {
	
	$.ajax( 
			{ 
				type: "POST",
				url: "ajax_ga_visits.php", 
				data: {}, 
				success: 
					function(t) 
					{ 
						$("div#divVisits").html(t);
					}, 
				error: 
					function() 
					{ 
						$("div#info").append("An error occured during processing")
							.addClass("msg_error"); 
					} 
			}); 
	   
    
    $('#ajaxStatus')
		.ajaxStart(function() {
			$(this).show();
		})
		.ajaxSend(function() {
			$(this).html('Sending request...');
		})
		.ajaxStop(function() {
			$(this).html('Request completed...');
			var t = this;
			setTimeout(function() {
			$(t).hide();
			}, 500);
		});

});


