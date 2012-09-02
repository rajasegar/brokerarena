var max = 0;
$(document).ready(function() {
	
	$('.compare').change(function() {
		if($(this).attr('checked') == 'checked')
		{
			max++;
			if(max > 4)
			{
				alert("Sorry! \nOnly upto 4 no. of Brokers can be compared at a time");
				$(this).attr('checked','');
				max--;
			}
			else
			{
				$.ajax( 
					{ 
						type: "GET", 
						url: "ajax_add2CompareTray.php", 
						data: {'id':$(this).attr('value')},
						dataType:'html',
						success: 
							function(t) 
							{	
								console.log("ajax success");
								//console.log(t); 
								$('#brokers_list').html(t);
								
							}, 
						error: 
							function() 
							{ 
								$("div#info").append("An error occured during processing")
									.addClass("msg_error"); 
							} 
					}); 
			}
		}
		else
		{
			max--;
			$.ajax( 
					{ 
						type: "GET", 
						url: "ajax_removefromCompareTray.php", 
						data: {'id':$(this).attr('value')},
						dataType:'html',
						success: 
							function(t) 
							{	
								console.log("ajax success");
								//console.log(t); 
								$('.compare_tray ul').html(t);
								
							}, 
						error: 
							function() 
							{ 
								$("div#info").append("An error occured during processing")
									.addClass("msg_error"); 
							} 
					}); 
		}
		
		
		
		
	});
});
