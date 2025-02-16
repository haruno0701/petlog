@extends('layouts.admin')
@section('title', '体調管理(便)')

@section('content')
<div class="container">
    <div class="bread">
        <ul>
            <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/flight?id={{$pet->id}}">{{$pet->name}}の便</a></li>

        </ul>
    </div>
    <form action="{{ route('admin.pet.registHealth') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="pull-left">🐾{{$pet->name}}ちゃんの便</div>
                <div class="mb-3 row">
                    <label for="text" class="col-sm-5 col-form-label">便</label>
                    <div class="col-sm-3">
                        <input type="text" name="category_value" class="form-control">
                    </div>回
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" type="submit">
                        登録
                    </button>
                </div>
                <input type="hidden" name="pet_id" class="form-control" value="{{$pet->id}}">
                <input type="hidden" name="category_id" class="form-control" value="5">
                <input type="hidden" name="category_name" class="form-control" value="flight">
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="pull-left">前回の記録</div>
            <div class="text-center">
                @foreach ($pet->flights as $flight)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">記録日</th>
                                <th scope="col">便</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{ Str::limit($flight->date, 80) }}</td>
                            <td>{{ Str::limit($flight->flight, 80) }}(回)</td>
                            <div class="d-flex justify-content-end">
                                <form action="{{route('admin.pet.deleteFlight')}}">
                                    @csrf
                                    <input type="hidden" name="id" class="form-control" value="{{$flight->id}}">
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