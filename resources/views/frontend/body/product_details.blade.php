@extends('frontend.home_master')
@section('content')
    <!-- menu details -->
    <div class="menu-details segments-page">
        <div class="container">

            @foreach ($products as $productKey => $product)
                @foreach ($product->media as $mediaKey => $image)
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
                    <div id="tabs{{ $productKey }}_{{ $mediaKey }}">
                        <div class="row">
                            <div class="col s12">
                                <div class="content">
                                    <img src="{{ $src }}" alt="menu">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

            <div class="row no-mb">
                <div class="col s12">
                    <ul class="tabs">
                        @foreach ($products as $productKey => $product)
                            @foreach ($product->media as $mediaKey => $image)
                                <li class="tab col s4">
                                    <a {{ $productKey == 0 && $mediaKey == 0 ? 'class=active' : '' }}
                                        href="#tabs{{ $productKey }}_{{ $mediaKey }}">
                                        <img src="{{ $image->getUrl() }}" alt="">
                                    </a>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>

                </div>
            </div>
            {{-- {{ dd($products) }} --}}
            <div class="content-desc">
                <span>{{ $products->first()->category->name }}</span>
                <h5>{{ $products->first()->name }}</h5>
                <h4>{{ $products->first()->price }} ₺</h4>
                <p>{!! $products->first()->description !!}</p>
                {{-- <button class="button">Add to Cart</button> --}}
            </div>
            <div class="review">
                <h5>Puanlama</h5>
                <div class="comment-people">
                    @php
                        Carbon\Carbon::setLocale('tr');

                    @endphp
                    @foreach ($comments as $comment)
                        <div class="content">
                            {{-- <div class="image">
                            <img src="images/comment1.png" alt="">
                        </div> --}}
                            <div class="text">
                                <h6>{{ $comment->name }}</h6>
                                <p class="date">{{ $comment->created_at->isoFormat('D MMMM YYYY') }}</p>
                                <p>{!! $comment->comment_detail !!}</p>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="content reply">
                        <div class="image">
                            <img src="images/comment2.png" alt="">
                        </div>
                        <div class="text">
                            <h6>Franky</h6>
                            <p class="date">March 24, 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, non.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="comment-add">
                <h5>Yorum Bırakın</h5>
                <form action="{{ route('send.comment') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="İsim">
                    {{-- <input type="email" placeholder="Mail"> --}}
                    {{-- <select name="review_score" id="review_score">
                        <option value="1">1 Yıldız</option>
                        <option value="2">2 Yıldız</option>
                        <option value="3">3 Yıldız</option>
                        <option value="4">4 Yıldız</option>
                        <option value="5">5 Yıldız</option>

                    </select> --}}
                    <textarea cols="30" rows="10" name="comment_detail" placeholder="Mesajınız"></textarea>
                    <button class="button">Gönder</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end menu details -->
@endsection
