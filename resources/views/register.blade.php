<x-page title="Регистрация">
    <x-header />

    <main class="wrap">
        <h1>Регистрация</h1>
        <x-messages />

        <form class="box stack" action="{{ route('register') }}" method="post">
            @csrf
            <label for="login">Логин</label>
            <input id="login" name="login" value="{{ is_string(old('login')) ? old('login') : '' }}"
                minlength="3" maxlength="30" pattern="[a-zA-Z0-9_\-]+" autocomplete="username" required>
            <small>Латинские буквы, цифры, дефис и подчёркивание. От 3 символов.</small>

            <label for="password">Пароль</label>
            <input id="password" name="password" type="password" minlength="6" autocomplete="new-password" required>
            <small>От 6 символов.</small>

            <label for="password_confirmation">Повтори пароль</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>

            <button type="submit">Зарегистрироваться</button>
        </form>

        <a href="{{ route('login') }}">Уже есть аккаунт? Войти</a>
    </main>

    <x-footer />
</x-page>
