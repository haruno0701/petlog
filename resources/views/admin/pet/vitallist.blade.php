@extends('layouts.admin')
@section('title', '体調管理一覧')

@section('content')
<div class="container">
    <div class="bread">
        <ul>
            <li><a href="http://127.0.0.1:8080/admin/pet/top">ペット一覧</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/vital?id={{$pet->id}}">{{$pet->name}}</a></li>
            <li><a href="http://127.0.0.1:8080/admin/pet/vitallist?id={{$pet->id}}">{{$pet->name}}の体調管理一覧</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h3>体調管理一覧</h3>
            </div>
            <div class="text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">体重</th>
                            <th scope="col">体温</th>
                            <th scope="col">散歩</th>
                            <th scope="col">尿</th>
                            <th scope="col">便</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pet->weights as $weight)
                            <tr>
                                <th scope="row">{{ Str::limit($weight->date, 80) }}</th>
                                <td>{{ Str::limit($weight->weight, 80) }}kg</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        @foreach ($pet->temperatures as $temperature)
                        <tr>
                            <th scope="row">{{ Str::limit($temperature->date, 80) }}</th>
                            <td></td>
                            <td>{{ Str::limit($temperature->temperature, 80) }}℃</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                        @foreach ($pet->strolls as $stroll)
                        <tr>
                            <th scope="row">{{ Str::limit($stroll->date, 80) }}</th>
                            <td></td>
                            <td></td>
                            <td>{{ Str::limit($stroll->stroll, 80) }}分/回</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                        @foreach ($pet->urines as $urine)
                        <tr>
                            <th scope="row">{{ Str::limit($urine->date, 80) }}</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ Str::limit($urine->urine, 80) }}回</td>
                            <td></td>
                        </tr>
                        @endforeach
                        @foreach ($pet->flights as $flight)
                        <tr>
                            <th scope="row">{{ Str::limit($flight->date, 80) }}</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ Str::limit($flight->flight, 80) }}回</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection