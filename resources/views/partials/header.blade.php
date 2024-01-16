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
