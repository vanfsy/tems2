@if(isset($data->$key))
    <?php $val = old($key, $data->$key); ?>
@else
    <?php $val = old($key); ?>
@endif
<div class="form-group @if(!empty($errors->first($key))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }} @if(isset($form['required']) && $form['required']) * @endif</label>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <input type="text" id="{{ $key }}" name="{{ $key }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $val }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
        @if(empty($isSearch))
        @if(!empty($form['memo'])) <span class="help-block">{{ $form['memo'] }} </span> @endif
        <span class="help-block">{{$errors->first($key)}}</span>
        @endif
    </div>
</div>
