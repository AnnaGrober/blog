<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Форум</title>

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles2.css" rel="stylesheet">
	 <link href="../bootstrap/dist/css/offcanvas.css" rel="stylesheet">
  </head>
  
   <body class="bg-light">
   @include ('../layouts.headerNavigetion')
	  <div class="container-fluid">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple box-shadow">
        <div>

          <h3 class="mb-0 text-white lh-100">{{$subject}}</h3>
          <div>Обсуждение темы {{$subject}}</div>
        </div>

      </div>
	  	<div class="my-3 p-3 bg-white rounded box-shadow">
                @foreach ($forums as $Message)
                <form  method="POST" action="../updating_massage/{{$Message->id}}">
	        <div class="row media text-muted pt-3">

	          <div class="media-body pb-3 mb-0 big  lh-125 border-bottom border-gray">
	            <strong class="d-block" style="color: #00b3ee;"> Пользователь:{{$Message->user}}</strong>
                 <h4 > <pre>{{$Message->message}} </pre>  </h4>

                      @foreach ($img as $imges)
                          @if(($Message->id) == ($imges->message) )
                     <img src="../upload/{{$imges->img}}" >
                      @endif
                          @endforeach

              </div>
                @isset (Auth::user()->id )
                  @if(($Message->user_id) === ( Auth::user()->id))
                    <a href="../del_message_for_forum/{{$Message->id}}"  class="btn" id="delete_mes" style=" color:black; border: none; " role="button">Удалить</a>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 resp" ><input type="button" class="btn secondary"  onclick="Update_message({{$Message->id}})" id="updating_mes{{$Message->id}}" value="Изменить">
                    <input type="button" class="btn secondary"  onclick="Close_button_message({{$Message->id}})" id="close_button_mes{{$Message->id}}" style="display: none;" value="Закрыть"> </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 box-shadow" id="change_for_update_mes{{$Message->id}}"   style="display: none; background: radial-gradient(white,#f4f6f9);">
                        @include ('forum.update_forum_mes')
                    </div>
                    @endif
                @endisset

	        </div>
                </form>
            @endForeach

                {{ $forums->links()}}
	      </div>

          @include ('forum.create_forum_message')
	</div>
   @include ('../layouts.footerNavigation')

  <script src="../bootstrap/dist/js/jquery.js"></script>
   <script src="{{asset('../js/forum.js')}}" type="text/javascript"></script>
  <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
       <script src="../offcanvas.js"></script>
  </body>
</html>

