@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Orders') }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">注文者</th>
                            <th scope="col">カテゴリー</th>
                            <th scope="col">メニュー</th>
                            <th scope="col">値段</th>
                            <th scope="col">削除</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">
                                    {{$order->id}}
                                </th>
                                <td>{{$order->friend->name}}</td>
                                <td>{{$order->menu->menuCategory->name}}</td>
                                <td>{{$order->menu->name}}</td>
                                <td>¥{{$order->menu->price}}</td>
                                <td>
                                    <button class="btn btn-danger deleteButton">
                                        <a
                                            href="javascript:void(0);" onclick="if (confirm('本当に削除しますか？')) location.href='{{route('order.delete', ['id' => $order->id])}}'; return false;"
                                            style="color: white;">削除する</a>
                                    </button>
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
