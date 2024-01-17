@extends('layouts.main')

@push('css')
<style>
.form-guru{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-guru-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-guru-container text-white">
    <div class="form-guru rounded">
        <h2 class="mt2 text-center">Create Guru</h2>
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="nip" class="text-left">NIP</label>
                <input type="text" name="nip" class="form-control @error('nip') error @enderror" value="{{ old('nip', $guru->nip) }}">
            </div>
            <div class="mb-3">
                <label for="nama_guru" class="text-left">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control @error('nama_guru') error @enderror" value="{{ old('nama_guru', $guru->nama_guru) }}">
            </div>
            <div class="mb-3">
                <label for="jk" class="text-left">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control @error('jk') error @enderror">
                    <option value="L" @if(old('jk', $guru->jk) == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if(old('jk', $guru->jk) == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="text-left">alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') error @enderror" value="{{ old('alamat', $guru->alamat) }}">
            </div>
        </form>
    </div>
</div>

@endsection
