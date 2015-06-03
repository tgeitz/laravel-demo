<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tom's Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" />
</head>

<body>

    <div class="container">
        @include('partials.flash')
        @include('partials.navigationbar')

        @yield('content')
    </div>

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
        @yield('footer')
</body>
</html>