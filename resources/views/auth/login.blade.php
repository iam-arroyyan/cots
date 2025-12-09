@extends('layouts.app')
@section('content')
<div class="card w-50 mx-auto">
    <div class="card-header">Login</div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username (admin/user)</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password (admin123/user123)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection