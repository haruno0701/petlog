@extends('layouts.admin')
@section('title', '体調管理')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="pet">
                    <div class="image">
                        <img src="{{asset('storage/image/' . $pets->image_path) }}">
                    </div>
                    <table class="table">
                        <tr>
                            <th scope="row">名前:
                            <td>{{ Str::limit($pets->name, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row">年齢:
                            <td>{{ $pets->getAgeAttribute() }} 才 {{ $pets->getMonthAttribute() }}ヶ月</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">性別:
                            <td>{{ Str::limit($pets->gender, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">種類:
                            <td>{{ Str::limit($pets->animal->name, 80) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">誕生日:
                            <td>{{ Str::limit($pets->birthday, 150) }}</td>
                            </th>
                        </tr>
                        <tr>
                            <th class="row">メモ:
                            <td>{{ Str::limit($pets->memo, 250) }}</td>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.pet.vitallist') }}" role="button" class="btn btn-secondary">
                    体調管理一覧へ
                </a>
            </div>
            <div class="list-group">
                <a href="{{ route('admin.pet.bw') }}" class="list-group-item list-group-item-action">体重</a>
                <a href="#" class="list-group-item list-group-item-action">体温</a>
                <a href="#" class="list-group-item list-group-item-action">散歩</a>
                <a href="#" class="list-group-item list-group-item-action">尿</a>
                <a class="list-group-item list-group-item-action disabled">便</a>
            </div>
        </div>
    </div>
</div>
@endsection