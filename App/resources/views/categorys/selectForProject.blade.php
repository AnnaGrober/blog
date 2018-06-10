<a href="/category/{{ $data->id }}"   >
        <div class="col-md-4 pl-5" >
            <div class="card mb-4 box-shadow">
                <img class='card-img-top' src='../upload/{{ $data->img }}' height='300px'  alt='Card image cap'>
                <div class="card-body">
                    <p class="card-text text-center">{{ $data->ad }}</p>
                    <p class="card-text text-center">@for ($i = 0; $i <($data->complexity); $i++)
                            <img src='../imgs/star.png' height='30px' >
                        @endfor</p>
                    <p class="card-text text-center">{{$data->category}}</p>
                    <p class="card-text text-center">{{ $data->language }}➜ {{ $data->translation}} </p>
                    <p class="card-text">Осталось дней
                        {{ (strtotime($data->finish) - strtotime(Carbon\Carbon::today()->toDateString()))/86400}}</p>
                    <p class="card-text">
                        @if(($data->status)=='1') В режиме набора пользователей @endif
                            @if(($data->status)=='2') В режиме выполнения @endif
                            @if(($data->status)=='3') Завершен @endif

                    </p>
                    <p class="card-text">
                        @foreach($Data3 as $date3)
                            @if (($date3->id)==($data->id))
                                {{$date3->name}}
                            @endif
                        @endforeach</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                            <a href="/update/{{ $data->id }}" class="btn  btn-outline-primary ml-3" >Изменить</a>
                            <a href="/del/{{ $data->id }}" id="del" class="btn  btn-outline-primary ml-3" >Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</a>