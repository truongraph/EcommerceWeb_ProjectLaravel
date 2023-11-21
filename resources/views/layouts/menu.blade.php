
<ul class="{{ isset($isSubmenu) ? 'sub-menu' : '' }}">
    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
    <li><a href="{{URL::to('/ve-chung-toi')}}">Về chúng tôi</a></li>
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
    <li><a href="{{URL::to('/lienhe')}}">Liên hệ</a></li>
    <li><a href="{{ route('order.search.view') }}">Tra cứu đơn hàng</a></li>
</ul>
