@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-primary" role="alert">
                {{session('message')}}
            </div>
            @endif

            <div class="card">
                <form method="post" action="{{isset($menu) ? route('menu.update', ['id' => $menu->id]) : route('menu.store')}}">
                    @csrf
                    <div class="card-header">{{ __('Menu') }}</div>
                    <?php /** @var \App\Models\Menu $menu */?>
                    <div class="card-body">
                        @if (! empty($menu))
                            <div class="mb-3 row">
                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="id" value="{{$menu->id ?? null}}">
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="category" class="col-sm-2 col-form-label">カテゴリー</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="menu_category_id" aria-label="Default select example">
                                    <option>--選択してください--</option>
                                    @foreach ($menuCategories as $menuCategory)
                                        <option @if (isset($menu->menuCategory->id) && $menu->menuCategory->id == $menuCategory->id) selected @endif value="{{$menuCategory->id}}">
                                            {{$menuCategory->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="category" class="col-sm-2 col-form-label">割り方</label>
                            <div class="col-sm-10">
                                @foreach ($blends as $blend)
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            name="blends[]"
                                            type="checkbox"
                                            id="inlineCheckbox{{$blend->id}}"
                                            value="{{$blend->id}}"
                                            @if (isset($menu->blends) && $menu->blends->where('id', $blend->id)->first())
                                            checked
                                            @endif
                                        >
                                        <label class="form-check-label" for="inlineCheckbox{{$blend->id}}">{{$blend->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">名前</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $menu->name ?? null)}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">値段</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" value="{{old('price', $menu->price ?? null)}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="recipe" class="col-sm-2 col-form-label">レシピ</label>
                            <div class="col-sm-10">
                                <textarea id="recipe" name="recipe" class="form-control">{{ old('recipe', $menu->recipe ?? null) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">詳細</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" value="{{old('description', $menu->description ?? null)}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">ステータス</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_active1" value="1"
                                        @if (!empty($menu->is_active)) checked @endif
                                    >
                                    <label class="form-check-label" for="is_active1">公開</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_active2" value="0"
                                       @if (empty($menu->is_active)) checked @endif
                                    >
                                    <label class="form-check-label" for="is_active2">非公開</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">備考の必須</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_remarks_required" id="is_remarks_required1" value="1"
                                           @if (! empty($menu->is_remarks_required)) checked @endif
                                    >
                                    <label class="form-check-label" for="is_remarks_required1">必須</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_remarks_required" id="is_remarks_required2" value="0"
                                           @if (empty($menu->is_remarks_required)) checked @endif
                                    >
                                    <label class="form-check-label" for="is_remarks_required2">任意</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
