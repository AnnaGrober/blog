$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // var x= $("#name").val();
    // y=this.user_id;
    $(".btn1").click(function () {
        // var taskArray = new Array();
        // $("input[name=n]").each(function() {
        //   $m=taskArray.push($(this).val());
        // });


        var user_id = $("#name").val();

        $.ajax({
            url: '/admin_panel',
            type: "POST",
            data: {id: $(this).attr('value')},
            dataType: 'html',
            success: function (msg) {
                $("#tt").append('<p>' + msg + '</p>');
            }
        });

    });


//Живой поиск
    $('#find_user').bind("change keyup input click", function() {
        if(this.value.length >= 2){
            $.ajax({
                type: 'post',
                url: "",
                data: {'username':this.value},
                response: 'text',
                success: function(data){
                    $("#fin1").html(data).fadeIn(); //Выводим полученые данные в списке
                }
            })
        }
    });



//При выборе результата поиска, прячем список и заносим выбранный результат в input
    $("#fin1").on("click", function(){
        s_user = $(this).text();
        //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
        $("#fin1").fadeOut();
    })



});