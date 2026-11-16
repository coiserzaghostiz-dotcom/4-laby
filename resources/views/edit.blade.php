<x-page title="Редактирование статьи">
    <x-header />

    <main class="wrap">
        <h1>Редактирование статьи</h1>
        <x-messages />

        <form class="box stack" action="{{ route('journalist.update', $article) }}" method="post">
            @csrf
            @method('PUT')
            <x-article-fields :categories="$categories" :article="$article" />
            <div class="actions">
                <button type="submit">Сохранить</button>
                <a href="{{ route('journalist') }}">Отмена</a>
            </div>
        </form>
    </main>

    <x-footer />
</x-page>
