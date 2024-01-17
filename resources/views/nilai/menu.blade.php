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
    <h2 class="text-center">Data Menu Kelas</h2>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Nama Mapel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mengajars as $key => $mengajar)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $mengajar->kelas->nama_kelas }}</td>
                <td>{{ $mengajar->mapel ->nama_mapel  }}</td>
                <td>
                    <a class="btn btn--warning" href="{{ route('nilai.kelas_index', $mengajar->id) }}">Nilai</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
