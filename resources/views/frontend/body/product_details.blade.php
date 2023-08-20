@extends('frontend.home_master')
@section('content')
    <!-- menu details -->
    <div class="menu-details segments-page">
        <div class="container">
            <div id="tabs1">
                <div class="row">
                    <div class="col s12">
                        <div class="content">
                            <img src="images/menu-details1.jpg" alt="menu">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs2">
                <div class="row">
                    <div class="col s12">
                        <div class="content">
                            <img src="images/menu-details2.jpg" alt="menu">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs3">
                <div class="row">
                    <div class="col s12">
                        <div class="content">
                            <img src="images/menu-details3.jpg" alt="menu">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-mb">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s4">
                            <a class="active" href="#tabs1">
                                <img src="images/menu-details1.jpg" alt="">
                            </a>
                        </li>
                        <li class="tab col s4">
                            <a class="active" href="#tabs2">
                                <img src="images/menu-details2.jpg" alt="">
                            </a>
                        </li>
                        <li class="tab col s4">
                            <a class="active" href="#tabs3">
                                <img src="images/menu-details3.jpg" alt="">
                            </a>
                        </li>
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
