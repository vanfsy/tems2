@if(isset($data->$key))
    <?php $val = old($key, $data->$key); ?>
@else
    <?php $val = old($key); ?>
@endif

<div class="form-group @if(!empty($errors->first($key))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }} @if(isset($form['required']) && $form['required']) * @endif</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @foreach($form['values'] as $k=> $v)
            <div class="col-md-6">
                <input type="checkbox" name="{{ $key }}[]" value="{{$k}}" @if(is_array($val) && in_array($k, $val)) checked @endif><label style="margin-left:5px;">{{ $v }}</label>
            </div>
        @endforeach

        @if(empty($isSearch))
            @if(!empty($form['memo'])) <span class="help-block">{{ $form['memo'] }} </span> @endif
            <div class="row col-md-12">
                <span class="help-block">{{$errors->first($key)}}</span>
            </div>
        @endif
    </div>
</div>
