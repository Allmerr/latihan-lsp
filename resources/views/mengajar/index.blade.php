@extends('layouts.main')

@push('css')
<style>
    .mengajar-index{
        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="mengajar-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Mengajar</h2>
    <a href="{{ route('mengajar.create') }}" class="btn btn--primary mb-2">Tambah Mengajar</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Nama Mapel</th>
                <th>Nama Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mengajars as $key => $mengajar)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $mengajar->guru->nama_guru }}</td>
                <td>{{ $mengajar->mapel->nama_mapel }}</td>
                <td>{{ $mengajar->kelas->nama_kelas }}</td>
                <td>
                    <a class="btn btn--warning" href="{{ route('mengajar.edit', $mengajar->id) }}">Ubah</a>
                    <form action="{{ route('mengajar.destroy', $mengajar->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn--danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
