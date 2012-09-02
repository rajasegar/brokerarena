$(document).ready(function() {
		
		
		
		
		
		
		
		$('i.icon-chevron-up').addClass('clickable')
			.click(function() {
				var $box = $('div#compare_tray');
				if ($box.height() > 22) {
					$(this).removeClass('icon-chevron-down');
					$(this).addClass('icon-chevron-up');
					$box.animate({ height : '50px' });
				} else {
					$(this).removeClass('icon-chevron-up');
					$(this).addClass('icon-chevron-down');
					$box.animate({ height : '150px' });
				}

			});
			
			$("#lstBrokers").dropdownchecklist({icon:{},width:500,maxDropHeight:150,positionHow:'relative'});
			
			$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600,
			modal: true,
			buttons: {
				"Add Broker": function() {
					$.ajax( 
					{ 
						type: "GET", 
						url: "ajax_getBrokerInfo.php", 
						data: {'id':$('#lstBrokers').val()},
						dataType:'json',
						success: 
							function(t) 
							{ 
								//alert(t);
								populate_columns(t);
								$("#dialog-form").dialog("close");
							}, 
						error: 
							function() 
							{ 
								$("div#info").append("An error occured during processing")
									.addClass("msg_error"); 
							} 
					}); 
					
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				//allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$('#compare_tray ul li a').hover(function() {
			console.log("hover");
		});
	
	});
	
	function removefromTray(id) {
		console.log(id);
		$.ajax( 
			{ 
				type: "GET", 
				url: "ajax_removefromCompareTray.php", 
				data: {'id':id},
				dataType:'html',
				success: 
					function(t) 
					{	
						console.log("ajax success");
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
	
