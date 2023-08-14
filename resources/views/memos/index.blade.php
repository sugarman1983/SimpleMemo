@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<meta name="_token" content="{{ csrf_token() }}">

<div class="m-5">
    <!-- メモ登録用パネル -->
    <div class="panel-body mb-5">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <label for="memo-name" class="control-label">新規登録</label>
        <!-- 新メモフォーム -->
        <form action="{{ url('/memos/add') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <!-- メモ入力欄 -->
                <div class="col-6">
                    <input type="text" name="name" id="memo-name" class="form-control">
                </div>

                <div class="col-auto">
                    <!-- メモ登録ボタン -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> 登録
                    </button>
                </div>
            </div>
        </form>
    </div>

    <hr>

    <!-- メモ一覧表示 -->
    @if (count($memos) > 0)
    <div class="panel panel-default">
        <div class="panel-heading my-3">
            メモ一覧
        </div>

        <div class="panel-body">
            <table class="table">

                <!-- テーブルヘッダ -->
                <thead>
                    <th style="width: 5%">No.</th>
                    <th style="width: 45%">メモ内容</th>
                    <th style="width: 15%">作成日時</th>
                    <th style="width: 15%">更新日時</th>
                    <th style="width: 10%">&nbsp;</th>
                    <th style="width: 10%">&nbsp;</th>
                </thead>

                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($memos as $memo)
                    <tr class="align-middle">
                        <!-- メモID -->
                        <td>
                            <div>{{ $memo->id }}</div>
                        </td>

                        <!-- メモ名 -->
                        <td class="table-text">
                            <div>{{ $memo->name }}</div>
                        </td>

                        <!-- メモ作成日時 -->
                        <td>
                            <div>{{ $memo->created_at }}</div>
                        </td>

                        <!-- メモ更新日時 -->
                        <td>
                            <div>{{ $memo->updated_at }}</div>
                        </td>

                        <td>
                            <!-- メモ編集ボタン -->
                            <button type="button" class="btn btn-success" onclick="location.href='/memos/edit/{{ $memo->id }}'">編集</button>
                        </td>

                        <td>
                            <!-- メモ削除ボタン -->
                            <form action="{{url('/memos/delete/'.$memo->id)}}" method="POST">
                                @csrf
                                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除してもよろしいですか？");'>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection