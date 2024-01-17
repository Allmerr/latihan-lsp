@extends('layouts.main')

@push('css')
<style>
.form-kelas-show{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-kelas-show-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-kelas-show-container text-white">
    <div class="form-kelas-show rounded">
        <h2 class="mt2 text-center">Create Nilai</h2>
        <form action="{{ route('nilai.kelas_store', $mengajar->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="siswa_id" class="text-left">Siswa</label>
                <input type="text" name="siswa_id" class="form-control @error('siswa_id') error @enderror" value="{{  $nilai->siswa->nama_siswa }}" readonly>
            </div>
            <div class="mb-3">
                <label for="uh" class="text-left">UH</label>
                <input type="number" name="uh" class="form-control @error('uh') error @enderror" value="{{ old('uh', $nilai->uh) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="uts" class="text-left">UTS</label>
                <input type="number" name="uts" class="form-control @error('uts') error @enderror" value="{{ old('uts', $nilai->uts) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="uas" class="text-left">UAS</label>
                <input type="number" name="uas" class="form-control @error('uas') error @enderror" value="{{ old('uas', $nilai->uas) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="na" class="text-left">NA</label>
                <input type="number" name="na" class="form-control @error('na') error @enderror" value="{{ old('na', $nilai->na) }}" readonly>
            </div>
        </form>
    </div>
</div>

@endsection
