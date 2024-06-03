@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品の出品</h1>
    <form action="{{ route('sell.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_image">商品画像</label>
            <input type="file" name="product_image" class="form-control-file">
            @error('product_image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">カテゴリー</label>
            <select name="category_id" class="form-control">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="condition">商品の状態</label>
            <select name="condition" class="form-control">
                <option value="">選択してください</option>
                <option value="新品">新品</option>
                <option value="中古（良好）">中古（良好）</option>
                <option value="中古（可）">中古（可）</option>
            </select>
            @error('condition')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">商品の説明</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">販売価格</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">出品する</button>
    </form>
</div>
@endsection
