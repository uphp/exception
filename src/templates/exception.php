<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>UPhp Exception :: RuntimeError</title>

    <!-- Bootstrap -->
    <link href="../src/assets/css/normalize.css" rel="stylesheet">
    <link href="../src/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../src/assets/css/uphp.css" rel="stylesheet">
    <link href="../src/assets/plugins/prism/prism_coy.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar">
        <div class="container">
            <div style="float: right;"><img width="60" height="60" style="margin-top: 40px; margin-right: 30px;" src="../src/assets/images/error_icon.png"></div>
            <div class="navbar-header">
                {{ TOP-TITLE }}
            </div>
        </div>
    </nav>

    <div class="container">
        {{ TRACE }}
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../src/assets/js/bootstrap.min.js"></script>
    <script src="../src/assets/plugins/prism/prism_coy.js"></script>
    <script src="../src/assets/js/custom.js"></script>
  </body>
</html>