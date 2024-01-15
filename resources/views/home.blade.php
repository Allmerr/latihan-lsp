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

    .login-navs__item{
        list-style-type: none;
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

    .login-page{
        background: #02a8a02d;
        height: 100%;
    }

    .text-center{
        text-align: center;
    }

    .rounded{
        border-radius: 0.375rem;
    }
</style>
@endpush

@section('content')
    <div class="row d-grid d-grid--gtc46">
        <div class="d-grid__col-4 p3 login-page">
            <div class="rounded border-black">
                <div class="login-navs">
                    <h3 class="text-center p2">Silahkan Pilih Role yang Diinginkan</h3>
                    <ul class="d-flex border-black">
                        <li class="login-navs__item">
                            <a href="" >Siswa</a>    
                        </li>    
                        <li class="login-navs__item">
                            <a href="" >Guru</a>
                        </li>
                        <li class="login-navs__item">
                            <a href="" >Admin</a>    
                        </li>
                    </ul>    
                </div>
                <div class="login-body border-black">
                    <form action="">
                        <h2>Login Admin</h2>
                        <input type="text">    
                    </form>    
                </div>
                <div class="login-gallery border-black">
                    <img src="{{ asset('images/login-gallery.jpeg') }}" alt="" class="width-100">    
                </div>                    
                <div class="login-footer">
                    <h2>SMK BISA</h2>
                </div>
            </div>
        </div>
        <div class="d-flex__col-6">
            
        </div>       
    </div>
@endsection