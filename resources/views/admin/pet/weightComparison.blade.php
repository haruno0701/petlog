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
                        <option>選択してください。</option>
                        @foreach($pets as $selectItem)
                            <option value="{{$selectItem->id}}" @if(optional($pet)->id == $selectItem->id) selected @endif>
                                {{$selectItem->name}}</option>
                        @endforeach
                    </select>
                    <div class='search-box'>
                        <input type="submit" class="btn btn-secondary" value="検索">
                    </div>
                    @if(count($pets) == 0)
                        <p>登録ペットを選択してください。</p>
                    @endif
                </form>
            </div>
            @if($pet)
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
                            <th scope="col">　
                                @if ($animal != null)
                                    {{$animal->appropriateWeight}}
                                @endif
                                (kg)
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">日付</th>
                            <th scope="col">体重(kg)</th>
                            <th scope="col">差分(kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="appropriateWeight">
                            @foreach ($pet->weights as $weight)
                                                    <tr>
                                                        <th scope="row">　
                                                            {{$weight->date}}
                                                        </th>
                                                        <td>{{$weight->weight}}</td>
                                                        @php 
                                                                                            $weightDiffCssClass = '';
                                                            $weightDiffPrefix = '±';
                                                            $weightDiff = $weight->weight - $animal->appropriateWeight;
                                                            if ($weightDiff > 0) {
                                                                $weightDiffCssClass = 'much-weight';
                                                                $weightDiffPrefix = '+';
                                                            } else if ($weightDiff < 0) {
                                                                $weightDiffCssClass = 'few-weight';
                                                                $weightDiffPrefix = '';
                                                            }
                                                        @endphp
                                                        <td class="weight-diff {{$weightDiffCssClass}}">
                                                            {{$weightDiffPrefix . $weightDiff}}
                                                        </td>
                            @endforeach
                            </tr>
                        </div>
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
            @endunless
        </div>
    </div>
</div>
@endsection