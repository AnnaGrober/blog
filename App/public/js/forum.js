$( "#creating_sub" ).click(function() {
    document.getElementById('change_for_create').style.display='inline';
    $.ajax({
        type: 'POST',
        url: '/forum_create',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#creating_sub').html(response);
        },
    });

});

function Update_subject($id) {
    document.getElementById('change_for_update'+$id).style.display='inline';
    document.getElementById('close_button_sub'+$id).style.display='inline';
    document.getElementById('updating_sub'+$id).style.display='none';
    $.ajax({
        type: 'POST',
        url: '/forum_update',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#updating_sub'+$id).html(response);
        },
    });

};

function Update_message($id) {
    document.getElementById('change_for_update_mes'+$id).style.display='inline';
    document.getElementById('close_button_mes'+$id).style.display='inline';
    document.getElementById('updating_mes'+$id).style.display='none';
    $.ajax({
        type: 'POST',
        url: '/forum_message',
        dataType:'html',
        success: function (response) {
            console.log(response);
            $('#updating_mes'+$id).html(response);
        },
    });

};


function Close_button_subject($id) {
    document.getElementById('change_for_update'+$id).style.display='none';
    document.getElementById('updating_sub'+$id).style.display='inline';
    document.getElementById('close_button_sub'+$id).style.display='none';
};



function Close_button_message($id) {
    document.getElementById('change_for_update_mes'+$id).style.display='none';
    document.getElementById('updating_mes'+$id).style.display='inline';
    document.getElementById('close_button_mes'+$id).style.display='none';
};

