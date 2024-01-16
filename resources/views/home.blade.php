@extends('layouts.main')
@section('content')

<h1>
    Welcome Back 
@if(session('type_user') == 'siswa')
    {{ session('nama_siswa') }}
@elseif(session('type_user') == 'guru')
    {{ session('nama_guru') }}
@elseif(session('type_user') == 'administrators')
    {{ session('id') }}
@endif
</h1>

@endsection
