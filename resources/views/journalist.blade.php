<x-page title="Журналист">
    <x-header />

    <main class="wrap">
        <h1>Журналист</h1>
        <x-messages />

        <section class="box">
            <h2>Новая статья</h2>
            <form class="stack" action="{{ route('journalist.store') }}" method="post">
                @csrf
                <x-article-fields :categories="$categories" />
                <button type="submit">Опубликовать</button>
            </form>
        </section>

        <section class="box">
            <h2>Мои статьи</h2>
            @forelse ($news as $article)
                <div class="row">
                    @if ($article->blocked)
                        <p>{{ $article->heading }} · Заблокирована</p>
                    @else
                        <p><a href="{{ route('article.show', $article) }}">{{ $article->heading }}</a></p>
                    @endif
                    <a href="{{ route('journalist.edit', $article) }}">Редактировать</a>
                </div>
            @empty
                <p>У тебя пока нет статей.</p>
            @endforelse
        </section>
    </main>

    <x-footer />
</x-page>
