@extends('layouts.main')

@push('css')
<style>
.form-kelas{
    min-width: 50vw;
    border: solid 1px white;
    padding: 10px;
}

.form-kelas-container{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endpush

@section('content')
<div class="m2 form-kelas-container text-white">
    <div class="form-kelas rounded">
        <h2 class="mt2 text-center">Create Kelas</h2>
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kelas" class="text-left">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="10" @if(old('kelas') === '10') selected @endif>10</option>
                    <option value="11" @if(old('kelas') === '11') selected @endif>11</option>
                    <option value="12" @if(old('kelas') === '12') selected @endif>12</option>
                    <option value="13" @if(old('kelas') === '13') selected @endif>13</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="text-left">jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="DKV" @if(old('jurusan') === 'DKV') selected @endif>DKV</option>
                    <option value="BKP" @if(old('jurusan') === 'BKP') selected @endif>BKP</option>
                    <option value="DPIB" @if(old('jurusan') === 'DPIB') selected @endif>DPIB</option>
                    <option value="RPL" @if(old('jurusan') === 'RPL') selected @endif>RPL</option>
                    <option value="SIJA" @if(old('jurusan') === 'SIJA') selected @endif>SIJA</option>
                    <option value="TKJ" @if(old('jurusan') === 'TKJ') selected @endif>TKJ</option>
                    <option value="TP" @if(old('jurusan') === 'TP') selected @endif>TP</option>
                    <option value="TOI" @if(old('jurusan') === 'TOI') selected @endif>TOI</option>
                    <option value="TKR" @if(old('jurusan') === 'TKR') selected @endif>TKR</option>
                    <option value="TFLM" @if(old('jurusan') === 'TFLM') selected @endif>TFLM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rombel" class="text-left">rombel</label>
                <select name="rombel" id="rombel" class="form-control">
                    <option value="1" @if(old('rombel') === '1') selected @endif>1</option>
                    <option value="2" @if(old('rombel') === '2') selected @endif>2</option>
                    <option value="3" @if(old('rombel') === '3') selected @endif>3</option>
                    <option value="4" @if(old('rombel') === '4') selected @endif>4</option>
                </select>
            </div>
            <div class="d-flex justify-content-right">
                <button type="submit" class="btn btn--primary">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
