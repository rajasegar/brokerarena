window.fbAsyncInit = function() {
          FB.init({
            appId      : '311792845520010',
            status     : true, 
            cookie     : true,
            xfbml      : true,
            oauth      : true,
          });
        };
        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           d.getElementsByTagName('head')[0].appendChild(js);
         }(document));

		 
FB.Event.subscribe('auth.login', function(response) {
   login();
});
FB.Event.subscribe('auth.logout', function(response) {
   logout();
});
FB.getLoginStatus(function(response) {
   if (response.session) {
      greet();
   }
});

function login(){
   FB.api('/me', function(response) {
      alert('You have successfully logged in, '+response.name+"!");
   });
}
function logout(){
   alert('You have successfully logged out!');
}
function greet(){
   FB.api('/me', function(response) {
      alert('Welcome, '+response.name+"!");
   });
}
