<header class="header">
    <div class="row">
        <img src="{{ asset('images/header.jpeg') }}" alt="" class="header__image">
    </div>
    <div class="row">
        <ul class="header__list">
            <li class="header__list-item">
                <a href="{{ route('welcome') }}" class="header__list-content">Home</a>
            </li>
            @if(session('id'))
                @if(session('type_user') == 'administrator')
                <li class="header__list-item">
                    <a href="{{ route('guru.index') }}" class="header__list-content">Guru</a>
                </li>
                <li class="header__list-item">
                    <a href="" class="header__list-content">Kelas</a>
                </li>
                <li class="header__list-item">
                    <a href="" class="header__list-content">Siswa</a>
                </li>
                <li class="header__list-item">
                    <a href="{{ route('mapel.index') }}" class="header__list-content">Mapel</a>
                </li>
                <li class="header__list-item">
                    <a href="" class="header__list-content">Mengajar</a>
                </li>
                @else
                <li class="header__list-item">
                    <a href="" class="header__list-content">Mengajar</a>
                </li>
                @endif
                <li class="header__list-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="header__list-content" type="submit">Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</header>
