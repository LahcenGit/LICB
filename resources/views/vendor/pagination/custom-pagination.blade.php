@if ($paginator->hasPages())
    <ul class="pagination justify-content-start">

        {{-- Lien vers la page précédente --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link"><i class="fi-rs-arrow-small-left"></i></span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->appends(request()->query())->previousPageUrl() }}" rel="prev"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
        @endif

        {{-- Numéros de page --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}" aria-current="page">
                <a class="page-link" href="{{ $paginator->appends(request()->query())->url($page) }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Lien vers la page suivante --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->appends(request()->query())->nextPageUrl() }}" rel="next"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link"><i class="fi-rs-arrow-small-right"></i></span>
            </li>
        @endif

    </ul>
@endif
