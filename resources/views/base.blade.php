<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    @extends('layouts.head')
</head>
<body>
    @include('layouts.navbar')
    @yield('main')
</body>
</html>
