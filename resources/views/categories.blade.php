<ul style="line-height: 1.69230769;">
    @if(count($categories) > 0)
    @foreach ($categories as $category)
        <li>
            <input  type="checkbox" value="" name="category">
            {{ $category->designation }}
        </li>
        
        <ul style="margin-left: 1rem;">
            @if(count($category->childCategories))
                @foreach ($category->childCategories as $subCategories)
                    @include('sub_categories', ['sub_categories' => $subCategories])
                @endforeach
            @endif
        </ul>
    @endforeach
    @endif
   
  
<ul>