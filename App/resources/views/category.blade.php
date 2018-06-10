<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Категории</title>
	<script src="{{asset('js/jquery1.js')}}"></script>
	<script src="{{asset('js/jquery2.js')}}"></script>

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">

	<link href="jQRangeSlider-master/demo/lib/jquery-ui/css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet">

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
							@isset (Auth::user()->id )
			  <input class="form-control" id="user" value="{{Auth::user()->id }}" name="user" type="hidden">
							@endisset
										    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
												<lable for="languages"> Язык оригинала</lable>
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

								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
									<lable for="languages"> Язык перевода</lable>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<select  class="form-control" id="language_translate" name="lang_tran" max-width="276">
										<option value=0> Выберите язык </option>
										@foreach ($languages as $language)
											<option class="option" value="{{$language->id}}">
												{{ $language->language }}
											</option>
										@endForeach
									</select>
								</div>
						</div><br>

						<div class="form-row ">

										    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
												<lable for="VoidSelectType"> Тип </lable>
											</div>
											  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
											<select  class="form-control" id="categories" >
											    <option value=0> Выберите тип перевода </option>
												@foreach ($categories as $category)
													<option class="option"  value="{{$category->id}}">
														{{ $category->category }}
													</option>
												@endForeach
											 </select>
												</div>
										  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<lable for="VoidInputPrice">Сложность </lable>
											</div>
											  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
											<div class="example">
												<div id="complexity" class="noUi-target noUi-ltr noUi-horizontal"></div>

											</div>
											</div>
											<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
											<select id="input-complexity"></select>
											</div>
							<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
							</div>

						</div><br><div class="form-row">
				  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
				  </div>
				  <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
					  <lable for="VoidInputPrice">Цена  </lable>
				  </div>

				  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
					  <div class="example">
						  <div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>

					  </div>
				  </div>

				  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
					  min<select id="input-select" name="priceMin" ></select>
					  max<input type="number" min="0" max="10000" step="100" id="input-number" name="priceMax" >
				  </div>
				  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
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

	<div class="row mt-4">

	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">

			<input type="button" class="btn btn-secondary mr-sm-4 btn-sm" name="price_asc" value="По цене ↓">
			<input type="button" class="btn btn-secondary mr-sm-4 btn-sm" name="price_desc" value="По цене ↑">
	</div>
		<div class="form-check col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">В режиме набора пользователей</label>
		</div>

	</div>
		  </form>

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
						<meta name="csrf-token" content="{{ csrf_token() }}">
						<div class="col-md-4" >
							<div class="card mb-4 box-shadow">
								<img class='card-img-top' src='upload/{{ $data->img }}' height='300px'  alt='Card image cap'>
								<div class="card-body">
									<p class="card-text text-center">{{ $data->ad }}</p>
									<p class="card-text text-center">@for ($i = 0; $i <($data->complexity); $i++)
											<img src='imgs/star.png' height='30px' >
										@endfor</p>
									<p class="card-text text-center">{{$data->category}}</p>
									<p class="card-text text-center">{{ $data->language }}➜ {{ $data->translation}} </p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">

											<a href="/category/{{ $data->id }}"  class="btn  btn-outline-secondary ml-3" >Подробности</a>
											<input class="form-control" id="id_cat" value="{{$data->id}}"  type="hidden">
											<input type="button"  id="feed" onclick="feedback({{ $data->id }})" class="btn  btn-outline-primary ml-3" value="Откликнуться">


										</div>
									</div>
								</div>
							</div>
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

<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>