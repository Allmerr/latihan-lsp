@extends('layouts.main')

@push('css')
<style>
    .menu-siswa-index{
        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="menu-siswa-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Menu</h2>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Mapel</th>
                <th>UH</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>NA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilais as $key => $nilai)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $nilai->mengajar->mapel->nama_mapel }}</td>
                <td>{{ $nilai->uh }}</td>
                <td>{{ $nilai->uts }}</td>
                <td>{{ $nilai->uas }}</td>
                <td>{{ $nilai->na }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
