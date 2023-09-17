@extends('frontend.home_master')
@section('content')
    <div class="main">

        <!-- slide -->
        <div class="container">
            <div class="slide">
                @foreach ($campaigns as $campaign)
                    <div class="slide-show owl-carousel owl-theme">
                        <div class="content">
                            <div class="mask"></div>
                            <img src="{{ $campaign->media->first()? $campaign->media->first()->getUrl(): (isset($settings[0])? $settings[0]->getMedia('default_image')->first()?->getUrl(): '') }}"
                                alt="Campaign Image">

                            <div class="slide-caption">
                                <h2>{{ $campaign->name }}</h2>
                                <p>{{ $campaign->description }}</p>
                                <button class="button">{{ trans('frontend.slider.button') }}</button>
                            </div>
                        </div>
                @endforeach

                {{-- <div class="content">
                        <div class="mask"></div>
                        <img src="{{ asset('frontend/images/slider2.jpg') }}" alt="">
                        <div class="slide-caption">
                            <h2>Fresh Ready Food</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, quos?</p>
                            <button class="button">Read More</button>
                        </div>
                    </div>
                    <div class="content">
                        <div class="mask"></div>
                        <img src="{{ asset('frontend/images/slider3.jpg') }}" alt="">
                        <div class="slide-caption">
                            <h2>Delicous Food Place</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, quos?</p>
                            <button class="button">Read More</button>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
    <!-- end slide -->

    <!-- category -->
    <div class="category segments">
        <div class="container">
            <div class="section-title">
                <h3>{{ __('frontend.category') }}
                    <a href="{{ route('categories') }}">{{ __('frontend.seeAll') }} <i class="fa fa-angle-right"></i></a>
                </h3>
            </div>
            <div class="category-show owl-carousel owl-theme">
                @isset($category)
                    @foreach ($category as $row)
                        {{-- {{ dd($row->id) }} --}}
                        <a href="{{ route('category.detail', [Str::slug($row->name), $row->id]) }}">
                            <div class="content c-first"
                                style="background:url('{{ $row->media->first()? $row->media->first()->getUrl(): (isset($settings[0])? $settings[0]->getMedia('default_image')->first()?->getUrl(): '') }}') ">
                                <div class="mask"></div>
                                <h4>{{ $row->name }}</h4>
                            </div>
                        </a>
                    @endforeach
                @endisset

            </div>
        </div>
    </div>
    <!-- end category -->

    <!-- menu -->
    <div class="menu segments bg-second">
        <div class="container">
            <div class="section-title">
                <h3>Menu</h3>
            </div>
            <div class="row no-mb">
                <div class="col s12">
                    <ul class="tabs">
                        {{-- {{ dd($products) }} --}}
                        @isset($categoryMenu)
                            @foreach ($categoryMenu as $row)
                                <li class="tab col s3"><a class="active"
                                        href="#tabs{{ $row->id }}">{{ $row->name }}</a></li>
                            @endforeach
                        @endisset
                        {{-- <li class="tab col s3"><a href="#tabs2">Drink</a></li>
                        <li class="tab col s3"><a href="#tabs3">Snack</a></li>
                        <li class="tab col s3"><a href="#tabs4">Dessert</a></li> --}}
                    </ul>
                </div>
            </div>
            {{-- {{ optional($settings[0]->getMedia('default_image')->first())->getUrl() }} --}}

            @foreach ($category as $cat)
                <div id="tabs{{ $cat->id }}">
                    <div class="row">
                        @foreach ($products as $product)
                            {{-- {{ dd($product->media->first()->getUrl()) }} --}}
                            @isset($product->category)
                                @if ($product->category->id == $cat->id)
                                    @php
                                        $mediaUrl = $product->media->first()?->getUrl();
                                        
                                        $imageExists = $mediaUrl && file_exists(public_path(parse_url($mediaUrl, PHP_URL_PATH)));
                                        
                                        $src = $imageExists
                                            ? $mediaUrl
                                            : $settings[0]
                                                    ->getMedia('default_image')
                                                    ->first()
                                                    ?->getUrl() ?? (isset($settings[0]) ? $settings[0]->getMedia('default_image')->first() : null);
                                    @endphp
                                    <div class="col s6" style="padding:5px">
                                        <a href="{{ route('product.detail', [Str::slug($product->name), $product->id]) }}">
                                            <div class="content">
                                                <img width="165" height="165" src="{{ $src }}" alt="menu">


                                                <div class="text">
                                                    <h6>{{ $product->name }}</h6>
                                                    <p class="price">{{ $product->price }} ₺</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endisset
                        @endforeach

                    </div>

                </div>
            @endforeach

        </div>
    </div>
    <!-- end menu -->

    <!-- testimonial -->
    <div class="testimonial segments">
        <div class="container">
            <div class="testimonial-show owl-carousel owl-theme">
                @foreach ($comments as $comment)
                    <div class="content">
                        <h5>{{ $comment->name }}</h5>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <p>{!! $comment->comment_detail !!}</p>
                    </div>
                @endforeach

                {{-- <div class="content">alt="testimonial">
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                    </ul>
                    <h5>John Roe</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut non nisi sapiente vel hic esse!
                        Dignissimos voluptate, dolorum nesciunt. Beatae.</p>
                </div>
                <div class="content">alt="testimonial">
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <h5>Bastian</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut non nisi sapiente vel hic esse!
                        Dignissimos voluptate, dolorum nesciunt. Beatae.</p>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end testimonial -->
    </div>
@endsection
