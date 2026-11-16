@if ($paginator->hasPages())
    <nav class="pagination" aria-label="Страницы новостей">
        @if ($paginator->previousPageUrl())
            <a href="{{ $paginator->previousPageUrl() }}">← Назад</a>
        @endif

        <span>Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Дальше →</a>
        @endif
    </nav>
@endif
