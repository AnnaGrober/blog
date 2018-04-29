<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Редактор</title>
    <script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/styles2.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row pl-5 pt-5">
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <div class="sz">Количество объявлений<br>
                <h1 class="font_h1">
                    <b>{{$col}}</b>
                </h1>
                <input type="button" id="All" value="Просмотр" class="btn btn-secondary">
                <input type="button" id="None" value="Скрыть" style="display: none;" class="btn btn-secondary">
            </div>

        </div>
        <div class="col-md-3 col-lg-3  col-sm-6 col-xs-12">
            <div class="sz">В режиме набора пользователей <br>
                <h1 class="font_h1"> <b>{{$set}}</b></h1>
                <input type="button" id="set" value="Просмотр" class="btn btn-secondary ">
                <input type="button" id="set_none" value="Скрыть" style="display: none;" class="btn btn-secondary">
            </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <div class="sz">В режиме выполнения<br>
                <h1 class="font_h1"> <b>{{$runtime}}</b></h1>
                <input type="button" id="run" value="Просмотр" class="btn btn-secondary ">
                <input type="button" id="run_none" value="Скрыть" style="display: none;" class="btn btn-secondary">
            </div>
        </div>

        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12" >
            <div class="sz">Завершенные  <br>
                <h1 class="font_h1"> <b>{{$completed}}</b></h1>
                <input type="button" id="comp" value="Просмотр" class="btn btn-secondary ">
                <input type="button" id="comp_none" value="Скрыть" style="display: none;" class="btn btn-secondary">
            </div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12" >
            <div class="sz">Завершенные  по времени<br>
                <h1 class="font_h1"> <b>{{$completed_time}}</b></h1>
                <input type="button" id="comp_time" value="Просмотр" class="btn btn-secondary ">
                <input type="button" id="comp_time_none" value="Скрыть" style="display: none;" class="btn btn-secondary">
            </div>
        </div>
    </div>
    <div class="row pt-5 pl-5" id="change">

    </div>
<script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/red.js')}}" type="text/javascript"></script>
</body>
</html>