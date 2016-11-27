<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') Nutbolts Gallery</title>

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css">
    <link href="/css/ripples.min.css" rel="stylesheet" type="text/css">

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="/css/lightbox.min.css" rel="stylesheet" type="text/css">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
        /* centered columns styles */
        .col-centered {
            display:inline-block;
            float:none;
            /* inline-block space fix */
            margin-right:-4px;
            margin-top: 8px;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/">Nutbolts Gallery</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <ul class="nav navbar-nav navbar-right">
                        <li><a href="/"><i class="fa fa-btn fa-home"></i>Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')

<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/lightbox.min.js"></script>

<script>
    $(document).ready(function () {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>