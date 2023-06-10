@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('menu.create')}}" class="btn btn-primary">追加</a>
            <div class="card">
                <div class="card-header">{{ __('Menus') }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">カテゴリー</th>
                            <th scope="col">名前</th>
                            <th scope="col">値段</th>
                            <th scope="col">ステータス</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <th scope="row">
                                    {{$menu->id}}
                                </th>
                                <td>{{$menu->menuCategory->name}}</td>
                                <td>
                                    <a href="{{route('menu.show', ['id' => $menu->id])}}">{{$menu->name}}</a>
                                </td>
                                <td>¥{{$menu->price}}</td>
                                <td>
                                    @if ($menu->is_active)
                                        <label class="btn btn-primary">公開</label>
                                    @else
                                        <label class="btn btn-secondary">非公開</label>
                                    @endif
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
