<!DOCTYPE html>
<html lang="en">

<head>
    @include('blog.layouts.head')
</head>

<body>
    @include('blog.layouts.header')
    @include('blog.layouts.sidebar')
    @yield('main')
    @include('blog.layouts.footer')
</body>

</html>
