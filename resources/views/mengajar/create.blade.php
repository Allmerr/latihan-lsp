@extends('layouts.main')

@push('css')
<style>
.form-mengajar{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-mengajar-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-mengajar-container text-white">
    <div class="form-mengajar rounded">
        <h2 class="mt2 text-center">Create Mengajar</h2>
        <form action="{{ route('mengajar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="guru_id" class="text-left">Guru</label>
                <select name="guru_id" id="guru_id" class="form-control @error('guru_id') error @enderror">
                    @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}" @if(old('guru_id') == $guru->id) selected @endif required>{{ $guru->nama_guru}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="mapel_id" class="text-left">Mapel</label>
                <select name="mapel_id" id="mapel_id" class="form-control @error('mapel_id') error @enderror">
                    @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}" @if(old('mapel_id') == $mapel->id) selected @endif required>{{ $mapel->nama_mapel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas_id" class="text-left">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') error @enderror">
                    @foreach($kelases as $kelas)
                    <option value="{{ $kelas->id }}" @if(old('kelas_id') == $kelas->id) selected @endif required>{{ $kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-right">
                <button type="submit" class="btn btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
