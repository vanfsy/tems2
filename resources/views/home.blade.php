@extends('layouts.layout_admin')

@section('title', '物件一覧')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>物件一覧</h3>
        </div>
    </div>

    <div class="clearfix"></div>

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
                <div class="x_content">
                    <br/>
                    <form method="get" class="form-horizontal form-label-left" action="">
                        @foreach($forms as $key=>$form)
                            @include('parts.form_text')
                        @endforeach

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="submit">検索</button>
                                <button class="btn btn-primary" type="reset">リセット</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <a class="btn btn-primary" style="float:right;" href="">追加</a>

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
                                    <td>
                                        @if (is_array($val['value']))
                                            @foreach($val['value'] as $k=>$v)
                                                @if($k) <br/> @endif
                                                <?php echo $list->{$v} ?>
                                            @endforeach
                                        @elseif($val['value'] == 'display_status')
                                            <?php echo $list->status ?>
                                        @else
                                            <?php echo $list->{$val['value']} ?>
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    @foreach ($tables['actions']['content'] as $key => $val)
                                        @switch($val['action'])
                                            @case('show')
                                            <a href="{{ action($title[1].'Controller@show', $list->id)
                                                    }}">
                                                {{ $val['label'] }}
                                            </a>
                                            @break
                                            @case('billing')
                                            <a href="{{ action('PagesController@billing', $list->id)
                                                    }}" target="_blank">
                                                {{ $val['label'] }}
                                            </a>
                                            @break
                                            @case('edit')
                                            <a href="{{ action($title[1].'Controller@edit', $list->id)
                                                    }}">
                                                {{ $val['label'] }}
                                            </a>
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
                        @endforeach
                        <tbody>
                    </table>
                    {{ $lists->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
