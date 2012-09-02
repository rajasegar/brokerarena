$(document).ready(function(){   
  $('#logintabs').tabs();
	var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
		$('#txtUserid').focus();
    });
    $('#logintabs').mouseup(function() {
		return false;
	});
    //form.mouseup(function() { 
    //    return false;
    //});
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
	
	$('#slider').slides({
					preload: true,
					preloadImage: 'images/loading.gif',
					play: 5000,
					pause: 1500,
					hoverPause: true
				});
	
	
  
});  

 
