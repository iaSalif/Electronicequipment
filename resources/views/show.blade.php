@extends('layouts.admin')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->short_description }}</p>
    <p>Prix : ${{ $product->regular_price }}</p>
    <img src="{{ asset('assets/images/fashion/product/front/' . $product->image) }}" alt="{{ $product->name }}">
@endsection
