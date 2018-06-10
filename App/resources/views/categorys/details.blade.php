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

    @foreach ($data as $category)
    <div class="jumbotron text-white  bg-dark">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <h1 class="display-4 font-italic">{{ $category->ad }}</h1>
                <p class="lead my-3">{{ $category->Advents }}</p>
                <p class="lead my-3">{{ $category->category }}</p>
                <p class="lead my-3">{{ $category->price }} руб.</p>
                <p class="lead my-3">@for ($i = 0; $i <($category->complexity); $i++)
                        <img src='../imgs/star.png' height='30px' >
                    @endfor</p>
                <p class="lead my-3">{{ $category->language }} ➜ {{ $category->translation}}</p>

                <p class="lead my-3">{{ $category->link }}</p>
                <p class="lead my-3">
                    @foreach($files as $File) <a href={{Storage::URL($File->file)}}> {{$File->file}}</a> @endforeach
                </p>
                <p class="lead my-3">{{ $category->user}}</p>
                <p class="lead my-3">{{ $category->start}} ➜ {{ $category->finish}}</p>
            </div>
            <div class="col-md-6 col-lg-6">
                <p class="lead mb-0"><img  src='../upload//{{ $category->img }}' height='300px'  alt='Card image cap'></p>
            </div>
        </div>
    </div>






    @endForeach

</div>
@include ('layouts.footerNavigation')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../bootstrap/dist/js/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>