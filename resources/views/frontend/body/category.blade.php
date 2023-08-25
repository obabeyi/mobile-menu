@extends('frontend.home_master')
@section('content')
    <!-- category page -->
    <div class="category-page segments-page">
        <div class="container">
            {{-- {{ dd($category) }} --}}
            <div class="wrap-title">
                <h3>Kategoriler</h3>
            </div>
            <div class="row">
                @foreach ($category as $catProduct)
                    {{-- {{ dd($catProduct) }} --}}
                    <div class="col s6">
                        <a href="{{ route('category.detail', [Str::slug($catProduct->name), $catProduct->id]) }}">
                            {{-- @foreach ($catProduct as $category) --}}
                            {{-- {{ dd($catProduct) }} --}}
                            <div class="content">
                                <img src="{{ $catProduct->media->first() ? $catProduct->media->first()->getUrl() : '' }}"
                                    alt="">
                                <div class="mask"></div>
                                <div class="wrap-caption">
                                    <h4>{{ $catProduct->name }}</h4>
                                </div>
                            </div>
                            {{-- @endforeach --}}

                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end category page -->
@endsection
