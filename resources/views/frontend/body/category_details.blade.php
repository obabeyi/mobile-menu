@extends('frontend.home_master')
@section('content')
    <!-- category details -->
    <div class="category-details segments-page">
        <div class="container">
            @isset($products->first()->category->name)
                <div class="section-title">
                    <h3>{{ $products->first()->category->name }} :</h3>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col s6">
                            <a href="{{ route('product.detail', [Str::slug($product->name), $product->id]) }}">
                                <div class="content">
                                    <img src="{{ $product->media->first()->getUrl() }}" alt="menu">
                                    <div class="text">
                                        <h6>{{ $product->name }}</h6>
                                        <p class="price">{{ $product->price }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @endisset
        </div>
    </div>
    <!-- end category details -->
@endsection
