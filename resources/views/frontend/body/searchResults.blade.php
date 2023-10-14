@extends('frontend.home_master')
@section('content')
    {{-- {{ dd($settings[0]->getMedia('default_image')->first()) }} --}}
    <div class="searchResults-details segments-page">
        <!-- end category -->
        <div class="container">
            <div class="header-search">
                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="search-bar">
                        <input type="text" name="query" placeholder="Arama yap...">
                        <a type="hidden"></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($results as $result)
                    {{-- {{ dd($result->media->first()) }} --}}
                    <div class="col s6" style="padding: 5px;">
                        <a href="{{ route('product.detail', [Str::slug($result->name), $result->id]) }}">
                            {{-- @foreach ($catProduct as $category) --}}
                            {{-- {{ dd($catProduct) }} --}}
                            <div class="content ">
                                <img width="100%" height="200"
                                    src="{{ optional($result->media->first() ?? (isset($settings[0]) ? $settings[0]->getMedia('default_image')->first() : null))->getUrl() }}"
                                    alt="">
                                <div class="mask"></div>
                                <div class="wrap-caption">
                                    <h4>{{ $result->name }}</h4>
                                </div>
                            </div>
                            {{-- @endforeach --}}

                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
