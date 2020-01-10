<div class="form-group @if(!empty($errors->first($key))) has-error @endif" id="form-group-{{ $key }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" id="{{ $key }}" name="{{ $key }}" class="form-control col-md-7 col-xs-12">
        @if(!empty($form['memo'])) <span class="help-block">{{ $form['memo'] }} </span> @endif
        @if(!empty($data->$key))
            <span class="help-block">画像を変更する場合はファイルを選択してください</span>
        @endif
        <span class="help-block">{{$errors->first($key)}}</span>
    </div>
</div>
