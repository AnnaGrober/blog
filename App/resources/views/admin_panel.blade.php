<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Администратор</title>

    <!-- Bootstrap core CSS -->
    {{--<script src="{{asset('css/js/jquery.min.js')}}"></script>--}}
    {{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/styles1.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles2.css')}}" rel="stylesheet">

</head>

<body class="rbackground">
@include ('layouts.headerNavigetion')

<div class="container-fluid">
    <div class="row pl-5 pt-5">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class="sz">Общее количество пользователей<br>
                <h1 class="font_h1"><b>{{ $user_count }}</b></h1>
            </div>

        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class=" sz">Всего заявок
                <br>
                <h1 class="font_h1"> <b>{{ $categ_count }}</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12" >
            <div class=" sz">Выполенные заявки<br>
                <h1 class="font_h1"> <b>10</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3  col-sm-6 col-xs-12">
            <div class=" sz">Невыполенные заявки<br>
                <h1 class="font_h1"> <b>10</b></h1></div>
        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-md-6  col-sm-12 col-xs-12">
            <div class="sz1 border">

            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12">
            <div class="container">
                <div class="row" align="left">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div>
                            <canvas id="myCanvas">
                            </canvas>
                            <script type="text/javascript" src="{{asset('js/round_diagram.js')}}"></script>
                        </div>
                    </div>
                </div>
                <div class="row" align="left">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 pt-3">
                        <div>
                            <canvas id="myCanvas2">
                            </canvas>
                            <script type="text/javascript" src="{{asset('js/round_diagram2.js')}}"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
            <div class=" sz3" >
                {{--<div class="container">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-lg-6 col-ms-12 col-xm-12">--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-lg-6 col-ms-12 col-xm-12">--}}
                {{--<div class="d1 pl-10">--}}
                {{--<form class="form1" method="POST" action="" id="" name="name">--}}
                {{--<input type="text" placeholder="Искать">--}}
                {{--<button type="submit"></button>--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}





                <div class="container">

                    @foreach ($data as $user)
                        <form method="POST" action=""  name='{{ $user->id }}'>
                            <div class="media text-muted pt-3">
                                <img class='data_img' src='{{ $user->photo }}' height='40px' >
                                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <strong class="text-gray-dark">{{ $user->login}}</strong>
                                        <div class="col-md-3">  <button class="btn btn-dark btn-sm" name='{{ $user->id }}' id='{{ $user->id }}' type="submit">Заблокировать</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endForeach


                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >
            <div class="border sz3">

            </div>
        </div>
    </div>
</div>
@include ('layouts.footerNavigation')
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{asset('js/js/jquery.js')}}"></script>--}}
{{--<script src="{{asset('js/js/bootstrap.min.js')}}"></script>--}}
</body>
</html>