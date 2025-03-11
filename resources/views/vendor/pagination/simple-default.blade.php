@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Flecha hacia atrás: Solo se muestra si no está en la primera página --}}
            @if (! $paginator->onFirstPage())
                <span class="page-item">
                    <a class="page-link large-arrow" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">&lt;</a>
                </span>
            @endif

            {{-- Flecha hacia adelante: Solo se muestra si hay más páginas --}}
            @if ($paginator->hasMorePages())
                <span class="page-item">
                    <a class="page-link large-arrow" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">&gt;</a>
                </span>
            @endif
        </ul>
    </nav>
@endif
