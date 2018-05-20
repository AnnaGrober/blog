<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Форум</title>

    <!-- Bootstrap core CSS -->

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap/dist/css/offcanvas.css" rel="stylesheet">
	  <link href="styles/styles2.css" rel="stylesheet">
  </head>
  
   <body class="bg-light">
   <div class="container-fluid" >
   @include ('layouts.headerNavigetion')
	  <main role="main" class="container header">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple box-shadow">

        <div class=" w-25">
          <h6 class="mb-0 text-white lh-100">Форум</h6>
          <small>Обсуждайте с нами</small>
        </div>
        <div class=" w-75 text-center justify-content-center">
        <button class="btn btn-success" id="creating_sub">Добавить обсуждение</button>
        </div>
      </div>
          <div id="change_for_create" style="display: none;">
              @include ('forum.create_forum')
          </div>

		  @foreach ($subject as $Subject)

	  	<div class="my-3 p-3 bg-white rounded box-shadow">
            <form    action="updating_subject" method="post">
	        <div class="row media text-muted pt-3">



                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 d-block text-gray-dark">
                        <a href="forum/{{$Subject->id}}">
                    <h4>{{ $Subject->subject_name }}</h4>
                  <?php $k = 0; ?>
                  @foreach ($forums as $Message)
                      @if ((($Subject->id) === ($Message->subject)) && ($k===0))
                  {{$Message->message}}
                        </a>
                    </div>

                        @if(($Message->user) === ( Auth::user()->id))

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 resp" >
                        <a href="del_subject_for_forum/{{$Subject->id}}"  class="btn" id="delete_subj" style="height: 30px; margin-bottom:10px; padding-top: 4px; color:black; border: none; " type="button">Удалить</a>
                        <input type="button" class="btn secondary"  onclick="Update_subject({{$Subject->id}})" id="updating_sub{{$Subject->id}}" value="Изменить">

                   <input type="button" class="btn secondary"  onclick="Close_button_subject({{$Subject->id}})" id="close_button_sub{{$Subject->id}}" style="display: none;" value="Закрыть"> </div>

                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10" id="change_for_update{{$Subject->id}}"   style="display: none;">
                        @include ('forum.update_forum')
                    </div>


                            @endif
                          <?php $k = 1; ?>
                      @endif
                  @endForeach


	        </div>
            </form>

	      </div>

		  @endForeach
         {{ $subject->links() }}
	  </main>

   </div>

   @include ('layouts.footerNavigation')
  <script src="bootstrap/dist/js/jquery.js"></script>

  <script src="bootstrap/dist/js/bootstrap.min.js"></script>


  </body>
  <script src="{{asset('js/forum.js')}}" type="text/javascript"></script>
</html>

