@extends('layouts.app')

@section('content')

<!-- メモ登録用パネル -->
<div class="panel-body m-5">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <div class="my-3">
        <p class="text-center">No.{{ $memo->id }}メモ編集</p>
    </div>

    <div class="mx-auto" style="width: 60%">
        <!-- メモ編集フォーム -->
        <form action="{{ url('/memos/edit/'.$memo->id) }}" method="POST">
            {{ csrf_field() }}

            <!-- メモ名 -->
            <label for="memo-name" class="my-3">メモ内容</label>
            <div>
                <div class="my-3 col-sm-12">
                    <input type="text" name="name" id="memo-name" class="form-control" value="{{ $memo->name }}">
                </div>
            </div>

            
            <div class="row my-3 justify-content-between">
                <!-- 戻るボタン -->
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" onclick="location.href='/memos'">戻る</button>
                </div>
                <!-- メモ修正ボタン -->
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">修正</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection