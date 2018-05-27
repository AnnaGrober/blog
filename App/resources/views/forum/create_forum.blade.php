<div class="container ">
    <form action="/forum_create" method="post">
        {{csrf_field()}}
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="subject"> Тема:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control" id="subject" name="subj" placeholder="Введите тему"  >
                </div>

            </div><br>
        </div>
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="message"> Сообщение:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control" id="message" name="mes" placeholder="Введите сообщение"  >
                </div>

            </div><br>
        </div>
        @isset (Auth::user()->id )
        <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
        @endif
        <button class="btn btn-secondary btn-lg btn-block" id="create_subj" type="submit">Добавить</button>
    </form>
</div>