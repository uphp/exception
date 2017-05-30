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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                {{ TOP-TITLE }}
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Trace PHP</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            {{ TRACE }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">{{ PREVIUS }}</div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../src/assets/js/bootstrap.min.js"></script>
  </body>
</html>