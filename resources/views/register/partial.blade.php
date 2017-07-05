<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} IT Ladkrabang Open House 2017</title>

    @include('layout.js')

    @include('layout.css')
</head>

<body>
@include('register.nav')

@yield('content')

@include('layout.sponsor')

@include('layout.footer')

</body>

</html>