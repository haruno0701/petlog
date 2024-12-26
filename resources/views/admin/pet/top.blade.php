@extends('layouts.admin')
@section('title', 'ペット一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h3>ペット一覧</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto row">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.pet.add') }}" role="button" class="btn btn-secondary">+</a>
            </div>
            @if(count($posts) == 0)
                <p>右上の＋ボタンからペット登録をしてください。</p>
            @endif
            @foreach($posts as $pets)
                <div class="d-flex justify-content-end">
                    <button class="round_btn" onclick="deleteItem({{$pets->id}})">
                    </button>
                </div>
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
                    <a href="{{ route('admin.pet.vital', ['id' => $pets->id]) }}" role="button" class="btn btn-secondary">
                        体調管理へ
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection