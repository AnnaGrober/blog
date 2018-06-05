<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Изменение объявления</title>
    <script src="../bootstrap/dist/js/jquery.min.js"></script>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">

    <link href="../jQRangeSlider-master/demo/lib/jquery-ui/css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="../styles/styles2.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" >
    @include ('layouts.headerNavigetion')

    <div class="container  header">
        @foreach ($Data as $data)
        <form action="/update/add/{{$data->id}}" method="post">
            {{csrf_field()}}
            <div class="form-froup filterform">
                <h1>Измените объявление</h1>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquage"> Язык оригинала</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" id="div_by_lang">
                        <select class="form-control" id="VoidSelectLanquage" name="language"  max-width="276">
                            <option selected> {{$data->language}}</option>
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                            <option name="lanquage2"> Другой</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage2" name="language2" placeholder="Введите язык" style="display: none;">
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquageTranslation"> Язык перевода</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3"  id="div_by_lang_tr">
                        <select  class="form-control" id="VoidSelectLanquageTranslation" name="language_translation"  max-width="276">
                            <option selected>{{$data->translation}} </option>
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                            <option name="language_translation2"> Другой</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="language_translation2" name="language_translation2"  placeholder="Введите язык" style="display: none;" >
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-1">
                        <lable for="VoidSelectType"> Тип </lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6" id="div_by_type">
                        <select  class="form-control" id="VoidSelectType" name="type_category"  >
                            <option selected>{{$data->category}} </option>
                            @foreach ($categories as $category)
                                <option > {{ $category->category }}</option>
                            @endForeach
                            <option name="type_category2"> Другой</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="type_category2" name="type_category2" placeholder="Введите тип" style="display: none;" >
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidInputPrice">Сложность </lable>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="example">
                            <div id="complexity" class="noUi-target noUi-ltr noUi-horizontal"></div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1">
                        <select id="input-complexity" name="complexity" ></select>

                    </div>

                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidInputPrice">Цена (руб)</lable>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="example">
                            <div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1">
                        <select id="input-select" name="price" ></select>
                    </div>

                </div><br>


                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="ad">Введите объявление (кратко)</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <textarea class="form-control"  id="ad" cols="255"  name="add" rows="4">{{$data->ad}}</textarea>
                    </div>
                </div><br>


                    <div class="form-row" style="color:red;">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="extra" >Экстренный перевод</label>
                        </div>
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1">
                            <input  type="checkbox"  id="extra" name="extra"
                                    @if (($data->extra)==true)  checked @endif
                            >
                        </div>
                    </div><br>


                    <div class="form-row ">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="link">Добавить файлы</label>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">

                            <input type="file" multiple name="files[]"
                                   value=" @foreach($files as $file) {{$file->file}} @endforeach" id="create_files" value="">

                        </div>

                    </div><br>
                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="link">Ссылка на источник</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input class="form-control" value="{{$data->link}}" id="link" name="link">
                    </div>
                </div><br>

                <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">



                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="categoryPages">Введите объявление (полностью)</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <textarea class="form-control" id="categoryPages" name="category_pages" cols="2000" rows="10" required>{{$data->pages}}</textarea>
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectOneDate"> Время на выполнение </lable>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker" name="dateStart"  data-date-format="yy-mm-dd"  value="{{$data->start}}"/>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker2" name="dateFinish" data-date-format="yy-mm-dd"   value="{{$data->finish}}"/>
                    </div>

                </div><br>
                <div class="form-row ">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label >Вы можете добавить своё изображение</label>
                    </div>
                    <input id="img" type="file" name="file[]" value="{{$data->img}}">


                </div><br>
                <button class="btn btn-secondary btn-lg btn-block" type="submit">Отправить</button>
            </div>

        </form>

    </div>


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

<script src="../noUiSlider.11.0.3/nouislider.min.js"></script>
<script>

    var html5Slider = document.getElementById('html5');
    var complexitySlider = document.getElementById('complexity');

    noUiSlider.create(html5Slider, {
        start: [{{$data->price}} ],
        range: {
            'min': 0,
            'max': 10000
        }
    });

    noUiSlider.create(complexitySlider, {
        start: [ {{$data->complexity}} ],
        range: {
            'min': 0,
            'max': 5
        }
    });

</script>
@endForeach
<script src="{{asset('../js/update.js')}}" type="text/javascript"></script>
<script src="../https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../sbootstrap/dist/js/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>