<div class="container">
    <div class="row">
        @foreach ($Data2 as $data)
        <a href="/category/{{ $data->id }}"   >
            <div class="col-md-10" >
                <div class="card ">
                    <img class='card-img-top ' src='../upload/{{ $data->img }}' style="height: 300px; width: 300px"  alt='Card image cap'>
                    <div class="card-body">
                        <p class="card-text text-center">{{ $data->ad }}</p>
                        <p class="card-text text-center">@for ($i = 0; $i <($data->complexity); $i++)
                            <img src='../imgs/star.png' height='30px' >
                            @endfor</p>
                        <p class="card-text text-center">{{$data->category}}</p>
                        <p class="card-text text-center">{{ $data->language }}➜ {{ $data->translation}} </p>

                    </div>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>