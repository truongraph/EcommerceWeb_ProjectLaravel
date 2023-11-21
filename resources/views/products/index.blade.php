@extends('layouts.app')

@section('content')
    <h2>{{ $product->name_product }}</h2>
    <p>Giá: ${{ $product->price_product }}</p>
    <p>Nội dụng: {{ $product->desc_product }}</p>
@endsection
