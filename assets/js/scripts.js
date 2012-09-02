$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	$('a[rel=popover]').popover();
	$('.typeahead').typeahead();

	
	/*$('#logintabs').tabs();
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
    
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });*/
	
	/*$('#slider').slides({
					preload: true,
					preloadImage: 'images/loading.gif',
					play: 5000,
					pause: 1500,
					hoverPause: true
				});*/
	
});

function display_alert_success(text,neighbour) {
	$('div.alert-success').remove();
	$('<div/>').html('<a class="close" data-dismiss="alert">×</a>')
		.append(text)
		.addClass("alert alert-success")
		.insertBefore(neighbour);
	}
	
function display_alert_error(text,neighbour) {
	$('div.alert-error').remove();
	$('<div/>').html("<a class='close' data-dismiss='alert'>×</a>")
		.append(text)
		.addClass("alert alert-error")
		.insertBefore(neighbour);
}
