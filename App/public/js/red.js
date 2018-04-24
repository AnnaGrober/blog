$( "#All" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/SelectForUpdate',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });
   document.getElementById('All').style.display='none';
    document.getElementById('None').style.display = 'inline';
});

$( "#None" ).click(function() {

            document.getElementById('change').style.display='none';
            document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
});

$( "#del" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/del',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });

});