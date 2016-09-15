<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="index.css">
  </head>

  <body>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '201331556950198',
          xfbml      : false,
          version    : 'v2.7'
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
