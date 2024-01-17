@extends('layouts.main')

@push('css')
<style>
    .menu-kelas-index{
        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="menu-kelas-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Menu Kelas '{{ $kelas->nama_kelas }}' Mata Pelajaran '{{ $mengajar->mapel->nama_mapel }}'</h2>
    <a href="{{ route('nilai.kelas_create', $mengajar->id) }}" class="btn btn--primary mb-2">Tambah Nilai</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilais as $key => $nilai)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $nilai->siswa->nama_siswa }}</td>
                <td>
                    <a class="btn btn--warning" href="{{ route('nilai.kelas_show', ['mengajar' => $mengajar->id, 'nilai' => $nilai->id]) }}">Detail</a>
                    <a class="btn btn--warning" href="{{ route('nilai.kelas_edit', ['mengajar' => $mengajar->id, 'nilai' => $nilai->id]) }}">Ubah</a>
                    <a class="btn btn--warning" href="{{ route('nilai.kelas_destroy', ['mengajar' => $mengajar->id, 'nilai' => $nilai->id]) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
