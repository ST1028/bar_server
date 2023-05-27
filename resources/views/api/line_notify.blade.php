注文です
📝ご注文内容
■{{$menu->name}} @if ($blend)({{$blend->name}})@endif

@if (isset($remarks) and $remarks)
    【備考】
    {{$remarks}}
@endif

@if ($menu->recipe)
    【作り方】
    {{$menu->recipe}}
@endif

【注文者】
@foreach ($friends as $friend)
    ・{{$friend->name}}
@endforeach
