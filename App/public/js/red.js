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
    document.getElementById('set').style.display='inline';
    document.getElementById('set_none').style.display = 'none';
    document.getElementById('run').style.display='inline';
    document.getElementById('run_none').style.display = 'none';
    document.getElementById('comp').style.display='inline';
    document.getElementById('comp_none').style.display = 'none';
    document.getElementById('comp_time').style.display='inline';
    document.getElementById('comp_time_none').style.display = 'none';
});

$( "#None" ).click(function() {
    document.getElementById('change').style.display='none';
    document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
});
$( "#set" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/SelectForUpdate/set',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });
    document.getElementById('set').style.display='none';
    document.getElementById('set_none').style.display = 'inline';
    document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
    document.getElementById('run').style.display='inline';
    document.getElementById('run_none').style.display = 'none';
    document.getElementById('comp').style.display='inline';
    document.getElementById('comp_none').style.display = 'none';
    document.getElementById('comp_time').style.display='inline';
    document.getElementById('comp_time_none').style.display = 'none';
});

$( "#set_none" ).click(function() {
    document.getElementById('change').style.display='none';
    document.getElementById('set').style.display='inline';
    document.getElementById('set_none').style.display = 'none';
});
$( "#run" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/SelectForUpdate/run',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });
    document.getElementById('set').style.display='inline';
    document.getElementById('set_none').style.display = 'none';
    document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
    document.getElementById('run').style.display='none';
    document.getElementById('run_none').style.display = 'inline';
    document.getElementById('comp').style.display='inline';
    document.getElementById('comp_none').style.display = 'none';
    document.getElementById('comp_time').style.display='inline';
    document.getElementById('comp_time_none').style.display = 'none';
});

$( "#run_none" ).click(function() {
    document.getElementById('change').style.display='none';
    document.getElementById('run').style.display='inline';
    document.getElementById('run_none').style.display = 'none';
});

$( "#comp" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/SelectForUpdate/comp',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });
    document.getElementById('set').style.display='inline';
    document.getElementById('set_none').style.display = 'none';
    document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
    document.getElementById('run').style.display='inline';
    document.getElementById('run_none').style.display = 'none';
    document.getElementById('comp').style.display='none';
    document.getElementById('comp_none').style.display = 'inline';
    document.getElementById('comp_time').style.display='inline';
    document.getElementById('comp_time_none').style.display = 'none';
});

$( "#comp_none" ).click(function() {
    document.getElementById('change').style.display='none';
    document.getElementById('comp').style.display='inline';
    document.getElementById('comp_none').style.display = 'none';
});

$( "#comp_time" ).click(function() {
    document.getElementById('change').style.display='inline';
    $.ajax({
        type: 'GET',
        url: '/SelectForUpdate/comp_time',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#change').html(response);
        },
    });
    document.getElementById('set').style.display='inline';
    document.getElementById('set_none').style.display = 'none';
    document.getElementById('All').style.display='inline';
    document.getElementById('None').style.display = 'none';
    document.getElementById('run').style.display='inline';
    document.getElementById('run_none').style.display = 'none';
    document.getElementById('comp').style.display='inline';
    document.getElementById('comp_none').style.display = 'none';
    document.getElementById('comp_time').style.display='none';
    document.getElementById('comp_time_none').style.display = 'inline';
});

$( "#comp_time_none" ).click(function() {
    document.getElementById('change').style.display='none';
    document.getElementById('comp_time').style.display='inline';
    document.getElementById('comp_time_none').style.display = 'none';
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

