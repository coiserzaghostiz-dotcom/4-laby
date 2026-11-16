<x-page title="Вход">
    <x-header />

    <main class="wrap">
        <h1>Вход</h1>
        <x-messages />

        <form class="box stack" action="{{ route('login') }}" method="post">
            @csrf
            <label for="login">Логин</label>
            <input id="login" name="login" value="{{ is_string(old('login')) ? old('login') : '' }}" autocomplete="username" required>

            <label for="password">Пароль</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button type="submit">Войти</button>
        </form>

        <a href="{{ route('register') }}">Зарегистрироваться</a>
    </main>

    <x-footer />
</x-page>
