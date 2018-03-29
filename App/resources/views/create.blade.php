<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Добавление объявления</title>
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
        <form action="/create/add" method="post">
            {{csrf_field()}}
            <div class="form-froup filterform">
                <h1>Заполните объявление</h1>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquage"> Язык оригинала</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <select  class="form-control" id="VoidSelectLanquage" name="language"  max-width="276">
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage" name="language2" placeholder="Введите язык" >
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquageTranslation"> Язык перевода</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <select  class="form-control" id="VoidSelectLanquageTranslation" name="language_translation"  max-width="276">
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage_translation" name="language_translation2"  placeholder="Введите язык" >
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-1">
                        <lable for="VoidSelectType"> Тип </lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <select  class="form-control" id="VoidSelectType" name="type_category"  >
                            @foreach ($categories as $category)
                                <option> {{ $category->category }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage" name="type_category2"   placeholder="Введите категорию">
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
                        <lable for="VoidInputPrice">Цена </lable>
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
                         <textarea class="form-control " id="ad" cols="255"  name="add" rows="4" > </textarea>
                    </div>
                </div><br>
                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          <label for="ad">Ссылка на источник</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input class="form-control" id="link" name="link">
                    </div>
                </div><br>
                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="categoryPages">Введите объявление (полностью)</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <textarea class="form-control" id="categoryPages" name="category_pages" cols="2000" rows="10" required> </textarea>
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectOneDate"> Время на выполнение </lable>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker" name="dateStart"   placeholder="Начало"/>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker2" name="dateFinish"  placeholder="Конец"/>
                    </div>

                </div><br>
                <div class="form-row ">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <label >Вы можете добавить своё изображение</label>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <label class="btn btn-secondary">
                                Добавить изображение <input type="file"  name="img" hidden>
                            </label>
                    </div>
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
        start: [ 200],
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