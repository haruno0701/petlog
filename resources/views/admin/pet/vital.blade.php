@extends('layouts.admin')
@section('title', '体調管理')

@section('content')
<div class="container">
        <div class="bread">
            <ul>
                <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
                <li><a href="http://127.0.0.1:8080/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            </ul>
        </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="pet">
                    <div class="image">
                        <img src="{{asset('storage/image/' . $pet->image_path) }}">
                    </div>
                    <table class="table">
                        <tr>
                            <th scope="row">名前:
                            <td>{{ Str::limit($pet->name, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row">年齢:
                            <td>{{ $pet->getAgeAttribute() }} 才 {{ $pet->getMonthAttribute() }}ヶ月</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">性別:
                            <td>{{ Str::limit($pet->gender, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">種類:
                            <td>{{ Str::limit($pet->animal->name, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">誕生日:
                            <td>{{ Str::limit($pet->birthday, 150) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">メモ:
                            <td>{{ Str::limit($pet->memo, 250) }}</td>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.pet.vitallist', ['id' => $pet->id]) }}" role="button" class="btn btn-secondary">
                    体調管理一覧へ
                </a>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('admin.pet.manageWeight', ['id' => $pet->id]) }}" class="btn btn-outline-dark">体重</a>
                <a href="{{ route('admin.pet.manageTemperature', ['id' => $pet->id])}}" class="btn btn-outline-dark">体温</a>
                <a href="{{ route('admin.pet.manageStroll', ['id' => $pet->id]) }}" class="btn btn-outline-dark">散歩</a>
                <a href="{{ route('admin.pet.manageUrine', ['id' => $pet->id]) }}" class="btn btn-outline-dark">尿</a>
                <a href="{{ route('admin.pet.manageFlight', ['id' => $pet->id]) }}" class="btn btn-outline-dark">便</a>
            </div>
        </div>
    </div>
</div>
@endsection