$( "#creating_sub" ).click(function() {
    document.getElementById('change_for_create').style.display='inline';
    $.ajax({
       /* headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },*/
        type: 'POST',
        url: '/forum_create',
        dataType:'html',
        /*data:,_token : $('meta[name="csrf-token"]').attr('content'),*/
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
        /* headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },*/

        type: 'POST',
        url: '/forum_update',
        dataType:'html',
        /*data:,_token : $('meta[name="csrf-token"]').attr('content'),*/
        success: function (response) {
            console.log(response);
            $('#updating_sub'+$id).html(response);
        },
    });

};


function Close_button_subject($id) {
    document.getElementById('change_for_update'+$id).style.display='none';
    document.getElementById('change_for_update'+$id).style.display='none';
    document.getElementById('updating_sub'+$id).style.display='inline';
    document.getElementById('close_button_sub'+$id).style.display='none';
};




/*$( "#updating_subj" ).click(function() {
    if ( $('#subject_upd').length ){ var subject =$('#subject_upd').val();}
    if ( $('#message_upd').length ){ var message =$('#message_upd').val();}
    var subj_id =$('#subj_id').val();
    var mes_id =$('#mes_id').val();
    $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type: 'POST',
        url: '/form2',
        dataType:'html',
        data: "subject="+subject +"& message="+message +"& subj_id="+subj_id+"& mes_id="+mes_id,_token : $('meta[name="csrf-token"]').attr('content'),
        success: function (response) {
            console.log(response);
            $('#updating_subj').html(response);
        },
    });

});*/