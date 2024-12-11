@extends('layouts.admin')
@section('title', 'ペット新規登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 mx-auto">
            <div class="text-center">
                <h3>ペット新規登録</h3>

                <div class="d-flex justify-content-top">
                    <a href="{{ route('admin.pet.index') }}" role="button" class="btn btn-secondary">戻る</a>
                </div>
                <form action="{{ route('admin.pet.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="card">
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="name" placeholder="名前"
                                    aria-label="default input example">
                            </li>
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="gender" placeholder="性別"
                                    aria-label="default input example">
                            </li>
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="breed" placeholder="種類"
                                    aria-label="default input example">
                            </li>
                            <li class="list-group-item">
                                <input class="form-control" type="text" name="birthday" placeholder="誕生日"
                                    aria-label="default input example">
                            </li>
                            <li class="list-group-item">
                                <div class="form-floating">
                                    <textarea class="form-control" name="memo" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">メモ</label>
                                </div>
                            </li>
                            @csrf
                        </ul>
                    </div>
                    <button class="btn btn-secondary" type="submit">
                        登録
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection