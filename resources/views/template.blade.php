<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    body {
        background-color: #ececec;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(https://wallpaperplay.com/walls/full/7/2/9/20920.jpg);
        background-attachment: fixed;
    }

    img {
        width: 100%;
        height: auto;
    }
</style>

<body class="container">
    <br>
    <nav style="display:flex;
                align-items:center;
                justify-content:space-between;
    ">
        <div style="text-align:left; display:inline-block">
            <a href=" {{ route('home') }}"><button type="button" class="btn btn-info">Home</button></a>
        </div>
        <div style="text-align:right; display:inline-block">
            @if(Illuminate\Support\Facades\Auth::check())
            <a href="{{ route('admin.posts.index') }}"><button type="button" class="btn btn-info">Admin</button></a>
            <a href="{{ route('auth.logout') }}"><button type="button" class="btn btn-danger">Logout</button></a>
            @else
            <a href="{{ route('auth.login') }}"><button type="button" class="btn btn-success">Login</button></a>
            @endif
        </div>
    </nav>
    @yield('content')
</body>

</html>
