<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Форум</title>

    <!-- Bootstrap core CSS -->

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles2.css" rel="stylesheet">
	 <link href="../bootstrap/dist/css/offcanvas.css" rel="stylesheet">
  </head>
  
   <body class="bg-light">
   @include ('../layouts.headerNavigetion')
	  <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple box-shadow">
        <img class="mr-3" src="https://getbootstrap.com/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class=" w-25">

          <h6 class="mb-0 text-white lh-100">{{$subject}}</h6>
          <small>Обсуждение темы {{$subject}}</small>
        </div>
       
   
       
      </div>
	  	<div class="my-3 p-3 bg-white rounded box-shadow">
            @foreach ($forums as $Message)
	        <div class="media text-muted pt-3">

	          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	            <strong class="d-block text-gray-dark"> Пользователь:{{$Message->user}}</strong>
                  {{$Message->message}}
	          </p>
	        </div>

            @endForeach
                {{ $forums->links()}}
	      </div>

          @include ('forum.create_forum_message')
	</main>
   @include ('../layouts.footerNavigation')
  <script src="../bootstrap/dist/js/jquery.js"></script>

  <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
       <script src="../offcanvas.js"></script>
  </body>
</html>

