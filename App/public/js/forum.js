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

function Uptade_sabject($id) {
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


function Close_button_sabject($id) {
    document.getElementById('change_for_update'+$id).style.display='none';
    document.getElementById('change_for_update'+$id).style.display='none';
    document.getElementById('updating_sub'+$id).style.display='inline';
    document.getElementById('close_button_sub'+$id).style.display='none';
};



function click_upd($subj) {
    if ( $('#subject_upd'+$subj).length ){ var subject =$('#subject_upd'+$subj).val();}
    if ( $('#message_upd'+$subj).length ){ var message =$('#message_upd'+$subj).val();}
    var subj_id =$('#subj_id'+$subj).val();
    var mes_id =$('#mes_id'+$subj).val();
    $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type: 'POST',
        url: '/store_upd',
        dataType:'html',
        data: "subject="+subject +"& message="+message +"& subj_id="+subj_id+"& mes_id="+mes_id,_token : $('meta[name="csrf-token"]').attr('content'),
        success: function (response) {
            console.log(response);
            $('#updating_subj'+$subj).html(response);
        },
    });

};