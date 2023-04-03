<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .table tbody tr th,
        .table tbody tr td {
            padding-top: 10px !important;
            padding-bottom: 15px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/posts-page.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand font-weight-bold text-primary ps-5 pe-3" href="{{ route('home') }}">Live Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white font-weight-bold p-2" href="/">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold p-2" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold p-2" href="{{ route('posts') }}">Posts</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link text-white font-weight-bold p-3" href="{{ route('dashboard') }}"><i class="fa fa-twitter fs-4 text-primary"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link text-white font-weight-bold p-3 pe-5 text-uppercase" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item font-weight-bold pe-5">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold p-3 pe-1" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold p-3 pe-5"
                            href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tweet Box</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('posts') }}" method="POST">
        <div class="modal-body">
                @csrf
                <div class="form-group">
                    <textarea name="status" class="form-control @error('status') border border-danger @enderror border-0 shadow-none" id="status"
                        rows="3" placeholder="What's on your mind?" style="resize: none;"></textarea>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                {{-- <div class="form-group pt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Post</button>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tweet</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@yield('content')
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>
