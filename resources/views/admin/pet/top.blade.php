@extends('layouts.admin')
@section('title', 'ペット一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h3>ペット一覧</h3>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.pet.add') }}" role="button" class="btn btn-secondary">+</a>
                </div>

                <div class="col-12 col-md-6 col-lg-4 bg-light">

                    <tbody>
                        @foreach($posts as $pets)
                            <img src="..." class="rounded mx-auto d-block" alt="...">
                            <tr>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">名前
                                        <td>{{ Str::limit($pets->name, 80) }}</td>
                                    </li>
                                    <li class="list-group-item">年齢
                                    <td>
                                        {{ $pets->getAgeAttribute() }} 才 {{ $pets->getMonthAttribute() }}ヶ月
                                    </td>
                                    </li>
                                    <li class="list-group-item">性別
                                        <td>{{ Str::limit($pets->gender, 80) }}</td>
                                    </li>
                                    <li class="list-group-item">種類

                                    </li>
                                    <li class="list-group-item">誕生日
                                        <td>{{ Str::limit($pets->birthday, 150) }}</td>
                                    </li>
                                    <li class="list-group-item">メモ
                                        <td>{{ Str::limit($pets->memo, 250) }}</td>
                                    </li>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.pet.vital', ['id' => $pets->id]) }}" role="button"
                                            class="btn btn-secondary">
                                            体調管理へ
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.pet.delete', ['id' => $pets->id]) }}">削除</a>
                                    </div>

                                </ul>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection