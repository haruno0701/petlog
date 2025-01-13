@extends('layouts.admin')
@section('title', '体重比較')

@section('content')
<div class="container">
    <!-- <div class="bread">
        <ul>
        </ul>
    </div> -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="col-md-5">
                <select class="form-select" name="animal_id" aria-label="Default select example">
                    <option selected>犬猫種</option>
                    @foreach($animals as $animal)
                        <option value="{{$animal->id}}">{{$animal->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class='search-box'>
                <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i>
                    検索</button>
            </div>
            <div class="text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">適正体重</th>
                            <th scope="col"></th>
                            <th scope="col">　(kg)</th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">日付</th>
                            <th scope="col">体重(kg)</th>
                            <th scope="col">差分</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">　</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">　</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">　</th>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection