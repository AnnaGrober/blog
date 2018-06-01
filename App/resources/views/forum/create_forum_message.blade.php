<form  action="/forum_open_create" method="post"  enctype="multipart/form-data" >
    {{csrf_field()}}
    <div class="form-label-group filterform">

        <label for="message_for_forum">Ваше сообщение</label>
       <p> <textarea style="width:500px;"  name="message_for_forum" id="message_for_forum" cols="60" rows="4"></textarea></p>
        <input id="img_for_forum"  type="file" name="file[]">

    <input class="form-control" id="subj_id" value="{{$subject_id}}" name="subj_id" type="hidden">
    @isset (Auth::user()->id )
    <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
    @endisset
    </div>
    <p> <button class="btn btn-lg btn-primary mt-2" type="submit" id="create_mes" >Отправить</button> </p>

</form>