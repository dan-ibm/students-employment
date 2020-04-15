<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    @extends('layouts.head')
</head>
<body>
    @include('layouts.navbar')
    <div class="baseClass" style="margin-top: 5%;">
    @yield('main')
    </div>

        @include('layouts.footer')


</body>
</html>
