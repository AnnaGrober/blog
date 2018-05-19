
        <div class="col-md-4" >
            <div class="card mb-4 box-shadow">
                <img class='card-img-top' src='{{ $data->img }}' height='300px'  alt='Card image cap'>
                <div class="card-body">
                    <p class="card-text">{{ $data->ad }}</p>
                    <p class="card-text">Сложность:{{ $data->complexity }}</p>
                    <p class="card-text">Категрия:{{$data->category}}</p>
                    <p class="card-text">Язык Оригинала:{{ $data->language }}</p>
                    <p class="card-text">Язык Перевода:{{ $data->translation}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/category/{{ $data->id }}"  class="btn  btn-outline-secondary " >Подробности</a>
                            <a href="/update/{{ $data->id }}" class="btn  btn-outline-primary ml-3" >Изменить</a>
                            <a href="/del/{{ $data->id }}" id="del" class="btn  btn-outline-primary ml-3" >Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
