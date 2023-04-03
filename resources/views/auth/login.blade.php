@extends('layouts.app')

@push('title')
    Login | Live Notes
@endpush

@section('content')
    <div class="pt-5 d-flex justify-content-center w-100">

        <form action="{{ route('login') }}" method="POST" class="p-5 bg-success rounded-3">
            <center>
                <h3>Login</h3>
            </center>
            @csrf
            <div class="form-group pb-2">
                <input type="email" name="email" class="form-control @error('email') border border-danger @enderror"
                    id="email" placeholder="Enter email here" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>

            <div class="form-group pb-1">
                <input type="password" name="password" class="form-control @error('password') border border-danger @enderror"
                    id="password" placeholder="Enter password here">
                @error('password')
                    <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>

            @if (session('status'))
                <p class="text-danger">{{ session('status') }}</p>
            @endif

            <div class="form-check pb-2">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="form-control btn btn-primary">Login</button>
        </form>

    </div>
@endsection
