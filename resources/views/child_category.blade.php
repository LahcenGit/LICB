<li>
    <div class="form-check mb-2">
    <input type="checkbox" class="form-check-input" value="{{$child_category->id}}" name="categories[]">
    <label class="form-check-label" for="check1">{{ $child_category->designation }}</label> 
    </div>
</li>
@if ($child_category->categories)
    <ul style="margin-left: 1rem;">
        @foreach ($child_category->categories as $childCategory)
            @include('child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif

