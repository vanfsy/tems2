@if(isset($data))
    <?php $val = $data->$key; ?>
@else
    <?php $val = old($key); ?>
@endif
<div class="form-group @if(!empty($errors->first($key))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}</label>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <textarea name="{{ $key }}" id="{{ $key }}" cols="30" rows="10" class="form-control">{{ $val }}</textarea>
        @if(empty($isSearch))
        @if(!empty($form['memo'])) <span class="help-block">{{ $form['memo'] }} </span> @endif
        <span class="help-block">{{$errors->first($key)}}</span>
        @endif
    </div>
</div>
