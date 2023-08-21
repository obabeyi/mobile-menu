@extends('frontend.home_master')
@section('content')
    <!-- menu details -->
    <div class="menu-details segments-page">
        <div class="container">

            @foreach ($products as $productKey => $product)
                @foreach ($product->media as $mediaKey => $image)
                    <div id="tabs{{ $productKey }}_{{ $mediaKey }}">
                        <div class="row">
                            <div class="col s12">
                                <div class="content">
                                    <img src="{{ $image->getUrl() }}" alt="menu">
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

            <div class="content-desc">
                <span>Food</span>
                <h5>Meat With Spicy Salty Sauce</h5>
                <h4>$23</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ducimus, dolor aperiam impedit, sapiente
                    natus magni eaque, optio quae aliquid saepe.</p>
                <button class="button">Add to Cart</button>
            </div>
            <div class="review">
                <h5>Review</h5>
                <div class="comment-people">
                    <div class="content">
                        <div class="image">
                            <img src="images/comment1.png" alt="">
                        </div>
                        <div class="text">
                            <h6>John Andy</h6>
                            <p class="date">March 23, 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, non.</p>
                        </div>
                    </div>
                    <div class="content reply">
                        <div class="image">
                            <img src="images/comment2.png" alt="">
                        </div>
                        <div class="text">
                            <h6>Franky</h6>
                            <p class="date">March 24, 2018</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, non.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-add">
                <h5>Leave Your Reply</h5>
                <form>
                    <input type="text" placeholder="Name">
                    <input type="email" placeholder="Email">
                    <textarea cols="30" rows="10" placeholder="Message"></textarea>
                    <button class="button">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end menu details -->
@endsection
