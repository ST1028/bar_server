@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Menus') }}<button type="button" class="btn btn-primary"><a href="{{route('menu.create')}}">追加</a></button>
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
                                <td>{{$menu->price}}</td>
                                <td>{{$menu->is_active ? '公開': '非公開'}}</td>
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
