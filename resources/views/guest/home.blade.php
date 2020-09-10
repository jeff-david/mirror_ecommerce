@extends('guest.component.layout')

@section('title')
Online Shop
@endsection

@section('content')
<div class="row">
    <!-- SIDEBAR CATEGORY -->
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>
            <nav class="yamm megamenu-horizontal" role="navigation">
                <ul class="nav"></ul>
            </nav>
        </div>
        <!-- SIDEBAR HOT DEALS -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                @foreach($hot_deals as $hot_deal)
                <div class="item">
                    <div class="products">
                        <div class="hot-deal-wrapper">
                            <div class="image">
                                <img src="{{asset('uploads/product/'.$hot_deal->thumbnail)}}" alt="">
                            </div>
                            @php($nPrice = false)
                            @if($hot_deal->special_start <= date('Y-m-d') && $hot_deal->special_end >= date('Y-m-d'))
                                @php($nPrice = true)
                                @endif
                                <div class="sale-offer-tag">
                                    <span>{{ sprintf('%.2f',(($hot_deal->selling_price-$hot_deal->special_price)/$hot_deal->selling_price)*100) }}%<br>off</span>
                                </div>
                                <div class="timing-wrapper">
                                    <div class="box-wrapper">
                                        <div class="date box">
                                            <span class="key">120</span>
                                            <span class="value">DAYS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="hour box">
                                            <span class="key">20</span>
                                            <span class="value">HRS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper">
                                        <div class="minutes box">
                                            <span class="key">36</span>
                                            <span class="value">MINS</span>
                                        </div>
                                    </div>

                                    <div class="box-wrapper hidden-md">
                                        <div class="seconds box">
                                            <span class="key">60</span>
                                            <span class="value">SEC</span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="product-info text-left m-t-20">
                            <h3 class="name"><a href="#">{{ $hot_deal->name }}</a></h3>

                            <div class="product-price">
                                <span
                                    class="price">&#8369; {{ $nPrice ? $hot_deal->special_price : $hot_deal->selling_price }}
                                </span>
                                @if($nPrice)
                                <span class="price-before-discount ">&#8369; {{ $hot_deal->selling_price }}</span>
                                @endif
                            </div><!-- /.product-price -->

                        </div><!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">

                                <div class="add-cart-button btn-group">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$hot_deal->id}}">
                                        <button class="btn btn-primary cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> Checkout</button>
                                    </form>
                                </div>

                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- SIDEBAR HOT DEALS -->
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    @php($sl=1)
                    @php($total = count($special_offers))
                    @foreach($special_offers as $special_offer)
                    @if(($sl % 3) == 1)
                    <div class="item">
                        <div class="products special-product">
                            @endif
                            <div class="product">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="">
                                                    <img src="{{asset('uploads/product/'.$special_offer->thumbnail)}}"
                                                            alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 style="height: 44px; overflow: hidden;" class="name"><a href="">{{ $special_offer->name }}</a></h3>
                                            <div class="product-price">
                                                <span class="price">&#8369; {{ $special_offer->selling_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(($sl % 3) == 0 || $sl == $total)
                        </div>
                    </div>
                    @endif
                    @php($sl++)
                    @endforeach
                </div>
            </div>
        </div>
        <!-- SIDEBAR TESTIMONIALS -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
                <div class="item">
                    <div class="avatar">
                        <img src="{{ asset('assets/guest/images/testimonials/member1.png') }}" alt="">
                    </div>
                    <div class="testimonials">
                        <em>"</em>
                        Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.
                        <em>"</em>
                    </div>
                    <div class="clients_author">Stephen Doe <span>Beauty And Skin Care</span></div>
                </div>
                <div class="item">
                    <div class="avatar">
                        <img src="{{ asset('assets/guest/images/testimonials/member2.png') }}" alt="">
                    </div>
                    <div class="testimonials">
                        <em>"</em>
                        Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.
                        <em>"</em>
                    </div>
                    <div class="clients_author">Stephen Doe <span>Beauty And Skin Care</span></div>
                </div>
                <div class="item">
                    <div class="avatar">
                        <img src="{{ asset('assets/guest/images/testimonials/member3.png') }}" alt="">
                    </div>
                    <div class="testimonials">
                        <em>"</em>
                        Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.
                        <em>"</em>
                    </div>
                    <div class="clients_author">Stephen Doe <span>Beauty And Skin Care</span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION CONTENT-->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach($sliders as $slider)
                <div class="item" style="background-image: url({{ asset('uploads/slider/'.$slider->image) }});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div style="color:purple;" class="slider-header fadeInDown-1">{{$slider->title}}</div>
                            <div class="big-text fadeInDown-1">
                                {{$slider->sub_title}}
                            </div>
                            <div class="excerpt fadeInDown-2 hidden-xs">
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            </div>
                            <div class="button-holder fadeInDown-3">
                                <a href="{{ $slider->url }}"
                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">Checkout Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">skin care services</h4>
                                </div>
                                <h6 class="text">Lorem ipsum dolor sit amet</h6>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Cash on Delivery</h4>
                                </div>
                            </div>
                            <h6 class="text">Lorem ipsum dolor sit amet</h6>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text">Lorem ipsum dolor sit amet</h6>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">New Products</h3>
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="">
                                                    <img src="{{ asset('assets/guest/images/product/01.jpg') }}">
                                                </a>
                                            </div>
                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="">Luxcent</a></h3>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                <span class="price">
                                                    &#8369; 500 </span>
                                                <span class="price-before-discount">&#8369; 900</span>
                                            </div><!-- /.product-price -->
                                        </div>
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <button data-toggle="tooltip" class="btn btn-primary icon"
                                                        type="button" title="Checkout" id="btn-checkout">
                                                        <i class="fa fa-shopping-cart"> Checkout</i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Checkout</button>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive"
                                src="{{ asset('assets/guest/images/banners/home-banner1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive"
                                src="{{ asset('assets/guest/images/banners/home-banner2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Feature Products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                @foreach($feature_products as $feature_product)
                <div class="item item-carousel">
                    <div class="products">

                        <div class="product">
                            <div class="product-image">

                                <div class="image">
                                    <a href="#"><img src="{{asset('uploads/product/'.$feature_product->thumbnail)}}"
                                            alt=""></a>
                                </div>

                                <div class="tag new">
                                    <span>
                                        {{ sprintf('%.d',(($feature_product->selling_price-$feature_product->special_price)/$feature_product->selling_price)*100) }}%off
                                    </span>
                                </div>
                            </div>

                            <div class="product-info text-left">
                                <h3 class="name"><a href="#">{{ $feature_product->name }}</a></h3>
                                <div class="description"></div>
                                <div class="product-price">
                                    <span class="price">&#8369; {{ $feature_product->special_price }} </span>
                                    <span class="price-before-discount">&#8369;
                                        {{ $feature_product->selling_price }}</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button"
                                            title="Checkout" id="btn-checkout">
                                            <i class="fa fa-shopping-cart"> Checkout</i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Checkout</button>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
