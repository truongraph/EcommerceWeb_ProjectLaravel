<option value="{{ $child->id }}">{{ $prefix }} {{ $child->name_category }}</option>
@if ($child->children)
    @foreach ($child->children as $subChild)
        @include('admin.products.child_category', ['child' => $subChild, 'prefix' => $prefix . '-'])
    @endforeach
@endif
