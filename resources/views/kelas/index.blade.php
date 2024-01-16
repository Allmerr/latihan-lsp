@extends('layouts.main')

@push('css')
<style>
    .kelas-index{

        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="kelas-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Kelas</h2>
    <a href="{{ route('kelas.create') }}" class="btn btn--primary mb-2">Tambah Kelas</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Rombel</th>
                <th>Nama Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelases as $key => $kelas)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $kelas->kelas }}</td>
                <td>{{ $kelas->jurusan }}</td>
                <td>{{ $kelas->rombel }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>
                    <a class="btn btn--warning" href="{{ route('kelas.edit', $kelas->id) }}">Ubah</a>
                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="post" class="d-inline">
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
