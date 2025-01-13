@extends('layouts.admin')
@section('title', '体調管理(体重)')

@section('content')
<div class="container">
    <div class="bread">
        <ul>
            <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/weight?id={{$pet->id}}">{{$pet->name}}の体重</a></li>

        </ul>
    </div>
    <form action="{{ route('admin.pet.registWeight') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="pull-left">🐾{{$pet->name}}ちゃんの体重</div>
                <div class="mb-3 row">
                    <label for="text" class="col-sm-5 col-form-label">体重</label>
                    <div class="col-sm-3">
                        <input type="text" name="weight" class="form-control">
                    </div>kg
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" type="submit">
                        登録
                    </button>
                </div>
                <input type="hidden" name="pet_id" class="form-control" value="{{$pet->id}}">
                <div class="pull-left">前回の記録</div>
                <div class="text-center">
                    @foreach ($pet->weights as $weight)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">記録日</th>
                                    <th scope="col">体重</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>{{ Str::limit($weight->date, 80) }}</td>
                                <td>{{ Str::limit($weight->weight, 80) }}(kg)</td>
                                <div class="d-flex justify-content-end">
                                    <button class="round_btn" onclick="deleteWeight({{$weight->id}})">
                                    </button>
                                </div>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
        @csrf
    </form>
</div>
@endsection