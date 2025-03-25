@extends('layouts.admin')
@section('title', '体調管理(散歩)')

@section('content')
<div class="container">
    <div class="bread">
        <ul>
            <li><a href="/admin/pet/top">ペット一覧</a></li>
            <li><a href="/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            <li><a href="/admin/pet/stroll?id={{$pet->id}}">{{$pet->name}}の散歩</a></li>

        </ul>
    </div>
    <form action="{{ route('admin.pet.registHealth') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="pull-left">🐾{{$pet->name}}ちゃんの散歩</div>
                <div class="mb-3 row">
                    <label for="text" class="col-sm-5 col-form-label">散歩</label>
                    <div class="col-sm-3">
                        <input type="text" name="category_value" class="form-control">
                    </div>分/回
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" type="submit">
                        登録
                    </button>
                </div>
                <input type="hidden" name="pet_id" class="form-control" value="{{$pet->id}}">
                <input type="hidden" name="category_id" class="form-control" value="3">
                <input type="hidden" name="category_name" class="form-control" value="stroll">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="pull-left">前回の記録</div>
            <div class="text-center">
                @foreach ($details as $stroll)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">記録日</th>
                                <th scope="col">散歩</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{ Str::limit($stroll->date, 80) }}</td>
                            <td>{{ Str::limit($stroll->category_value, 80) }}(分/回)</td>
                            <div class="d-flex justify-content-end">
                                <form action="{{route('admin.pet.deleteDetail')}}">
                                    @csrf
                                    <input type="hidden" name="id" class="form-control" value="{{$stroll->id}}">
                                    <input type="hidden" name="detail_page_name" value="stroll">
                                    <button class="round_btn" onclick="return confirm('削除しますか？')"></button>
                                </form>
                            </div>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection