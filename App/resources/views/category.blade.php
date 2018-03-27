<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Категории</title>
    <script src="bootstrap/dist/js/jquery.min.js"></script>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/styles2.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" >
	@include ('layouts.headerNavigetion')
 
  <div class="container  header">
		  <form class="filter">
		  <div class="form-froup filterform">
			  			<div class="form-row">
										    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
												<lable for="VoidSelectLanquage"> Язык </lable>
											</div>
											  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6">
											<select  class="form-control" id="VoidSelectLanquage" max-width="276">
											    <option > Выберите язык </option>
												<option> Язык 1 </option>
												<option> Язык 2</option>
											 </select>
												</div>

										  <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
											<lable for="VoidInputPrice">Цена  </lable>
											</div>

											 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-xs-5">
											<div class="example">
												<div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>

											</div>
											</div>	
											 
											<div class="col-xl-3 col-lg-3 col-md-3 ">
											min<select id="input-select"></select>
												max<input type="number" min="0" max="10000" step="100" id="input-number">
											</div>
						</div><br>
						<div class="form-row ">
									
										    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
												<lable for="VoidSelectType"> Тип </lable>
											</div>
											  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<select  class="form-control" id="VoidSelectType" >
											    <option > Выберите тип перевода </option>
												<option> Книги </option>
												<option> Статьи</option>
												<option> Видео</option>
												<option> Озвучка</option>
											 </select>
												</div>
										  <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
											<lable for="VoidInputPrice">Сложность </lable>
											</div>
											  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-xs-5">
											<div class="example">
												<div id="complexity" class="noUi-target noUi-ltr noUi-horizontal"></div>

											</div>
											</div>
											<div class="col-xl-3 col-lg-3 col-md-3 ">
											<select id="input-complexity"></select>
											</div>
										
						</div><br>
						<div class="form-row ">
							<div class="col-xl-2 col-lg-2 col-md-2 ">
							</div>
							<div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
									 <lable for="VoidSelectOneDate"> Дата </lable>
							</div>
			  
									 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
										 <input id="datepicker"  placeholder="Начало"/>
									 </div>
									 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<input id="datepicker2"  placeholder="Конец"/>
									 </div>
									 <div class="col-xl-3 col-lg-3 col-md-3 "></div>
					   </div>
		  </div>
		  </form>
			   
  </div>
		
    <main role="main">	   
			   <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">

			 @foreach ($data as $category)
					<div class="col-md-4">
					  <div class="card mb-4 box-shadow">
						  <img class='card-img-top' src='{{ $category->img }}' height='300px'  alt='Card image cap'>
						<div class="card-body">
						  <p class="card-text">{{ $category->ad }}</p>
							<p class="card-text">Сложность:{{ $category->complexity }}</p>
							<p class="card-text">Категрия:{{$category->category}}</p>
							<p class="card-text">Язык Оригинала:{{ $category->language }}</p>
							<p class="card-text">Язык Перевода:{{ $category->translation}}</p>
						  <div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<a href="/category/{{ $category->id }}"  class="btn  btn-outline-secondary " >Подробности</a>
								<a href="{{ $category->id }}" class="btn  btn-outline-primary ml-3" data-toggle="modal" data-target="#ResponseModal" >Откликнуться</a>
							</div>
						  </div>
						</div>
					  </div>
					</div>

 			 @endForeach
</div>
</div>
</div>
</main>
</div>
@include ('layouts.footerNavigation')

<div class="modal fade" id="ResponseModal" tabindex="-1" role="dialog" aria-labelledy="ResponseModal" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">



    <button class="close" type="button" data-dismiss="modal" aria-lable="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="container">

    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<script src="noUiSlider.11.0.3/nouislider.min.js"></script>
<script>
$('#datepicker').datepicker({
uiLibrary: 'bootstrap4'
});
$('#datepicker2').datepicker({
uiLibrary: 'bootstrap4'
});
var select = document.getElementById('input-select');
var selectcomplexity = document.getElementById('input-complexity');

// Append the option elements price
for ( var i = 0; i <= 10000; i++ ){

var option = document.createElement("option");
    option.text = i;
    option.value = i;

select.appendChild(option);
}

// Append the option elements complexity
for ( var j = 0; j <= 5; j++ ){

var option2 = document.createElement("option");
    option2.text = j;
    option2.value = j;

selectcomplexity.appendChild(option2);
}

var html5Slider = document.getElementById('html5');
var complexitySlider = document.getElementById('complexity');

noUiSlider.create(html5Slider, {
start: [ 200, 8000 ],
connect: true,
range: {
'min': 0,
'max': 10000
}
});

noUiSlider.create(complexitySlider, {
start: [ 2 ],
range: {
'min': 0,
'max': 5
}
});
var inputNumber = document.getElementById('input-number');

html5Slider.noUiSlider.on('update', function( values, handle ) {

var value = values[handle];

if ( handle ) {
inputNumber.value = value;
} else {
select.value = Math.round(value);
}
});


complexitySlider.noUiSlider.on('update', function( values, handle ) {
var value = values[handle];
if ( handle ) {
inputNumber.value = value;
} else {
selectcomplexity.value = Math.round(value);
}
});

select.addEventListener('change', function(){
html5Slider.noUiSlider.set([this.value, null]);
});



selectcomplexity.addEventListener('change', function(){
complexitySlider.noUiSlider.set([this.value, null]);
});

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="bootstrap/dist/js/jquery.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>