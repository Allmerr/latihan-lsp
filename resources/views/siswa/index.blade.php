@extends('layouts.main')

@push('css')
<style>
    .siswa-index{

        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="siswa-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Siswa</h2>
    <a href="{{ route('siswa.create') }}" class="btn btn--primary mb-2">Tambah Siswa</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $key => $siswa)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_siswa }}</td>
                <td>
                    <a class="btn btn--success" href="{{ route('siswa.show', $siswa->nis) }}">Detail</a>
                    <a class="btn btn--warning" href="{{ route('siswa.edit', $siswa->nis) }}">Ubah</a>
                    <form action="{{ route('siswa.destroy', $siswa->nis) }}" method="post" class="d-inline">
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
