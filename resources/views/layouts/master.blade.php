<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('partials.style')
    </head>

    <body>
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
        @include('partials.script')
        @yield('script')
    </body>
</html>
