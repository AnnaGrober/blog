'use strict';

// Модуль каталога для работы с БД
var catalogDB = (function($) {


    var ui = {
        $form: $('#filters-form'),
        $language: $('#languages'),
        $priceMin: $('#input-select'),
        $priceMinInput: $('#priceMin input'),
        $priceMax: $('#input-number'),
        $category: $('#category'),
        $complexity: $('#input-complexity'),
        $data: $('#datepicker'),
        $data2: $('#datepicker2'),
        $dataInput: $('#datepicker input'),
        $data2Input: $('#datepicker2 input'),
        $sort: $('#sort')
    };

    // Инициализация модуля
    function init() {
        _bindHandlers();
    }
    // Навешиваем события
    function _bindHandlers() {
        ui.$sort.on('click',  _getData);
        ui.$priceMinInput.on('change', _getData);
        ui.$dataInput.on('change', _getData);
        ui.$data2Input.on('change', _getData);
        ui.$language.on('change', _getData);
        ui.$priceMax.on('change', _getData);
        ui.$category.on('change', _getData);
        ui.$complexity.on('change', _getData);
    }
    var selectedCategory = 0;

    function _getData() {
        var catalogData = 'category=' + selectedCategory + '&' + ui.$form.serialize();
        $.ajax({
            url: '/contact',
            data: catalogData,
            type: 'GET',
            cache: false,
            error: _catalogError,
            success: function(responce) {
                if (responce.code === 'success') {
                    _catalogSuccess(responce);
                } else {
                    _catalogError(responce);
                }
            }
        });
    }
    // Ошибка получения данных
    function _catalogError(responce) {
        console.error('responce', responce);
        // Далее обработка ошибки, зависит от фантазии
    }

// Успешное получение данных
    function _catalogSuccess(responce) {
        console.log(responce);
    }
    // Экспортируем наружу
    return {
        init: init
    }

})(jQuery);