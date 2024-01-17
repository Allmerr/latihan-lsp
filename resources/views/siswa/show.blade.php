@extends('layouts.main')

@push('css')
<style>
.form-siswa{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-siswa-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-siswa-container text-white">
    <div class="form-siswa rounded">
        <h2 class="mt2 text-center">Create Siswa</h2>
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="nis" class="text-left">nis</label>
                <input type="text" name="nis" class="form-control @error('nis') error @enderror" value="{{ old('nis', $siswa->nis) }}">
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="text-left">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') error @enderror" value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
            </div>
            <div class="mb-3">
                <label for="jk" class="text-left">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control @error('jk') error @enderror">
                    <option value="L" @if(old('jk', $siswa->jk) == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if(old('jk', $siswa->jk) == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="text-left">alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') error @enderror" value="{{ old('alamat', $siswa->alamat) }}">
            </div>
            <div class="mb-3">
                <label for="kelas_id" class="text-left">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') error @enderror">
                    @foreach($kelases as $kelas)
                    <option value="{{ $kelas->id }}" @if(old('kelas_id', $kelas->id) == $siswa->id) selected @endif required>{{ $kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

@endsection
