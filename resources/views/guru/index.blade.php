@extends('layouts.main')
@section('content')

<center>
    <h2 class="p2">Data Guru</h2>
    <a href="{{ route('guru.create') }}" class="btn btn--primary mb-2">Tambah Guru</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $key => $guru)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama_guru }}</td>
                <td>{{ $guru->jenis_kelamin ===  'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td>{{ $guru->alamat }}</td>
                <td>{{ $guru->password }}</td>
                <td>Aksi</td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</center>
@endsection