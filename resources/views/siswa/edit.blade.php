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
        <h2 class="mt2 text-center">Ubah Siswa</h2>
        <form action="{{ route('siswa.update',  $siswa->nis) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nis" class="text-left">nis</label>
                <input type="text" name="nis" class="form-control @error('nis') error @enderror" value="{{ old('nis', $siswa->nis) }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="text-left">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') error @enderror" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
            </div>
            <div class="mb-3">
                <label for="jk" class="text-left">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control @error('jk') error @enderror" required>
                    <option value="L" @if(old('jk', $siswa->jk) == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if(old('jk', $siswa->jk) == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="text-left">alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control @error('alamat', $siswa->alamat) error @enderror" required>{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="kelas_id" class="text-left">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') error @enderror">
                    @foreach($kelases as $kelas)
                    <option value="{{ $kelas->id }}" @if(old('kelas_id', $kelas->id) == $siswa->kelas_id) selected @endif required>{{ $kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="text-left">password</label>
                <input type="password" name="password" class="form-control @error('password') error @enderror" value="{{ old('password') }}">
            </div>
            <div class="d-flex justify-content-right">
                <button type="submit" class="btn btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
