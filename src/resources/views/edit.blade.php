@extends('layouts.app')

@section('content')
<div class="container">
    <h1>プロフィール設定</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="profile_image">プロフィール画像</label>
            <input type="file" name="profile_image" class="form-control-file">
            @if($user->profile && $user->profile->profile_image)
                <img src="{{ Storage::url($user->profile->profile_image) }}" alt="プロフィール画像" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="postal_code">郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', optional($user->address)->postal_code) }}" class="form-control">
            @error('postal_code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" name="address" value="{{ old('address', optional($user->address)->address) }}" class="form-control">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" name="building" value="{{ old('building', optional($user->address)->building) }}" class="form-control">
            @error('building')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
@endsection



