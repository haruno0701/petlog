@extends('layouts.admin')
@section('title', '体調管理(体温)')

@section('content')
<div class="container">
    <div class="bread">
        <ul>
            <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/temperature?id={{$pet->id}}">{{$pet->name}}の体温</a></li>

        </ul>
    </div>
    <form action="{{ route('admin.pet.registTemperature') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="pull-left">🐾{{$pet->name}}ちゃんの体温</div>
                <div class="mb-3 row">
                    <label for="text" class="col-sm-5 col-form-label">体温</label>
                    <div class="col-sm-3">
                        <input type="text" name="temperature" class="form-control">
                    </div>℃
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" type="submit">
                        登録
                    </button>
                </div>
                <input type="hidden" name="pet_id" class="form-control" value="{{$pet->id}}">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="pull-left">前回の記録</div>
            <div class="text-center">
                @foreach ($pet->temperatures as $temperature)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">記録日</th>
                                <th scope="col">体温</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{ Str::limit($temperature->date, 80) }}</td>
                            <td>{{ Str::limit($temperature->temperature, 80) }}(℃)</td>
                            <div class="d-flex justify-content-end">
                                <!-- <button class="round_btn" onclick="deleteItem({{$temperature}})">
                                                            </button> -->
                                <form action="{{route('admin.pet.deleteTemperature')}}">
                                    @csrf
                                    <input type="hidden" name="id" class="form-control" value="{{$temperature->id}}">
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