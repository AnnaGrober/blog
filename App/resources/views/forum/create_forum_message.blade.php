<form  action="/forum_open_create" method="post" class="form-signin" >
    {{csrf_field()}}
    <div class="form-label-group">
        <label for="message_for_forum">Ваше сообщение</label>
        <textarea class="form-control" name="message_for_forum" id="message_for_forum" rows="3"></textarea>
    </div>
    <input class="form-control" id="subj_id" value="{{$subject_id}}" name="subj_id" type="hidden">
    @isset (Auth::user()->id )
    <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
    @endisset
    <button class="btn btn-lg btn-primary mt-2" type="submit" id="create_mes" >Отправить</button>
    <a role="button" href="{id}/images" class="btn" style=" color:black; border: none; ">Изображение</a>
</form>