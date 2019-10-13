<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Blank Page</title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{asset("beyondadmin/img/favicon.png")}}" type="image/x-icon">
    <base href="/">
    <!--Basic Styles-->
    <link type="text/css" href="/beyondadmin/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" href="/beyondadmin/css/font-awesome.min.css" rel="stylesheet" />
    <link type="text/css" href="/beyondadmin/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link type="text/css"  id="beyond-link" href="/beyondadmin/css/beyond.min.css" rel="stylesheet" />
    <link type="text/css" href="/beyondadmin/css/typicons.min.css" rel="stylesheet" />
    <link type="text/css" href="/beyondadmin/css/animate.min.css" rel="stylesheet" />

    @yield("css")
</head>

<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    @yield("viewcontent")

    <!--Basic Scripts-->
    <script type="text/javascript" src="/beyondadmin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/beyondadmin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/beyondadmin/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="/beyondadmin/js/select2/select2.full.js"></script>

    <!--Beyond Scripts-->
    <script type="text/javascript" src="/beyondadmin/js/skins.js"></script>
    <script type="text/javascript" src="/beyondadmin/js/beyond.js"></script>

    @yield("basejs")

    @yield("js")
</body>
</html>