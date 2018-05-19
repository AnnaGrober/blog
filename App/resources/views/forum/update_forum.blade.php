<div class="container ">

        {{csrf_field()}}
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="subject"> Тема:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control"  id="subject_upd" name="subj" placeholder="{{$Subject->subject_name}}"  >
                </div>
            </div><br>
        </div>
        <div class="form-froup filterform">
            <div class="form-row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <lable for="message"> Сообщение:</lable>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3" >
                    <input type="text" class="form-control" id="message_upd" name="mes" placeholder="{{$Message->message}}"  >
                    <input type="hidden" class="form-control" id="subj_id" name="subj_id" value="{{$Subject->id}}">
                </div>
            </div><br>
        </div>
        <input class="form-control" id="user" value="{{ Auth::user()->id }}" name="user" type="hidden">
        <button class="btn btn-secondary btn-lg btn-block" id="updating_subj" type="submit">Изменить</button>


</div>