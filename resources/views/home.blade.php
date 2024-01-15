@extends('layouts.main')

@push('css')
<style>
    .d-grid{
        display: grid;
    }

    .d-grid--gtc46{
        grid-template-columns: 4fr 6fr;
    }

    .d-flex{
        display: flex;
    }

    .justify-content-right{
        justify-content: right;
    }

    .align-items-center{
        align-items: center;
    }

    .border-black{
        border: solid 1px rgba(128, 128, 128, 0.418);
    }

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

    .width-100{
        width: 100%;
    }

    .p3{
        padding: 30px;
    }

    .p2{
        padding: 20px;
    }

    .p1{
        padding: 10px;
    }

    .login-page{
        background: rgb(255,255,255);
        background: linear-gradient(180deg, rgba(255,255,255,1) 56%, rgba(2,168,160,1) 100%);
        height: 100%;
    }

    .text-center{
        text-align: center;
    }

    .rounded{
        border-radius: 0.375rem;
    }

    .login-navs__item-content{
        color: white;
        text-decoration: none;
    }

    .img-thumbnail {
        padding: 0.25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        max-width: 100%;
        height: auto;
    }

    .bg-white{
        background: #fff;
    }

    .m1{
        margin: 10px;
    }

    .hello-page{
        color: white;
    }

    .form-control{
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .form-login{
        padding: 10px;
    }

    .mb-2{
        margin-bottom: 20px;
    }

    .mb-3{
        margin-bottom: 20px;
    }

    .btn{
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        border-radius: 0.375rem;
    }

    .btn--primary{
        color: white;
        background: #02A8A0;
    }

    .d-none{
        display: none;
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
                        <form action="" class="form-login">
                            <h2 class="text-center mb-2">Login Siswa</h2>
                            <div class="mb-3">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="passwprd">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-guru d-none">
                        <form action="" class="form-login">
                            <h2 class="text-center mb-2">Login Guru</h2>
                            <div class="mb-3">
                                <label for="id">NIP</label>
                                <input type="text" name="nip" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="login-admin d-none">
                        <form action="" class="form-login">
                            <h2 class="text-center mb-2">Login Admin</h2>
                            <div class="mb-3">
                                <label for="id">ID Admin</label>
                                <input type="text" name="id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="d-flex justify-content-right">
                                <button class="btn btn--primary">Login</button>
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
