
<div class="container ">
    <form  method="post" >
        {{csrf_field()}}

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="subject"> Тема:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control"  id="subject_upd{{$Subject->id}}" name="subj" placeholder="{{$Subject->subject_name}}"  >
                </div>
            </div><br>
        </div>
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="message"> Сообщение:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control" id="message_upd{{$Subject->id}}" name="mes" placeholder="{{$Message->message}}"  >
                    <input type="text" class="form-control" id="subj_id{{$Subject->id}}"  placeholder="{{$Subject->id}}" style="display: none;">
                    <input type="text" class="form-control" id="mes_id{{$Subject->id}}"  placeholder="{{$Message->id}}" style="display: none;" >
                </div>
            </div><br>
        </div>
        <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
        <button class="btn btn-secondary btn-lg btn-block" onclick="click_upd({{$Subject->id}})" id="updating_subj{{$Subject->id}}" type="submit">Изменить </button>
    </form>

</div>