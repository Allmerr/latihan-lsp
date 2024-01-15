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
                            <a href="" class="login-navs__item-content" >Siswa</a>    
                        </li>    
                        <li class="login-navs__item">
                            <a href="" class="login-navs__item-content" >Guru</a>
                        </li>
                        <li class="login-navs__item">
                            <a href="" class="login-navs__item-content" >Admin</a>    
                        </li>
                    </ul>    
                </div>
                <hr>
                <div class="login-body">
                    <form action="">
                        <h2>Login Admin</h2>
                        <input type="text">    
                    </form>    
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
@endsection