<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
                </li>
                @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.post.index') }}">Admin</a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
    @yield('content')
</div>

</body>
</html>
