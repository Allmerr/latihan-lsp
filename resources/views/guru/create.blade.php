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
        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nip" class="text-left">NIP</label>
                <input type="text" name="nip" class="form-control @error('nip') error @enderror" value="{{ old('nip') }}"> 
            </div>
            <div class="mb-3">
                <label for="nama_guru" class="text-left">Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control @error('nama_guru') error @enderror" value="{{ old('nama_guru') }}">
            </div>
            <div class="mb-3">
                <label for="jk" class="text-left">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control @error('jk') error @enderror">
                    <option value="L" @if(old('jk') == 'L') checked @endif>Laki-Laki</option>    
                    <option value="P" @if(old('jk') == 'P') checked @endif>Perempuan</option>    
                </select> 
            </div>
            <div class="mb-3">
                <label for="alamat" class="text-left">alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') error @enderror" value="{{ old('alamat') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="text-left">password</label>
                <input type="password" name="password" class="form-control @error('password') error @enderror"> 
            </div>
            <div class="d-flex justify-content-right">
                <button type="submit" class="btn btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection