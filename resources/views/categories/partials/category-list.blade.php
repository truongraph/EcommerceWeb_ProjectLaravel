<ul class="{{ isset($isSubmenu) ? 'sub-menu' : '' }}">
    @foreach($categories as $category)
    @if($category->status_category == 1)
        <li>
            <a href="{{ route('categories.show', $category->link_category) }}">{{ $category->name_category }}</a>
            @if(count($category->childCategories))
                @include('categories.partials.category-list', ['categories' => $category->childCategories, 'isSubmenu' => true])
            @endif
        </li>
        @endif
    @endforeach
</ul>
