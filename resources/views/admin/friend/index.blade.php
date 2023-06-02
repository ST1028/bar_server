@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form id="form" method="post" action="{{route('friend.all.disabled')}}">
                    @csrf
                    <button type="button" id="submitButton" class="btn btn-primary">次の部に変更</button>
                </form>
                <div class="card">
                    <div class="card-header">{{ __('Friends') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">名前</th>
                                <th scope="col">注文した値段</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($friends as $friend)
                                <tr>
                                    <th scope="row">
                                        {{$friend->id}}
                                    </th>
                                    <td>{{$friend->name}}</td>
                                    <td>¥{{$friend->orders->sum('price')}}</td>
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
    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            if(confirm('本当に変更しますか？')) {
                document.getElementById('form').submit();
            }
        });
    </script>
@endsection
