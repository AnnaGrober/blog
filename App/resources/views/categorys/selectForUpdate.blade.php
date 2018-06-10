<div class="container">
    <div class="row">
        @foreach ($Data as $data)
            <a href="/category/{{ $data->id }}"   >
            <div class="col-md-4" >
                <div class="card mb-4 box-shadow">
                    <img class='card-img-top' src='../upload/{{ $data->img }}' height='300px'  alt='Card image cap'>
                    <div class="card-body">
                        <p class="card-text text-center">{{ $data->ad }}</p>
                        <p class="card-text text-center">@for ($i = 0; $i <($data->complexity); $i++)
                                <img src='../imgs/star.png' height='30px' >
                            @endfor</p>
                        <p class="card-text text-center">{{$data->category}}</p>
                        <p class="card-text text-center">{{ $data->language }}➜ {{ $data->translation}} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/del/{{ $data->id }}" id="del" class="btn  btn-outline-primary " >Удалить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
          
    </div>
</div>