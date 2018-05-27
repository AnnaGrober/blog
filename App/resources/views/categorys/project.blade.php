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
@include ('layouts.headerNavigetion')
<main role="main">
    <div>
        <div class="container">
            <h3>Вы опубликовали проекты:</h3>
            <div class="row">
                <div class="container">
                    <div class="row">
                        @foreach ($Data as $data)
                         @include ('categorys.selectForProject')
                        @endforeach

                    </div>
                </div>
            </div>
            <h3>Вы откликнулись на проекты:</h3>
            <div class="row">
                <div class="container">
                    <div class="row">
                        @foreach ($Data2 as $data)
                            @include ('categorys.selectForProject')
                        @endforeach

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