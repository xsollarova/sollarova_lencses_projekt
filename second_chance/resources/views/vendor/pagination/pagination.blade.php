{{-- musí existovať aspoň 1 stránka na zobrazenie stránkovania --}}
@if ($paginator->hasPages())

    {{-- šípka doľava - ak sme na prvej strane, tak nepojde --}}
    @if ($paginator->onFirstPage())
        <span class="page-number disabled">‹</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-number">‹</a>
    @endif

    @foreach ($elements as $element)
        @if (is_array($element))

            {{-- zobrazí 3 čísla  --}}
            @foreach ($element as $page => $url)
                @php
                    $cur = $paginator->currentPage();
                    $last = $paginator->lastPage();
                    $show = ($page >= $cur && $page <= $cur + 2 && $page != $last);
                @endphp

                @if($show)
                    @if ($page == $cur)
                        <a href="{{ $url }}" class="page-number active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="page-number">{{ $page }}</a>
                    @endif
                @endif
            @endforeach

            {{-- zobrazí bodky ak medzi aktuálnymi čísielkami a poslednou stránkou chýbajú stránky --}}
            @if($paginator->currentPage() + 2 < $paginator->lastPage())
                <span class="page-dots">...</span>
            @endif

            {{-- posledné číslo bude vždy zobrazené --}}
            <a href="{{ $paginator->url($paginator->lastPage()) }}" 
               class="page-number {{ $paginator->currentPage() == $paginator->lastPage() ? 'active' : '' }}">
                {{ $paginator->lastPage() }}
            </a>
        @endif
    @endforeach

    {{-- šípka doprava - nefunguje ak sme na poslednej stránke --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-number">›</a>
    @else
        <span class="page-number disabled">›</span>
    @endif

@endif