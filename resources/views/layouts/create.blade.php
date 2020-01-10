@extends('layouts.layout_admin')

@section('title', $title[0] . '新規登録|物件管理')

@section('content')

        <div class="page-title">
            <div class="title_left">
                <h3>{{ $title[0] }}新規登録</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br/>
                        <form action="{{ action($title[1].'Controller@store') }}" method="post"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            @foreach($forms as $key => $form)
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
                                    @case('multiselect')
                                    @include('parts.form_multiselect')
                                    @break
                                    @case('datetime')
                                    @include('parts.form_datetime')
                                    @break
                                    @case('datetimepicker')
                                    @include('parts.form_datetimepicker')
                                    @break
                                    @case('file')
                                    @include('parts.form_file')
                                    @break
                                    @case('json')
                                    @include('parts.form_json')
                                    @break
                                    @default
                                    @include('parts.form_text')
                                @endswitch
                            @endforeach

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">保存する</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
