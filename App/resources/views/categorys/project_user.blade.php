<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Детали</title>
    <script src="../bootstrap/dist/js/jquery.min.js"></script>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles2.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid header">
    @include ('../navigation')
    <main role="main">
        <div>
            <div class="container">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ml-5">
                    <h3>Завершенные проекты пользователя: {{$user->name}}</h3>
                    <div class="row">
                        <div class="container">
                            <div class="row">

                                    @include ('categorys.select_project_users')


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@include ('layouts.footerNavigation')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../bootstrap/dist/js/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>