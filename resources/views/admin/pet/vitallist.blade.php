@extends('layouts.admin')
@section('title', '体調管理一覧')

@section('content')
    <div class="container">
        <div class="bread">
            <ul>
                <li><a href="/admin/pet/top">ペット一覧</a></li>
                <li><a href="/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
                <li><a href="/admin/pet/vitallist?id={{$pet->id}}">{{$pet->name}}の体調管理一覧</a></li>
            </ul>
        </div>
        <form action="{{ route('admin.pet.vitallist') }}" method="get" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="text-center">
                        <h3>体調管理一覧</h3>
                        <select class="form-select" name="cond_category" aria-label="Default select example">
                            <option value="all">全て</option>
                            <option value="1">体重</option>
                            <option value="2">体温</option>
                            <option value="3">散歩</option>
                            <option value="4">尿</option>
                            <option value="5">便</option>
                        </select>
                    </div>
                    <div class='search-box'>
                        <input type="submit" class="btn btn-secondary" value="絞り込み">
                        <input type="hidden" name="id" value="{{$pet->id}}">
                    </div>
                    <div class="text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">カテゴリー</th>
                                    <th scope="col">値</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <th scope="row">{{ Str::limit($detail->date, 80) }}</th>
                                        <td>{{ Str::limit($detail->category->category_name, 80) }}</td>
                                        <td>{{ Str::limit($detail->category_value, 80) }}
                                            @if ($detail->category_id == 1)
                                                (kg)
                                            @elseif($detail->category_id == 2)
                                                (℃)
                                            @elseif($detail->category_id == 3)
                                                (分/回)
                                            @else
                                                (回)
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection