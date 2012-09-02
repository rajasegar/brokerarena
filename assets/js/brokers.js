var max = 0;
$(document).ready(function() {
	$('.compare').change(function() {
		var $pp = $(this).parents('fieldset');
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
								$pp.html(' <a href="compare.php" class="btn btn-primary">Compare</a>');
								//$("<a/>").addClass("btn btn-primary")
								//	.html('Compare')
								//	.insertAfter($control);
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
	
	$('.chkFilter').change(function() {
		console.log('hello');
		var filter = $(this).attr('value');
		if($(this).attr('checked') == 'checked') {
			// add filter
			console.log('checked');
			$.ajax( 
					{ 
						type: "GET", 
						url: "ajax_filterbrokers.php", 
						data: {'filter':filter,'mode':1},
						dataType:'html',
						success: 
							function(t) 
							{	
								console.log("ajax success");
								$('#brokers_wrap').html(t);
								
							}, 
						error: 
							function() 
							{ 
								console.log("ajax fail");
								$("div#info").append("An error occured during processing")
									.addClass("msg_error"); 
							} 
					}); 
		}
		else {
			// remove filter
			console.log('unchecked');
			$.ajax( 
					{ 
						type: "GET", 
						url: "ajax_filterbrokers.php", 
						data: {'filter':filter,'mode':2},
						dataType:'html',
						success: 
							function(t) 
							{	
								console.log("ajax success");
								$('#brokers_wrap').html(t);
								
							}, 
						error: 
							function() 
							{ 
								console.log("ajax fail");
								$("div#info").append("An error occured during processing")
									.addClass("msg_error"); 
							} 
					}); 
		}
		$('div.pagination').remove();
	});
	
	$('#filter_wrap ul li a').click(function(ev) {
			//alert($(this).attr('href'));
			//loadPage(this.href);
			$('#filter_wrap ul li a.selected').removeClass('selected');
			$(this).addClass('selected');
			//ev.preventDefault();
	});
	
	$('#lstPageSize').change(function() {
		if($(this).val() == '999') {
			alert("This may take a while to fetch all the information... \nPlease wait for some time...");
		}
		
		$.ajax( 
		{ 
			type: "GET", 
			url: "ajax_setpagesize.php", 
			data: {'size':$(this).val()},
			dataType:'html',
			success: 
				function(t) 
				{	
					fetchBrokers();
					
				}, 
			error: 
				function() 
				{ 
					console.log("ajax fail");
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
					
	});
	
	// Order by call
	$('#lstOrderBy').change(function() {
		
		
		$.ajax( 
		{ 
			type: "GET", 
			url: "ajax_setorderby.php", 
			data: {'orderby':$(this).val()},
			dataType:'html',
			success: 
				function(t) 
				{	
					fetchBrokers();
					
				}, 
			error: 
				function() 
				{ 
					console.log("ajax fail");
					$("div#info").append("An error occured during processing")
						.addClass("msg_error"); 
				} 
		}); 
					
	});

});

function fetchBrokers() {
	$.ajax( 
	{ 
		type: "GET", 
		url: "ajax_filterbrokers.php", 
		data: {'filter':0,'mode':3},
		dataType:'html',
		success: 
			function(t) 
			{	
				console.log("ajax success");
				$('#brokers_wrap').html(t);
				
			}, 
		error: 
			function() 
			{ 
				console.log("ajax fail");
				$("div#info").append("An error occured during processing")
					.addClass("msg_error"); 
			} 
	}); 
}

function validateBrokerCount()
{
	if(max < 2)
	{
		alert("Sorry! \n Please select atleast 2 no. of Brokers to compare");
		return false;
	}
	return true;
	
}
