<?php $key_lower = $key . '_lower'; ?>
<?php $key_upper = $key . '_upper'; ?>
<div class="form-group @if(!empty($errors->first($key_lower)) || !empty($errors->first($key_upper))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}下限</label>

    @if(isset($_GET[$key_lower]))
        <?php $data_lower = $_GET[$key_lower]; ?>
    @elseif(isset($data->$key_lower))
        <?php $data_lower = $data->$key_lower; ?>
    @else
        <?php $data_lower = ''; ?>
    @endif

    @if(isset($_GET[$key_upper]))
        <?php $data_upper = $_GET[$key_upper]; ?>
    @elseif(isset($data->$key_lower))
        <?php $data_upper = $data->$key_upper; ?>
    @else
        <?php $data_upper = ''; ?>
    @endif

    <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" id="{{ $key_lower }}" name="{{ $key_lower }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $data_lower }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">{{ $form['label'] }}上限</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" id="{{ $key_upper }}" name="{{ $key_upper }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $data_upper }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
    </div>
</div>
