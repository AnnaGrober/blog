
$('#datepicker').datepicker({
    dateFormat:'yy-mm-dd',
    uiLibrary: 'bootstrap4',
    onSelect: function(date1) {
        changeCat(date1);
    }
});

$('#datepicker2').datepicker({
    dateFormat:'yy-mm-dd',
    uiLibrary: 'bootstrap4',
    onSelect: function(date2) {
        changeCat(date2);
    }
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
    start: [ 0, 8000 ],
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
    changeCat();
});


complexitySlider.noUiSlider.on('update', function( values, handle ) {
    var value = values[handle];
    if ( handle ) {
        inputNumber.value = value;
    } else {
        selectcomplexity.value = Math.round(value);
    }
    changeCat();
});

select.addEventListener('change', function(){
    html5Slider.noUiSlider.set([this.value, null]);
});



selectcomplexity.addEventListener('change', function(){
    complexitySlider.noUiSlider.set([this.value, null]);
});


$('#languages').change(function() {
    changeCat();
});
$('#categories').change(function() {
    changeCat();
});


function changeCat(){
    if ( $('#languages').length ){ var lang =$('#languages').val();}
    var priceMin =$('#input-select').val();
    var priceMax =$('#input-number').val();
    if ( $('#categories').length ){ var cat =$('#categories').val();}
    var complex =$('#input-complexity').val();
    if ( $('#datepicker').length ) {var data1 = $("#datepicker").val();}
    if ( $('#datepicker2').length ){var data2 =$('#datepicker2').val();}
    $.ajax({
        type: 'get',
        url: '',
        dataType:'html',
        data: "lang="+lang +"& priceMin="+priceMin+"& priceMax="+priceMax+"& cat="+cat+"& complex="+complex+"& data1="+data1+"& data2="+data2,

        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        },
    });
}
