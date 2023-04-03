@extends('layouts.app')

@push('title')
    User Profile | Live Notes
@endpush

@section('content')
    <div class="container p-5 pt-4 text-center">
        <h1>{{ $user->name }}</h1> posted {{ $user->posts()->count() }} {{ Str::plural('post', $user->posts()->count()) }} and received {{ $user->receivedLikes()->count() }} likes
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Posted</th>
                        <th scope="col">Profile Pic</th>
                        <th scope="col">Posts</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-post :post="$post"/>
                        @endforeach
                    @else
                        <p>{{ $user->name }} has no posts.</p>
                    @endif
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
