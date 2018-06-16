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
            <div class=" sz">Добавившиеся  за месяц
                <br>
                <h1 class="font_h1"> <b>{{ $user_new}}</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12" >
            <div class=" sz">Всего заявок<br>
                <h1 class="font_h1"> <b>{{ $categ_count }}</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3  col-sm-6 col-xs-12">
            <div class=" sz"><br>
                <h1 class="font_h1"> <b>{{$Notcompleted}}</b></h1></div>
        </div>
    </div>
    <div class="row pt-5 pl-5">

        <div class="col-md-12  border col-sm-12 col-xs-12">

        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
            <div class=" sz3" >



                <div class="container">
                    <h id="tt"></h>
                    <form class="form1" method="POST" action="" id="find_name" name="find_name">
                        <input type="text" placeholder="Искать" id="find_user" name="find_user" autocomplete="off">

                        <div id="fin1">
                            @foreach ($data as $user)
                                <div id="fin12">
                                    <form method="POST" action="{{route('test.post')}}">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="media text-muted pt-3">
                                            <img class='data_img' src="{{asset('img').'/'.$user->photo}}" height='40px' >
                                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                <div class="d-flex justify-content-between align-items-center w-100">
                                                    <strong class="text-gray-dark">{{ $user->login}}</strong>
                                                    <div class="col-md-3">
                                                        <input name='n[]' class="name" id="name" value="{{ $user->id }}" type="hidden">
                                                        <button class="btn btn-dark btn1" id="hh" value="{{ $user->id }}" type="button"  name="block-but">Заблокировать</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endForeach

                        </div>
                    </form>
                </div>
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
<script src="{{ asset('js/admin_panel_js.js') }}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
{{--<script src="{{asset('js/js/bootstrap.min.js')}}"></script>--}}
</body>
</html>