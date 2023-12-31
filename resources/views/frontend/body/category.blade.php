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
                    {{-- @php
                        $mediaUrl = $catProduct->media->first()?->getUrl();

                        $imageExists = $mediaUrl && file_exists(public_path(parse_url($mediaUrl, PHP_URL_PATH)));

                        $src = $imageExists
                            ? $mediaUrl
                            : $settings[0]
                                    ->getMedia('default_image')
                                    ->first()
                                    ?->getUrl() ?? (isset($settings[0]) ? $settings[0]->getMedia('default_image')->first() : null);
                    @endphp --}}
                    <div class="col s6" style="padding: 5px;">
                        <a
                            href="{{ route('category.detail', [\Illuminate\Support\Str::slug($catProduct->name), $catProduct->id]) }}">
                            {{-- @foreach ($catProduct as $category) --}}
                            {{-- {{ dd($catProduct) }} --}}
                            <div class="content ">
                                <img width="165" height="100"
                                    src="{{ optional($catProduct->media->first() ?? (isset($settings[0]) ? $settings[0]->getMedia('default_image')->first() : null))->getUrl() }}"
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
