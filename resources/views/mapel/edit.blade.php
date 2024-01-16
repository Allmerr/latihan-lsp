@extends('layouts.main')

@push('css')
<style>
.form-mapel{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-mapel-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-mapel-container text-white">
    <div class="form-mapel rounded">
        <h2 class="mt2 text-center">Ubah Mapel</h2>
        <form action="{{ route('mapel.update',  $mapel->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_mapel" class="text-left">Nama Mapel</label>
                <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') error @enderror" value="{{ old('nama_mapel', $mapel->nama_mapel) }}">
            </div>
            <div class="d-flex justify-content-right">
                <button type="submit" class="btn btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
