@extends('layouts.layout_admin')

@section('title', $title[0] . '一覧')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title[0] }}一覧
            <!-- <small>{{ $title[1] }} List</small> -->
            </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    @if(count($forms))
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>検索
                            <!-- <small>Search</small> -->
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" @if($query_count == 0)style="display: none" @endif>
                        <br/>
                        <form method="get" class="form-horizontal form-label-left" action="{{ action($title[1].'Controller@index')}}">
                            @if(!empty($form_query))
                                @foreach($form_query as $k => $v)
                                    @if(is_array($v))
                                        @foreach($v as $bbb)
                                            <input type="hidden" name="{{ $k }}[]" value="{{ $bbb }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                                    @endif
                                @endforeach
                            @endif
                            <?php $isSearch = true; ?>
                            @foreach($forms as $key => $form)
                                @if($form['search'] == false) @continue @endif

                                @if(isset($form['disabled']) && $form['disabled'] == true)
                                    <?php $form['disabled'] = false; ?>
                                @endif

                                @switch($form['type'])
                                    @case('hide')
                                    @break
                                    @case('textarea')
                                    @include('parts.form_textarea')
                                    @break
                                    @case('html')
                                    @include('parts.form_html')
                                    @break
                                    @case('select')
                                    @include('parts.form_select')
                                    @break
                                    @case('datetime')
                                    @include('parts.form_datetime')
                                    @break
                                    @case('file')
                                    @include('parts.form_file')
                                    @break
                                    @case('json')
                                    @include('parts.form_json')
                                    @break
                                    @case('two_datetimes')
                                    @include('parts.form_two_datetimes')
                                    @break
                                    @case('two_texts')
                                    @include('parts.form_two_texts')
                                    @break
                                    @default
                                    @include('parts.form_text')
                                @endswitch
                            @endforeach
                            <?php $isSearch = false; ?>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit">検索</button>
                                    <a class="btn btn-primary" href="{{ route('building.index') }}">リセット</a>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    @if(!isset($tables['add']) || $tables['add'] == true)
                        <a class="btn btn-primary" style="float:right;"
                           href="{{ action($title[1].'Controller@create')}}">追加</a>

                    @endif
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            @foreach ($tables['fields'] as $key => $val)
                                <th class="{{ $val['class'] }}">{{ $val['label'] }}</th>
                            @endforeach
                            <th>&emsp;</th>
                        </tr>
                        </thead>
                        @foreach ($lists as $list)
                            <tr>
                                @foreach ($tables['fields'] as $key => $val)
                                    <td class="@if(isset($val['td_class'])) {{ $val['td_class'] }} @endif" rowspan="{{ $val['td_row'] }}">
                                        @if (is_array($val['value']))
                                            @foreach($val['value'] as $k=>$v)
                                                @if($k) <br/> @endif
                                                <?php echo $list->{$v} ?>
                                            @endforeach
                                        @elseif($val['value'] == 'ids')
                                            @if($list->new)
                                                <label class="new-badge">NEW</label><br>
                                            @endif
                                        @elseif($val['value'] == 'name')

                                            <?php echo $list->{$val['value']} ?>

                                        @elseif($val['value'] == 'upload')
                                            <a href="{{ action($title[1].'Controller@upload', $list->id)}}"
                                               class="btn btn-primary" style="font-size: 12px" target="_blank">アップロード</a>
                                        @elseif($val['value'] == 'download')
                                            <a href="{{ action($title[1].'Controller@download', $list->id)}}"
                                               class="btn btn-primary" style="font-size: 12px" target="_blank">ダウンロード</a>
                                        @elseif($val['value'] == 'show')
                                            <a href="{{ action($title[1].'Controller@show', $list->id)}}"
                                               class="btn btn-primary" style="font-size: 12px" target="_blank">詳細</a>
                                        @else
                                            <?php echo $list->{$val['value']} ?>
                                        @endif
                                    </td>
                                @endforeach
                                <td rowspan="2">
                                    @foreach ($tables['actions']['content'] as $key => $val)
                                        @switch($val['action'])
                                            @case('edit')
                                            <a class="btn btn-primary" style="font-size: 12px"
                                               href="{{ action($title[1].'Controller@edit', $list->id)}}">
                                                {{ $val['label'] }}
                                            </a><br>
                                            @break
                                            @case('destroy')
                                            @component('parts.btn-del')
                                                @slot('table', strtolower($title[1]))
                                                @slot('id', $list->id)
                                            @endcomponent
                                            @break
                                            @case('tmp')
                                            @component('parts.btn-tmp')
                                                @slot('list', $list)
                                                @slot('title', $title)
                                                @slot('label', $tables['actions']['content'][3]['label'])
                                            @endcomponent
                                            @break
                                            @case('check')
                                            @component('parts.btn-check')
                                                @slot('list', $list)
                                                @slot('label', $tables['actions']['content'][4]['label'])
                                            @endcomponent
                                            @break
                                            {{--                                            @case('send')
                                                                                        <a href="{{ action($title[1].'Controller@send', $list->id)
                                                                                                }}">
                                                                                            {{ $val['label'] }}
                                                                                        </a>
                                                                                        @break--}}
                                            @default
                                            @break
                                        @endswitch
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>ファイル名</td>
                                <td><?php echo $list->file_realname ?></td>
                            </tr>
                        @endforeach
                        <tbody>
                    </table>

                    {{ $lists->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function postDownloads() {
        var ret = [];
        $("input:checkbox[name=ids]:checked").each(function(){
            ret.push($(this).val());
        });
        var url = "/tems2/public/building/downloads/";
        var query = ret.join('&');

        // alert(url + query);
        location.href = url + query;

    }
</script>
