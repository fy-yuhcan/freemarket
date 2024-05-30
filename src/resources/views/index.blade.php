@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tab-menu">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">おすすめ</a>
        <a href="/?tab=mylist" class="{{ request()->is('mylist') ? 'active' : '' }}">マイリスト</a>
    </div>
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $items->links() }}
</div>
@endsection

