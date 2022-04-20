<li>
    <input  type="checkbox" value="">
    {{ $sub_categories->designation }}
</li>
@if ($sub_categories->categories)
    <ul style="margin-left: 1rem;">
        @if(count($sub_categories->childCategories) > 0)
           @foreach($subcategories as $subcategory)
                @include('sub_categories', ['sub_categories' => $subCategories->childCategories])
            @endforeach
        @endif
    </ul>
@endif

