@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    カテゴリー
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">名前</th>
                            <th scope="col">ステータス</th>
                            <th scope="col">変更</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($menuCategories as $menuCategory)
                            <tr>
                                <th scope="row">
                                    {{$menuCategory->id}}
                                </th>
                                <td>{{$menuCategory->name}}</td>
                                <td>
                                    @if ($menuCategory->is_active)
                                        <label class="btn btn-primary">公開中</label>
                                    @else
                                        <label class="btn btn-secondary">非公開中</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('menuCategory.status.switch', ['id' => $menu->id])}}">
                                        @if ($menuCategory->is_active)
                                            非公開に変更する
                                        @else
                                            公開に変更する
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
