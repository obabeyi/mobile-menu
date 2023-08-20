@extends('frontend.home_master')
@section('content')
    <!-- category page -->
    <div class="category-page segments-page">
        <div class="container">
            <div class="wrap-title">
                <h3>Category</h3>
            </div>
            <div class="row">
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="{{ asset('frontend/images/category1.jpg') }}" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Food</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="images/category2.jpg" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Snack</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="images/category3.jpg" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Drink</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="images/category4.jpg" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Dessert</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="images/category5.jpg" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Breakfast</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s6">
                    <a href="category-details.html">
                        <div class="content">
                            <img src="images/category6.jpg" alt="">
                            <div class="mask"></div>
                            <div class="wrap-caption">
                                <h4>Dinner</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end category page -->
@endsection
