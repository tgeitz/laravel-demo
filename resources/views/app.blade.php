<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tom's Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>

    <div class="container">
        @include('partials.flash')

        @yield('content')
    </div>

    <div class="container">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>

        @yield('footer')

    </div>
</body>
</html>