@extends('layouts.layout_admin')

@section('title', $title[0] . '詳細| SESSION')

@section('content')

        <div class="page-title">
            <div class="title_left">
                <h3>{{ $title[0] }}詳細
                    <small>{{ $title[1] }} Detail</small>
                </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br/>
                        <form action="" method="post" class="form-horizontal">
                            @foreach($forms as $key => $form)
                                @if($form['type'] != 'two_datetimes')
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12"
                                           for="first-name">{{ $form['label'] }}</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @switch($form['type'])
                                            @case('textarea')
                                            <?php echo $data->$key ?>
                                            @break
                                            @case('select')
                                            @if(isset($data->$key))
                                                {{ $form['values'][$data->$key] }}
                                            @endif
                                            @break
                                            @case('datetime')
                                            <?php echo $data->$key ?>
                                            @break
                                            @case('file')
                                            @if(!empty($data->$key))
                                                <a href="/tems2/public/uploads/{{ $data->$key }}" target="_blank">
                                                    /tems2/public/uploads/{{ $data->$key }}
                                                </a>
                                            @endif
                                            @break
                                            @default
                                            <?php echo $data->$key ?>
                                        @endswitch
                                    </div>
                                </div>
                                @endif
                            @endforeach

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ action($title[1].'Controller@index') }}"
                                       class="btn btn-default">戻る</a>
{{--                                    <a href="{{ action($title[1].'Controller@edit', $data->id)
                                                    }}" class="btn btn-danger">
                                        編集する
                                    </a>--}}
                                    {{--@component('parts.btn-del')--}}
                                        {{--@slot('table', strtolower($title[1]))--}}
                                        {{--@slot('id', $data->id)--}}
                                    {{--@endcomponent--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
