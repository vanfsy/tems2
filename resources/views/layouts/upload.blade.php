@extends('layouts.layout_admin')

@section('title', $title[0] . '|アップロード')

@section('content')

        <div class="page-title">
            <div class="title_left">
                <h3>{{ $title[0] }}ファイルアップロード</h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br/>
                        <form action="{{ action($title[1].'Controller@uploadPost',['id' => $id])
                        }}"
                              method="post"
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            @foreach($forms as $key => $form)
                                @switch($form['type'])
                                    @case('file')
                                    @include('parts.form_file')
                                    @break
                                @endswitch
                            @endforeach

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">保存する</button>
                                    <a href="{{ action($title[1].'Controller@index') }}"
                                       class="btn btn-default">戻る</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
