<!-- resources/views/books.blade.php -->
@extends('layouts.app');
@section('content')
<!-- Bootstrapの定型コード -->
<div class="card-body">
    <div class="card-title">
        本のタイトル
    </div>

    <!-- バリデーションエラーの表示に使用 -->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用 -->

    <!-- 本登録フォーム -->
    <form action="{{url('books')}}" method="POST" class="form-horizontal">
        @csrf

        <!-- 本のタイトル -->
        <div class="form-group">
            <div class="col-sm-6">
                <input type="text" name="item_name" class="form-control">
            </div>
        </div>

        <!-- 本登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
<!-- Book:既に登録されている本のリスト -->
<!-- 現在の本 -->
@if(count($books)>0)
<div class="card-body">
    <div class="card-doby">
        <table class="table table-striped task-table">
            <!-- テーブルヘッダー -->
            <thead>
                <th>本一覧</th>
                <th>&nbsp;</th>
            </thead>
            <!-- テーブル本体 -->
            <tdody>
                @foreach($books as $book)
                <tr>
                    <!-- 本タイトル -->
                    <td class="table-text">
                        <div>{{$book->item_name}}</div>
                    </td>
                    <!-- 本削除ボタン -->
                    <td>
                        <form action="{{url('book/'.$book->id)}}" method="POST">
                            <!-- CSRFからの保護 -->
                            @csrf
                            <!-- 疑似フォームメソッド -->
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tdody>
        </table>
    </div>
</div>
@endif

@endsection
