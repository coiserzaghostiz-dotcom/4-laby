<x-page :title="$title">
    <x-header />

    <main class="wrap">
        <h1>{{ $title }}</h1>

        @foreach ($news as $item)
            <article class="box">
                <p class="details">{{ $item['category'] }}</p>
                <h2>{{ $item['heading'] }}</h2>
                <p>{{ $item['text'] }}</p>
            </article>
        @endforeach
    </main>

    <x-footer />
</x-page>
