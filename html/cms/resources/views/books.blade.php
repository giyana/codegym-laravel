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

    <!-- 本のタイトル -->
    <form action="{{url('books')}}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-low">
            <div class="form-group col-md-6">
                <label for="book" class="col-sm-3 control-label">Book</label>
                <input type="text" name="item_name" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="amount" class="col-sm-3 control-label">金額</label>
                <input type="text" name="item_amount" class="form-control">
            </div>
        </div>

        <div class="form-low">
            <div class="form-group col-md-6">
                <label for="number" class="col-sm-3 control-label">数</label>
                <input type="text" name="item_number" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="published" class="col-sm-3 control-label">公開日</label>
                <input type="date" name="published" class="form-control">
            </div>
        </div>

        <!-- 本 登録ボタン -->
        <div class="form-row">
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
                    <!-- 本更新ボタン -->
                    <td>
                        <form action="{{url('booksedit/'.$book->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">更新</button>
                        </form>
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
