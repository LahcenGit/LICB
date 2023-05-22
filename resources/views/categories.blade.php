<ul style="line-height: 1.69230769;">
    @foreach ($categories as $category)
        <li>
            <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" value="{{$category->id}}" name="categories[]">
            <label class="form-check-label" for="check1">{{ $category->designation }}</label>
            </div>
        </li>
        
        <ul style="margin-left: 1rem;">
            @foreach ($category->childrenCategories as $childCategory)
                @include('child_category', ['child_category' => $childCategory])
            @endforeach
        </ul>
    @endforeach
  
<ul>