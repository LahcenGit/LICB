@foreach ($children as $child)

        @if ($child->children->isNotEmpty())
        <div class="dropdown dropend">
            <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $child->designation }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                @include('children', ['children' => $child->children])
            </div>
        </div>

        @else
        <a class="dropdown-item" href="{{ asset('category/'.$child->slug) }}">{{ $child->designation }}</a>
        @endif
@endforeach


