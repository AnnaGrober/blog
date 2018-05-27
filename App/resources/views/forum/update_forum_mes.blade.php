
    {{csrf_field()}}
    <div class="form-label-group" style="margin-left: 30%;">
        <label for="message_for_forum">Ваше сообщение</label>
        <textarea class="form-control"  name="upd_message_for_forum"  id="message_for_forum"  rows="3">{{$Message->message}}</textarea>
        <input class="form-control" id="mes_id_hidden" value="{{$Message->id}}" name="mes_id_hidden" type="hidden">
        @isset (Auth::user()->id )
    <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
        @endisset
    <button class="btn btn-lg btn-primary mt-2" type="submit" id="update_mes" >Изменить</button>

    </div>
