<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Категории</title>

	<script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">

	<link href="jQRangeSlider-master/demo/lib/jquery-ui/css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="styles/styles2.css" rel="stylesheet">


</head>
<body>
<div class="container-fluid" >
	@include ('layouts.headerNavigetion')

  <div class="container  header">
		  <form class="filter" id="filters-form">
		  <div class="form-froup filterform">
			  {{csrf_field()}}
			  			<div class="form-row">
							<!--<input class="form-control" id="user" value="Auth::user()->id }}" name="user" type="hidden"> -->

										    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
												<lable for="languages"> Язык </lable>
											</div>
											  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6">
											<select  class="form-control" id="languages" name="lang" max-width="276">
											    <option value=0> Выберите язык </option>
												@foreach ($languages as $language)
													<option class="option" value="{{$language->id}}">
														{{ $language->language }}
													</option>
												@endForeach
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
												min<select id="input-select" name="priceMin" ></select>
												max<input type="number" min="0" max="10000" step="100" id="input-number" name="priceMax" >
											</div>
						</div><br>
						<div class="form-row ">

										    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
												<lable for="VoidSelectType"> Тип </lable>
											</div>
											  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<select  class="form-control" id="categories" >
											    <option value=0> Выберите тип перевода </option>
												@foreach ($categories as $category)
													<option class="option"  value="{{$category->id}}">
														{{ $category->category }}
													</option>
												@endForeach
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
										 <input id="datepicker"  value=0  data-date-format="yy-mm-dd" placeholder="Начало"/>
									 </div>
									 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<input id="datepicker2" value=0 data-date-format="yy-mm-dd"  placeholder="Конец"/>
									 </div>
									 <div class="col-xl-3 col-lg-3 col-md-3 "></div>
					   </div>
		  </div>
		  </form>

  </div>
	<div class="col-md-4">
		<br>
			<input type="button" class="btn btn-secondary mr-sm-4 btn-sm" name="price_asc" value="По цене ↓">
			<input type="button"class="btn btn-secondary mr-sm-4 btn-sm" name="price_desc" value="По цене ↑">
		<!-- <p>  <br><button id="findBtn" onclick="sendLang()" class="btn btn-secondary mr-sm-4 btn-sm">Найти</button></p> -->
	</div>
	<div class="row">
	<div class="col-md-4" id="showDiv">
		<div id="showLang"></div>
	</div>
	</div>
	<main role="main">
		<div class="album py-5 bg-light" id="updateDiv">
			<div class="container">
				<div class="row">
					@foreach ($Data as $data)
						<div class="col-md-4" >

						</div>
					@endforeach
				</div>
			</div>

		</div>
	</main>

</div>


@include ('layouts.footerNavigation')





<script src="noUiSlider.11.0.3/nouislider.min.js"></script>
<script src="{{asset('js/filter.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ajax.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>