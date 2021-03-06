<div class="form-group @if(!empty($errors->first($key))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @if(isset($form['sort']))
            <?php $datepicker_id = 'datepicker' . $form['sort']; ?>
        @endif
        @if(isset($_GET[$key]))
            <?php $dbDate = $_GET[$key]; ?>
        @elseif(isset($data->$key))
            <?php $dbDate = $data->$key; ?>
        @else
            <?php $dbDate = ''; ?>
        @endif
        <input type="text" id="{{ $datepicker_id }}" name="{{ $key }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $dbDate }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
        <script type="text/javascript">
            $(function () {
                $('#' + '<?php echo $datepicker_id; ?>').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                    locale: 'ja'
                });
            });
        </script>
        @if(empty($isSearch))
            @if(isset($form['memo']))
                <span class="help-block">{{ $form['memo'] }}</span>
            @endif
            <span class="help-block">{{$errors->first($key)}}</span>
        @endif
    </div>
</div>
