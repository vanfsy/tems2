<?php $key_lower = $key . '_lower'; ?>
<?php $key_upper = $key . '_upper'; ?>
<div class="form-group @if(!empty($errors->first($key_lower)) || !empty($errors->first($key_upper))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}下限</label>

    @if(isset($form['sort']))
        <?php $datepicker_lower = 'datepicker' . $form['sort'][0]; ?>
        <?php $datepicker_upper = 'datepicker' . $form['sort'][1]; ?>
    @endif

    @if(isset($_GET[$key_lower]))
        <?php $dbDateLower = $_GET[$key_lower]; ?>
    @elseif(isset($data->$key_lower))
        <?php $dbDateLower = $data->$key_lower; ?>
    @else
        <?php $dbDateLower = ''; ?>
    @endif

    @if(isset($_GET[$key_upper]))
        <?php $dbDateUpper = $_GET[$key_upper]; ?>
    @elseif(isset($data->$key_lower))
        <?php $dbDateUpper = $data->$key_upper; ?>
    @else
        <?php $dbDateUpper = ''; ?>
    @endif

    <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" id="{{ $datepicker_lower }}" name="{{ $key_lower }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $dbDateLower }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">{{ $form['label'] }}上限</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" id="{{ $datepicker_upper }}" name="{{ $key_upper }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $dbDateUpper }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
    </div>
</div>

<script type="text/javascript">
    var type='<?php echo $form['cal_type'] ?>';
    if (type === 'month') {
        $(function () {
            $('#' + '<?php echo $datepicker_lower; ?>').datepicker({
                format: 'yyyy-m',
                language: 'ja',
                viewMode: 'months',
                minViewMode: "months"
            });
            $('#' + '<?php echo $datepicker_upper; ?>').datepicker({
                format: 'yyyy-m',
                language: 'ja',
                viewMode: 'months',
                minViewMode: "months"
            });
        });
    } else if (type === 'date') {
        $(function () {
            $('#' + '<?php echo $datepicker_lower; ?>').datepicker({
                format: 'yyyy-mm-dd-',
                language: 'ja'
            });
            $('#' + '<?php echo $datepicker_upper; ?>').datepicker({
                format: 'yyyy-mm-dd',
                language: 'ja'
            });
        });
    }
</script>
