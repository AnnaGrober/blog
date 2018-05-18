<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->

    <script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles1.css" rel="stylesheet">
    <link href="styles/styles2.css" rel="stylesheet">
    <link href="css/form-validation.css" rel="stylesheet'">
</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="navbar nav_Menu">
        <nav class="navbar navbar-right navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark navbar-default  fixed-top navMenu">
            <div class="container-fluid">
                <!--  <a class="navbar-brand pl-200" href="#"></a>-->
                <a  href="{{('index')}}">Home</a>
            </div>
        </nav>
    </div>
</div>
<div class="container">
    <div class="py-5 text-center">
        <h2>Вы заблокированы</h2>
    </div>

</div>
@include ('layouts.footerNavigation')

</body>