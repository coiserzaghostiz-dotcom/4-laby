<x-page :title="$title">
    <x-header />

    <main class="wrap">
        @isset($categories)
            <nav class="category-list" aria-label="Выбор категории">
                <span>Выбрать категорию</span>
                @foreach ($categories as $category)
                    <a href="{{ route('category', $category) }}" @if($category->id === $selectedCategory->id) aria-current="page" @endif>{{ $category->name }}</a>
                @endforeach
            </nav>
        @endisset

        <h1>{{ $title }}</h1>

        @forelse ($news as $article)
            <article class="box">
                <p class="details">
                    <a href="{{ route('category', $article->category) }}">{{ $article->category->name }}</a>
                    · {{ $article->author->login }} · {{ $article->created_at->format('d.m.Y') }}
                </p>
                <h2><a href="{{ route('article.show', $article) }}">{{ $article->heading }}</a></h2>
                <p>{{ Illuminate\Support\Str::limit($article->text, 180) }}</p>
            </article>
        @empty
            <p class="box">В этой ленте пока нет статей.</p>
        @endforelse

        {{ $news->links('pagination') }}
    </main>

    <x-footer />
</x-page>
