@extends('layouts.main')

@push('css')
<style>
    .mapel-index{

        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="mapel-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Mapel</h2>
    <a href="{{ route('mapel.create') }}" class="btn btn--primary mb-2">Tambah Mapel</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mapel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $key => $mapel)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $mapel->nama_mapel }}</td>
                <td>
                    <a class="btn btn--warning" href="{{ route('mapel.edit', $mapel->id) }}">Ubah</a>
                    <form action="{{ route('mapel.destroy', $mapel->id) }}" method="post" class="d-inline">
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
