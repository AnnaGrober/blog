<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <title>Категории</title>
   
   
   <!-- In <head> -->
<link href="noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">
</head>
<body>
	<div class="example">
			<div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>
			
			<select id="input-select"></select>
			<input type="number" min="0" max="10000" step="100" id="input-number">
   </div>
			
			
<script src="noUiSlider.11.0.3/nouislider.min.js"></script> 
 <script>
  var select = document.getElementById('input-select');

// Append the option elements
for ( var i = 0; i <= 10000; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	select.appendChild(option);
}
        
        
       var html5Slider = document.getElementById('html5');

noUiSlider.create(html5Slider, {
	start: [ 200, 8000 ],
	connect: true,
	range: {
		'min': 0,
		'max': 10000
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

select.addEventListener('change', function(){
	html5Slider.noUiSlider.set([this.value, null]);
});

inputNumber.addEventListener('change', function(){
	html5Slider.noUiSlider.set([null, this.value]);
});


    </script>									
</body>
</html>