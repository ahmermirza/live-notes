@extends('layouts.app')

@push('title')
    Complete Post | Live Notes
@endpush

@section('content')
    <div class="container p-5 pt-4 text-center">
        <x-post :post="$post" />
    </div>
@endsection
