<header class="site-header">
    <div class="wrap">
        <a class="site-name" href="{{ route('home') }}">Новости колледжа</a>

        <nav aria-label="Разделы сайта">
            <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Главная</a>
            <a href="{{ route('category') }}" @if(request()->routeIs('category')) aria-current="page" @endif>Категория</a>
            @auth
                @php($role = auth()->user()->role)
                @if (in_array($role->name, ['journalist', 'admin'], true))
                    <a href="{{ route('journalist') }}" @if(request()->routeIs('journalist', 'journalist.*')) aria-current="page" @endif>Журналист</a>
                @endif
                @if ($role->name === 'admin')
                    <a href="{{ route('admin') }}" @if(request()->routeIs('admin', 'admin.*')) aria-current="page" @endif>Админ</a>
                @endif
            @endauth
        </nav>

        <div class="account">
            @auth
                <span>{{ auth()->user()->login }} · {{ $role->label() }}</span>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
</header>
