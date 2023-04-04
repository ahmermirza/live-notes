@extends('layouts.app')

@push('custom-styling')
    <style>
        .table tbody tr th,
        .table tbody tr td {
            padding-top: 10px !important;
            padding-bottom: 15px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/posts-page.css') }}">
@endpush

@section('title', 'Posts | Live Notes')

@section('content')
    <div class="p-5 pt-1 text-center">
        <div class="event-schedule-area-two bg-color pad100">
            <div class="container p-5 pt-4 text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <div class="title-text">
                                <h4>What's Hot <i class="fa fa-fire text-danger"></i></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.col end-->
                </div>
                <!-- row end-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel">
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
                                                    <x-post :post="$post" />
                                                @endforeach
                                            @else
                                                <p>There are no posts.</p>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col end-->
                </div>
                <!-- /row end-->
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementsByClassName("pagination");
        x[0].className = "pagination d-flex justify-content-end"
    </script>
@endsection