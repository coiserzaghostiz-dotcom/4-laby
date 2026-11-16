<x-page :title="$article->heading">
    <x-header />

    <main class="wrap">
        <article class="box">
            <p class="details">
                <a href="{{ route('category', $article->category) }}">{{ $article->category->name }}</a>
                · {{ $article->author->login }} · {{ $article->created_at->format('d.m.Y') }}
            </p>
            <h1>{{ $article->heading }}</h1>
            <p class="article-body">{{ $article->text }}</p>
        </article>

        <a href="{{ route('home') }}">← Все новости</a>
    </main>

    <x-footer />
</x-page>
