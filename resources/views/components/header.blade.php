<header class="site-header">
    <div class="wrap">
        <a class="site-name" href="{{ route('home') }}">Новости колледжа</a>
        <nav aria-label="Разделы сайта">
            <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Главная</a>
            <a href="{{ route('category') }}" @if(request()->routeIs('category')) aria-current="page" @endif>Категория</a>
            <a href="{{ route('journalist') }}" @if(request()->routeIs('journalist') || request()->routeIs('journalist.*')) aria-current="page" @endif>Журналист</a>
            <a href="{{ route('admin') }}" @if(request()->routeIs('admin') || request()->routeIs('admin.*')) aria-current="page" @endif>Админ</a>
        </nav>
    </div>
</header>
