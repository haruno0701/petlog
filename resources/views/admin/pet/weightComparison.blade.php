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
                <form action="{{ route('admin.pet.comparison') }}" method="get" enctype="multipart/form-data">
                    <select class="form-select" name="pet_id" aria-label="Default select example">
                        <option selected>選択してください。</option>
                        @foreach($pets as $pet)
                            <option value="{{$pet->id}}">{{$pet->name}}</option>
                        @endforeach
                    </select>
                    <div class='search-box'>
                    <input type="submit" class="btn btn-secondary" value="検索">
                    </div>
                </form>
            </div>
            <div class="text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">適正体重</th>
                            <th scope="col">
                                @if ($animal != null)
                                    {{$animal->name}}
                                @endif
                            </th>
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