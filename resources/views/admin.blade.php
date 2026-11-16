<x-page title="Админ">
    <x-header />

    <main class="wrap">
        <h1>Админ</h1>

        <section class="box">
            <h2>Статьи</h2>
            @foreach ($news as $item)
                <div class="row">
                    <p>{{ $item['heading'] }}</p>
                    <div class="actions">
                        <button type="button" disabled>Редактировать</button>
                        <button type="button" disabled>Заблокировать</button>
                        <button type="button" disabled>Удалить</button>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="box">
            <h2>Роли пользователей</h2>
            <form class="stack">
                <label for="login">Пользователь</label>
                <select id="login" name="login"><option>reporter</option></select>
                <label for="role">Новая роль</label>
                <select id="role" name="role">
                    <option>Читатель</option>
                    <option>Журналист</option>
                    <option>Администратор</option>
                </select>
                <button type="button" disabled>Сохранить роль</button>
            </form>
        </section>
    </main>

    <x-footer />
</x-page>
