
<div class="container">
    <div class="row">
        {{csrf_field()}}

        @foreach ($Data as $data)
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="col-md-4" >
                <div class="card mb-4 box-shadow">
                    <img class='card-img-top' src='upload/{{ $data->img }}' height='300px'  alt='Card image cap'>
                    <div class="card-body">
                        <p class="card-text">{{ $data->ad }}</p>
                        <p class="card-text">Сложность:{{ $data->complexity }}</p>
                        <p class="card-text">Категрия:{{$data->category}}</p>
                        <p class="card-text">Язык Оригинала:{{ $data->language }}</p>
                        <p class="card-text">Язык Перевода:{{ $data->translation}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                                <a href="/category/{{ $data->id }}"  class="btn  btn-outline-secondary " >Подробности</a>
                                <input class="form-control" id="id_cat" value="{{$data->id}}"  type="hidden">
                                <input type="button"  id="feed" onclick="feedback({{ $data->id }})" class="btn  btn-outline-primary ml-3" value="Откликнуться">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
   function feedback($id) {

        var user =$('#user').val();
        var id_cat =$('#id_cat').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'category/post',
            dataType:'html',
            data: "user="+user+ "& id_cat="+ id_cat, _token : $('meta[name="csrf-token"]').attr('content'),
            success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            },
        });
    };
</script>