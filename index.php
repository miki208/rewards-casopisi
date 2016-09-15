<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="index.css">
  </head>

  <body>
    <script>
      var accessToken;

      function statusChangeCallback(response){
        alert(response.status);
        if(response.status === 'connected'){
          //user logged in
          accessToken = response.authResponse.accessToken;
          initApp();
        } else if(response.status === 'not_authorized') {
          //please authorize app
        } else {
          //please log in
        }
      };

      function logIn(){
        FB.login(function(response){
          if(response.status === 'connected'){
            //user logged in
            accessToken = response.authResponse.accessToken;
            initApp();
          } else if(response.status === 'not_authorized'){
            //sorry...
          } else{
            //sorry
          }
        }, {scope : 'public_profile,email'});
      };

      function initApp(){

      }

      window.fbAsyncInit = function() {
        FB.init({
          appId      : '201331556950198',
          xfbml      : false,
          version    : 'v2.7'
        });

        //login stuff
        FB.getLoginStatus(function(response){
          statusChangeCallback(response);
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/sr_RS/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <h1>Welcome</h1>
  </body>
</html>
