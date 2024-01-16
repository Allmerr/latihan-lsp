@extends('layouts.main')

@push('css')
<style>
    .login-navs__list{
        width: 100%;
        gap: 5px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-navs__item{
        list-style-type: none;
        padding: 10px;
        background: #02A8A0;
        border-radius: 15px;
    }

    .login-page{
        background: rgb(255,255,255);
        background: linear-gradient(180deg, rgba(255,255,255,1) 56%, rgba(2,168,160,1) 100%);
        height: 100%;
    }

    .login-navs__item-content{
        color: white;
        text-decoration: none;
    }

    .hello-page{
        color: white;
    }
    
    .form-login{
        padding: 10px;
    }

    
</style>
@endpush

@section('content')
    <div class="row d-grid d-grid--gtc46">
        <div class="d-grid__col-4 p3 login-page">
            <div class="rounded border-black">
                <div class="login-navs">
                    <h3 class="text-center p2">Silahkan Pilih Role yang Diinginkan</h3>
                    <hr>
                    <ul class="d-flex login-navs__list">
                        <li class="login-navs__item">
                            <a href="" class="login-navs__item-content login-navs__item-content--click-siswa" >Siswa</a>
                        </li>
                        <li class="login-navs__item">
                            <a href="" class="login-navs__item-content login-navs__item-content--click-guru" >Guru</a>
                        </li>
                        <li class="login-navs__item">
                            <a href="" class="login-navs__item-content login-navs__item-content--click-admin" >Admin</a>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="login-body">
                    <div class="login-siswa">
                        <form action="{{ route('login') }}" class="form-login" method="POST">
                            @csrf
                            <h2 class="text-center mb-2">Login Siswa</h2>
                            <input type="hidden" name="type_user" value="siswa">
                            <div class="mb-3">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control @error('nis') error @enderror" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwprd">Password</label>
                                <input type="password" name="password" class="form-control @error('password') error @enderror" required>
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-guru d-none">
                        <form action="{{ route('login') }}" class="form-login" method="POST">
                            @csrf
                            <h2 class="text-center mb-2">Login Guru</h2>
                            <input type="hidden" name="type_user" value="guru">
                            <div class="mb-3">
                                <label for="id">NIP</label>
                                <input type="text" name="nip" class="form-control @error('nip') error @enderror" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control @error('password') error @enderror" required>
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-admin d-none">
                        <form action="{{ route('login') }}" class="form-login" method="POST">
                            @csrf
                            <h2 class="text-center mb-2">Login Admin</h2>
                            <input type="hidden" name="type_user" value="administrator">
                            <div class="mb-3">
                                <label for="id_admin">ID Admin</label>
                                <input type="text" name="id_admin" class="form-control @error('id_admin') error @enderror" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control @error('password') error @enderror" required>
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="login-gallery p1 ">
                    <h3 class="p1">Gallery</h3>
                    <img src="{{ asset('images/login-gallery.jpeg') }}" alt="" class="width-100 img-thumbnail">
                </div>
                <div class="login-footer text-center bg-white m1 rounded">
                    <h2 class="p1">SMK BISA</h2>
                </div>
            </div>
        </div>
        <div class="d-flex__col-6 p2 hello-page">
            <h1 class="text-center">Selamat Datang  di website penilaian siswa SMKN 1 Cibinong</h1>
        </div>
    </div>
@push('js')
<script>
    uPreventLoginNavs = function(){
        allNavsItems = document.querySelectorAll('.login-body > *');
        allNavsItems.forEach(function(e){
            e.classList.add('d-none')
        })
    }

    document.querySelector('.login-navs__item-content--click-siswa').addEventListener('click', function(e){
        e.preventDefault();
        uPreventLoginNavs()
        document.querySelector('.login-siswa').classList.toggle('d-none');
    })

    document.querySelector('.login-navs__item-content--click-guru').addEventListener('click', function(e){
        e.preventDefault();
        uPreventLoginNavs();
        document.querySelector('.login-guru').classList.toggle('d-none');
    })

    document.querySelector('.login-navs__item-content--click-admin').addEventListener('click', function(e){
        e.preventDefault();
        uPreventLoginNavs();
        document.querySelector('.login-admin').classList.toggle('d-none');
    })
</script>
@endpush
@endsection
