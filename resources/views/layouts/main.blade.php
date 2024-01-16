<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    @stack('css')
    <title>Penilaian Siswa</title>
</head>
<body>
    <div class="root">
        @include('partials.header')
        <div class="content">
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
@stack('js')

@foreach($errors->all() as $error)
    <script>
        const error = '{{ $error }}'
        alert(error)
    </script>
@endforeach

@if (session()->has('failed'))

    <script>
        const failed = '{{ session("failed") }}'
        alert(failed)
    </script>

    
@endif

</body>
</html>
