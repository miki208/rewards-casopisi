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
      var userId;
      var name;

      function statusChangeCallback(response){
        console.log(response.status);
        if(response.status === 'connected'){
          //user logged in
          initApp(response);
        } else if(response.status === 'not_authorized') {
          //please authorize app
          document.getElementById("login_button").disabled = false;
        } else {
          //please log in
          document.getElementById("login_button").disabled = false;
        }
      };

      function logIn(){
        FB.login(function(response){
          if(response.status === 'connected'){
            //user logged in
            initApp(response);
          } else if(response.status === 'not_authorized'){
            //sorry...
            console.log('Authorization cancelled');
            fail();
          } else{
            //sorry
            console.log('Logging in cancelled');
            fail();
          }
        }, {scope : 'public_profile,email'});
      };

      function fail(){
        window.location = "failed.html";
      };

      function initApp(response){
        console.log(response);
        document.getElementById("login_screen").style.visibility = "hidden";
        accessToken = response.authResponse.accessToken;
        FB.api('/me', function(response){
          console.log(response);
          name = response.name;
          userId = response.id;
        });
      };

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

    <div id="login_screen">
      <div id="login_button_wrapper">
        <button id="login_button" type="button" onclick="logIn()" disabled>Log in</button>
      </div>
    </div>

    <div id="wrapper">
      <header>
        <h1>Rewards</h1>
      </header>
      <main>
        <?php
          for($i = 1; $i <= 100; $i++)
          {
            echo "<div class='reward'><p>$i</p></div>\n";
          }
        ?>

      </main>
    </div>
  </body>
</html>
