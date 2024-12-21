@extends('layouts.admin')
@section('title', '体調管理')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <tbody>
                    <div class="col-12 col-md-6 col-lg-4 bg-light">
                        <img src="..." class="rounded mx-auto d-block" alt="...">
                        <tr>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">名前
                                    <td>{{ Str::limit($pet->name, 80) }}</td>
                                </li>
                                <li class="list-group-item">年齢</li>
                                <li class="list-group-item">性別
                                    <td>{{ Str::limit($pet->gender, 80) }}</td>
                                </li>
                                <li class="list-group-item">種類
                                    <td>{{ Str::limit($pet->breed, 100) }}</td>
                                </li>
                                <li class="list-group-item">誕生日
                                    <td>{{ Str::limit($pet->birthday, 150) }}</td>
                                </li>
                                <li class="list-group-item">メモ
                                    <td>{{ Str::limit($pet->memo, 250) }}</td>
                                </li>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.pet.vitallist') }}" role="button" class="btn btn-secondary">
                                        体調管理一覧へ
                                    </a>
                                </div>
                            </ul>
                        </tr>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">体重</a>
                            <a href="#" class="list-group-item list-group-item-action">体温</a>
                            <a href="#" class="list-group-item list-group-item-action">散歩</a>
                            <a href="#" class="list-group-item list-group-item-action">尿</a>
                            <a class="list-group-item list-group-item-action disabled">便</a>
                        </div>
                    </div>
                </tbody>
            </div>
        </div>
    </div>
</div>
@endsection