<x-page title="Журналист">
    <x-header />

    <main class="wrap">
        <h1>Журналист</h1>

        <section class="box">
            <h2>Новая статья</h2>
            <form class="stack">
                <label for="heading">Заголовок</label>
                <input id="heading" name="heading" type="text">

                <label for="category">Категория</label>
                <select id="category" name="category">
                    <option>Учёба</option>
                    <option>Спорт</option>
                </select>

                <label for="text">Текст статьи</label>
                <textarea id="text" name="text" rows="7"></textarea>

                <button type="button" disabled>Опубликовать</button>
            </form>
        </section>

        <section class="box">
            <h2>Мои статьи</h2>
            <p>Первокурсники показали свои первые сайты</p>
            <button type="button" disabled>Редактировать</button>
        </section>
    </main>

    <x-footer />
</x-page>
