@extends('layouts.app')

@push('title')
    Register | Live Notes
@endpush

@section('content')

<div class="jumbotron d-flex justify-content-center">

    <form action="{{ route('register') }}" method="POST">
        <center>
            <h3>Register</h3>
        </center>
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" id="name" placeholder="Enter full name here" value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="text" name="username" class="form-control @error('username') border border-danger @enderror" id="username" placeholder="Enter username here" value="{{ old('username') }}">
            @error('username') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') border border-danger @enderror" id="email" placeholder="Enter email here" value="{{ old('email') }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" id="password" placeholder="Enter password here">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror" id="password_confirmation" placeholder="Enter password again">
            @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit" class="form-control btn btn-primary">Sign Up</button>
    </form>

</div>

@endsection