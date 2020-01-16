<?php $key_reki = $key . '-reki'; ?>
<?php $key_seireki = $key . '-seireki'; ?>
<?php $key_wareki = $key . '-wareki'; ?>

@if(isset($_GET[$key_reki]))
    <?php $data_reki = $_GET[$key_reki]; ?>
@elseif(isset($data->$key_reki))
    <?php $data_reki = $data->$key_reki; ?>
@else
    <?php $data_reki = old($key_reki); ?>
@endif

<?php $key_nenngou = $key . '-nenngou'; ?>
@if(isset($_GET[$key_nenngou]))
    <?php $data_nenngou = $_GET[$key_nenngou]; ?>
@elseif(isset($data->$key_reki))
    <?php $data_nenngou = $data->$key_nenngou; ?>
@else
    <?php $data_nenngou = old($key_nenngou); ?>
@endif

<?php $key_year = $key . '-year'; ?>
@if(isset($_GET[$key_year]))
    <?php $data_year = $_GET[$key_year]; ?>
@elseif(isset($data->$key_reki))
    <?php $data_year = $data->$key_year; ?>
@else
    <?php $data_year = old($key_year); ?>
@endif

<?php $key_month = $key . '-month'; ?>
@if(isset($_GET[$key_month]))
    <?php $data_month = $_GET[$key_month]; ?>
@elseif(isset($data->$key_reki))
    <?php $data_month = $data->$key_month; ?>
@else
    <?php $data_month = old($key_month); ?>
@endif

<?php $key_day = $key . '-day'; ?>
@if(isset($_GET[$key_day]))
    <?php $data_day = $_GET[$key_day]; ?>
@elseif(isset($data->$key_reki))
    <?php $data_day = $data->$key_day; ?>
@else
    <?php $data_day = old($key_day); ?>
@endif

<div class="form-group @if(!empty($errors->first($key))) has-error @endif">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{ $form['label'] }}</label>
    <div class="col-md-8 col-sm-8 col-xs-12">

        <select name="{{ $key }}-reki" class="form-control" id="{{ $key }}-reki">
            <option value="{{ $key }}-seireki" @if($data_reki == $key_seireki) selected @endif>西暦</option>
            <option value="{{ $key }}-wareki" @if($data_reki == $key_wareki) selected @endif>和暦</option>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        checkBlock('<?php echo $key ?>', $('#' + '<?php echo $key_reki; ?>').children("option:selected").val());

        $('#' + '<?php echo $key_reki; ?>').change(function(){
            checkBlock('<?php echo $key ?>', $(this).children("option:selected").val());
        });
    });
</script>

<div class="form-group @if(!empty($errors->first($key))) has-error @endif" id="{{ $key }}-seireki">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
        @if(isset($form['sort']))
            <?php $datepicker_id = 'datepicker' . $form['sort']; ?>
        @endif
        @if(isset($_GET[$key]))
            <?php $dbDate = $_GET[$key]; ?>
        @elseif(isset($data->$key))
            <?php $dbDate = old($key, $data->$key); ?>
        @else
            <?php $dbDate = old($key); ?>
        @endif

        <?php $dbDate = $dbDate ? date('Y年m月d日', strtotime($dbDate)) : ''; ?>

        <input type="text" id="{{ $datepicker_id }}" name="{{ $key }}" class="form-control
                                    col-md-7 col-xs-12" value="{{ $dbDate }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif>
        <script type="text/javascript">
            $(function () {
                $('#' + '<?php echo $datepicker_id; ?>').datepicker({

                    format: 'yyyy年mm月dd日',
                    // language: 'ja'
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

<div class="form-group @if(!empty($errors->first($key))) has-error @endif" id="{{ $key }}-wareki">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"></label>

    <div class="col-md-2 col-sm-2 col-xs-12">
        <select name="{{ $key_nenngou }}" id="{{ $key_nenngou }}" class="form-control">
            <option value="0" @if($data_nenngou == 0) selected @endif>明治</option>
            <option value="1" @if($data_nenngou == 1) selected @endif>大正</option>
            <option value="2" @if($data_nenngou == 2) selected @endif>昭和</option>
            <option value="3" @if($data_nenngou == 3) selected @endif>平成</option>
            <option value="4" @if($data_nenngou == 4) selected @endif>令和</option>
        </select>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <input type="text" class="form-control" style="width: 80%; margin-right: 5%; float: left"
               id="{{ $key_year }}" name="{{ $key_year }}" value="{{ $data_year }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif><label style="margin-top: 7px">年</label>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-12">
        <input type="text" class="form-control" style="width: 80%; margin-right: 5%; float: left"
               id="{{ $key_year }}" name="{{ $key_month }}" value="{{ $data_year }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif><label style="margin-top: 7px">月</label>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-12">
        <input type="text" class="form-control" style="width: 80%; margin-right: 5%; float: left"
               id="{{ $key_day }}" name="{{ $key_day }}" value="{{ $data_day }}"
               @if(isset($form['disabled']) && $form['disabled']) disabled @endif><label style="margin-top: 7px">日</label>
    </div>

    @if(empty($isSearch))
        @if(isset($form['memo']))
            <span class="help-block">{{ $form['memo'] }}</span>
        @endif
            <div class="col-md-3 col-sm-3 col-xs-12">
            </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <span class="help-block">{{$errors->first($key)}}</span>
        </div>
    @endif

</div>

