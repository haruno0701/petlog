@extends('layouts.admin')
@section('title', '体調管理(体重)')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="pull-left">名前</div>
            <div class="mb-3 row">
                <label for="text" class="col-sm-5 col-form-label">日付</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control">
                </div>
                <label for="text" class="col-sm-5 col-form-label">体重</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection