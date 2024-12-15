@extends('layouts.admin')
@section('title', '体調管理')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <tbody>
                    <div class="col-12 col-md-6 col-lg-4 bg-light">
                        @foreach($posts as $pets)
                            <img src="..." class="rounded mx-auto d-block" alt="...">
                            <tr>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">名前
                                        <td>{{ Str::limit($pets->name, 80) }}</td>
                                    </li>
                                    <li class="list-group-item">年齢</li>
                                    <li class="list-group-item">性別
                                        <td>{{ Str::limit($pets->gender, 80) }}</td>
                                    </li>
                                    <li class="list-group-item">種類
                                        <td>{{ Str::limit($pets->breed, 100) }}</td>
                                    </li>
                                    <li class="list-group-item">誕生日
                                        <td>{{ Str::limit($pets->birthday, 150) }}</td>
                                    </li>
                                    <li class="list-group-item">メモ
                                        <td>{{ Str::limit($pets->memo, 250) }}</td>
                                    </li>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-secondary" type="button">
                                            体調管理一覧へ
                                        </button>
                                    </div>
                                </ul>
                            </tr>
                        @endforeach
                </tbody>
            </div>
        </div>
    </div>
</div>
@endsection