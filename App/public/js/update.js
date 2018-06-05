$('#datepicker').datepicker({
    dateFormat:'yy-mm-dd',
    uiLibrary: 'bootstrap4'
});


$('#datepicker2').datepicker({
    dateFormat:'yy-mm-dd',
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

$(document).ready(function() {

    $("#VoidSelectType").change(function () {
        var y = $('#div_by_type select option:selected').attr('name');
        $('#categ').find(':input').css('display','none');
        $('#' + y).css('display', 'block');
    })
});

$(document).ready(function() {
    $("#VoidSelectLanquage").change(function () {
        var x = $('#div_by_lang select option:selected').attr('name');
        $('#lang').find(':input').css('display','none');
        $('#' + x).css('display', 'block');
    })
});
$(document).ready(function() {
    $("#VoidSelectLanquageTranslation").change(function () {
        var t = $('#div_by_lang_tr select option:selected').attr('name');
        $('#lang_tr').find(':input').css('display','none');
        $('#' + t).css('display', 'block');
    })
});