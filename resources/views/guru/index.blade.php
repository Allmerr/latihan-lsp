@extends('layouts.main')

@push('css')
<style>
    .guru-index{

        overflow: scroll;
    }
</style>
@endpush

@section('content')
<div class="guru-index p2 d-flex justify-content-center d-flex--column">
    <h2 class="text-center">Data Guru</h2>
    <a href="{{ route('guru.create') }}" class="btn btn--primary mb-2">Tambah Guru</a>
    <table class="text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $key => $guru)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama_guru }}</td>
                <td>
                    <a class="btn btn--success" href="{{ route('guru.show', $guru->nip) }}">Detail</a>
                    <a class="btn btn--warning" href="{{ route('guru.edit', $guru->nip) }}">Ubah</a>
                    <form action="{{ route('guru.destroy', $guru->nip) }}" method="post" class="d-inline">
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
