<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>RegFood || Restaurant HTML Template</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    {{-- <link rel="icon" type="image/png" href="images/favicon.png"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.exzoom.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>

<body>
    <!--=============================
        TOPBAR START
    ==============================-->
    <section class="tf__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-md-8">
                    <ul class="tf__topbar_info d-flex flex-wrap d-none d-sm-flex">
                        @php
                            $infoRows = json_decode($header->infoRows, TRUE);
                            $infoRowsUrl = json_decode($header->infoRowsUrl, TRUE);
                            $infoRowsIcon = json_decode($header->infoRowsIcon, TRUE);
                        @endphp
                        @foreach($infoRows as $key=>$single)
                            <li><a href="{{$infoRowsUrl[$key]}}">{!! $infoRowsIcon[$key] !!}{{$single}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-6 col-sm-6 col-md-4">
                    <ul class="topbar_icon d-flex flex-wrap">
                        @php
                            $icons = json_decode($header->icons, TRUE);
                            $iconsUrl = json_decode($header->iconsUrl, TRUE);
                        @endphp
                        @foreach($icons as $key=>$single)
                            <li><a href="{{$iconsUrl[$key]}}">{!!$single!!}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="{{$header->imageUrl}}">
                <img src="{{asset('admin/headerimage/'.$header->image)}}" alt="Website" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars menu_icon_bar"></i>
                <i class="far fa-times close_icon_close"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    @php
                        $pages = json_decode($header->pages, TRUE);
                        $pagesUrl = json_decode($header->pagesUrl, TRUE);
                    @endphp
                    @foreach($pages as $key=>$single)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is($pagesUrl[$key]) ? 'active':'' }}" aria-current="page" href="{{$pagesUrl[$key]}}">{{$single}}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="menu_icon d-flex flex-wrap">
                    <li>
                        <a class="cart_icon" href="cart_view.html"><i class="fas fa-shopping-basket"></i>
                            <span>05</span></a>
                    </li>
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=============================
        MENU END
    ==============================-->


    <!--=============================
        BANNER START
    ==============================-->
    <section class="tf__banner">
        <div class="tf__banner_overlay">
            <span class="banner_shape_1">
                <img src="{{asset('admin/headerimage/tree_5.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{asset('admin/headerimage/tree_3.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_3">
                <img src="{{asset('admin/headerimage/tree_4.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_4">
                <img src="{{asset('admin/headerimage/tree_6.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_5">
                <img src="{{asset('admin/headerimage/tree_7.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_6">
                <img src="{{asset('admin/headerimage/tree_2.png')}}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="col-12">
                <div class="tf__banner_slider" style="background: url(images/banner_bg.jpg);">
                    <div class="tf__banner_slider_overlay">
                        <div class=" container">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-6 col-md-10 col-lg-6">
                                    <div class="tf__banner_text wow fadeInLeft" data-wow-duration="1s">
                                        <h3>{{$header->indexMessage}}</h3>
                                        <h1>{{$header->indexTitle}}</h1>
                                        <p>{{$header->indexContent}}</p>
                                        <form>
                                            <input type="text" placeholder="{{$header->indexSearchName}} . . .">
                                            <button type="submit" class="common_btn">{{$header->indexSearchName}}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-6 col-sm-10 col-md-9 col-lg-6">
                                    <div class="tf__banner_img wow fadeInRight" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{asset('admin/headerimage/'.$header->indexImage)}}" alt="food item" class="img-fluid w-100">
                                            <span>
                                                {{$header->indexDiscountMessage}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BANNER END
    ==============================-->


    <!--=============================
        OFFER ITEM START
    ==============================-->
    <section class="tf__offer_item pt_95 pb_100 xs_pt_65 xs_pb_70">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="tf__section_heading mb_25">
                        <h4>daily offer</h4>
                        <h2>up to 75% off for this day</h2>
                    </div>
                </div>
            </div>
            <div class="row offer_item_slider wow fadeInUp" data-wow-duration="1s">
                <div class="col-xl-4">
                    <div class="tf__offer_item_single" style="background: url(images/offer_item_img1.jpg);">
                        <span>37% off</span>
                        <a class="title" href="menu_details.html">Chicken Nuggets</a>
                        <p>Enim ipsam voluptat in quia voluptas sit aspe rnatur aut odit aut.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="tf__offer_item_single" style="background: url(images/offer_item_img2.jpg);">
                        <span>40% off</span>
                        <a class="title" href="menu_details.html">Beef Masala</a>
                        <p>Enim ipsam voluptat in quia voluptas sit aspe rnatur aut odit aut.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="tf__offer_item_single" style="background: url(images/offer_item_img3.jpg);">
                        <span>55% off</span>
                        <a class="title" href="menu_details.html">Dal Makhani</a>
                        <p>Enim ipsam voluptat in quia voluptas sit aspe rnatur aut odit aut.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="tf__offer_item_single" style="background: url(images/offer_item_img2.jpg);">
                        <span>45% off</span>
                        <a class="title" href="menu_details.html">Beef Masala</a>
                        <p>Enim ipsam voluptat in quia voluptas sit aspe rnatur aut odit aut.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#cartModal"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CART POPUT START -->
    @foreach ($foods as $food)
        <div class="tf__cart_popup">
            <div class="modal fade" id="cartModal{{$food->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="fal fa-times"></i></button>
                            <div class="tf__cart_popup_img">
                                <img src="{{asset('admin/foodimage/'.$food->image)}}" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="tf__cart_popup_text">
                                <a href="#" class="title">{{$food->name}}</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>(201)</span>
                                </p>
                                @php
                                    $price=json_decode($food->price, TRUE);
                                    $firstPrice = $price[0];
                                    $SecondPrice = $price[1];
                                    $ThirdPrice = $price[2];

                                    $oldprice=json_decode($food->oldprice, TRUE);
                                    $firstoldPrice = $oldprice[0];
                                @endphp
                                <h4 class="price">{{$firstPrice}} {{$food->currency}}<del>{{$firstoldPrice}} {{$food->currency}}</del></h4>

                                <div class="details_size">
                                    <h5>select size</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="large"
                                            checked>
                                        <label class="form-check-label" for="large">
                                            large <span>+ {{$firstPrice}} {{$food->currency}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="medium">
                                        <label class="form-check-label" for="medium">
                                            medium <span>+ {{$SecondPrice}} {{$food->currency}}</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="small">
                                        <label class="form-check-label" for="small">
                                            small <span>+ {{$ThirdPrice}} {{$food->currency}}</span>
                                        </label>
                                    </div>
                                </div>

                                @php
                                    $extra=json_decode($food->extra, TRUE);
                                    $extra_price=json_decode($food->extra_price, TRUE);
                                @endphp

                                <div class="details_extra_item">
                                    <h5>select option <span>(optional)</span></h5>
                                    @foreach ($extra as $key => $single)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="{{$single}}">
                                            <label class="form-check-label" for="{{$single}}">
                                                {{$single}} <span>{{$extra_price[$key]}} {{$food->currency}}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="details_quentity">
                                    <h5>select quentity</h5>
                                    <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                        <div class="quentity_btn">
                                            <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                            <input type="text" placeholder="1">
                                            <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                        </div>
                                        <h3>$320.00</h3>
                                    </div>
                                </div>
                                <ul class="details_button_area d-flex flex-wrap">
                                    <li><a class="common_btn" href="#">add to cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @endforeach
    <!-- CART POPUT END -->
    <!--=============================
        OFFER ITEM END
    ==============================-->


    <!--=============================
        RESERVATION START
    ==============================-->
    <section class="tf__reservation mt_100 xs_mt_70">
        <div class="container">
            <div class="tf__reservation_bg" style="background: url(images/reservation_bg.jpg);">
                <div class="row">
                    <div class="col-xl-6 ms-auto">
                        <div class="tf__reservation_form wow fadeInRight" data-wow-duration="1s">
                            <h2>book a table</h2>
                            <form>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label for="name">name</label>
                                            <input type="text" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label for="email">email</label>
                                            <input type="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label for="phone">phone</label>
                                            <input type="text" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label for="date">select date</label>
                                            <input type="date" id="date">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label>select time</label>
                                            <select class="reservation_input select_js">
                                                <option value="">select</option>
                                                <option value="">08.00 am to 09.00 am</option>
                                                <option value="">10.00 am to 11.00 am</option>
                                                <option value="">12.00 pm to 01.00 pm</option>
                                                <option value="">02.00 pm to 03.00 pm</option>
                                                <option value="">04.00 pm to 05.00 pm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tf__reservation_input_single">
                                            <label>select person</label>
                                            <select class="reservation_input select_js">
                                                <option value="">select</option>
                                                <option value="">1 person</option>
                                                <option value="">2 person</option>
                                                <option value="">3 person</option>
                                                <option value="">4 person</option>
                                                <option value="">5 person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="common_btn">confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        RESERVATION END
    ==============================-->


    <!--=============================
        MENU ITEM START
    ==============================-->
    <section class="tf__menu mt_95 xs_mt_65">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__section_heading mb_25">
                        <h4>food Menu</h4>
                        <h2>Popular Delicious Foods</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_filter d-flex flex-wrap">
                        <button class=" active" data-filter="*">all menu</button>
                        @foreach ($category as $single)
                            <button data-filter=".{{$single->slug}}">{{$single->name}}</button>
                        @endforeach
                        {{-- <button data-filter=".chicken">chicken</button>
                        <button data-filter=".pizza">pizza</button>
                        <button data-filter=".dresserts">dresserts</button> --}}
                    </div>
                </div>
            </div>

            <div class="row grid">
                @foreach ($foods as $food)
                    <div class="col-xxl-3 col-sm-6 col-lg-4 {{ $food->category->slug }} wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__menu_item">
                            <div class="tf__menu_item_img">
                                <img src="{{asset('admin/foodimage/'.$food->image)}}" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="tf__menu_item_text">
                                <a class="category" href="#">{{$food->category->name}}</a>
                                <a class="title" href="{{url('/menu_details/'.$food->id)}}">{{$food->name}}</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>{{$food->qty}}</span>
                                </p>
                                @php
                                    $price=json_decode($food->price, TRUE);
                                    $firstPrice = $price[0];
                                @endphp
                                <h5 class="price">{{$firstPrice}} {{$food->currency}}<del>$90.00</del></h5>
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal{{$food->id}}">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=============================
        MENU ITEM END
    ==============================-->


    <!--=============================
        TEAM START
    ==============================-->
    <section class="tf__team mt_100 xs_mt_70 pt_95 xs_pt_65 pb_95 xs_pb_65">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="tf__section_heading mb_25">
                        <h4>our team</h4>
                        <h2>meet our expert chefs</h2>
                    </div>
                </div>
            </div>

            <div class="row team_slider">
                @foreach ($chefs as $chef)
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__single_team">
                            <div class="tf__single_team_img">
                                <img src="{{asset('admin/chefsimage/'.$chef->image)}}" alt="team" class="img-fluid w-100">
                            </div>
                            <div class="tf__single_team_text">
                                <h4>{{$chef->name}}</h4>
                                <p>{{$chef->position}}</p>
                                <ul class="d-flex flex-wrap">
                                    @php
                                        $icons=json_decode($chef->icons, TRUE);
                                        $iconsUrl=json_decode($chef->iconsUrl, TRUE);
                                    @endphp
                                    @foreach ($icons as $key => $icon)
                                        <li><a href="{{$iconsUrl[$key]}}"><i class="fab fa-{{$icon}}"></i></a></li>  
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=============================
        TEAM END
    ==============================-->


    <!--=============================
        ADD SLIDER START
    ==============================-->
    <section class="tf__add_slider mt_75 xs_mt_45">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-xl-6 col-lg-6">
                    <div class="tf__add_slider_single" style="background: url(images/offer_slider_1.png);">
                        <div class="text">
                            <h5>weekly best seller</h5>
                            <h2>Fried Chicken</h2>
                            <p>Neque porro quisquam est qui dolor ipsum quia dolor sit ametsed.</p>
                            <a href="menu_details.html">shop now <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tf__add_slider_single" style="background: url(images/offer_slider_2.png);">
                        <div class="text">
                            <h5>daily offer</h5>
                            <h2>Hyderabadi Biryani</h2>
                            <p>Neque porro quisquam est qui dolor ipsum quia dolor sit ametsed.</p>
                            <a href="menu_details.html">shop now <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        ADD SLIDER END
    ==============================-->


    <!--=============================
        DOWNLOAD APP START
    ==============================-->
    <section class="tf__download mt_100 xs_mt_70">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="tf__download_text_bg" style="background: url(images/download_img.png);">
                    <div class="tf__download_text_overlay">
                        <div class="tf__download_text wow fadeInUp" data-wow-duration="1s">
                            <h5>{{$banner->message}}</h5>
                            <h2>{{$banner->title}}</h2>
                            <ul class="d-flex flex-wrap">
                                @php
                                    $url = json_decode($banner->url, TRUE);
                                @endphp
                                @if($url)
                                    <li>
                                        <a href="{{$url[0]}}">
                                            <span class="icon"><i class="fab fa-google-play"></i></span>
                                            <p>
                                                <span>Available on the</span>
                                                Google Play
                                            </p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$url[1]}}">
                                            <span class="icon"><i class="fab fa-apple"></i></span>
                                            <p>
                                                <span>Download on the</span>
                                                App Store
                                            </p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="row download_slider">
                    @php
                        $images = json_decode($banner->image, TRUE);
                    @endphp
                    @foreach($images as $single)
                        <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="tf__download_slider">
                                <img src="{{asset('admin/bannerimage/'.$single)}}" alt="app download" class="img-fluid w-100">
                            </div>
                        </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DOWNLOAD APP END
    ==============================-->


    <!--=============================
       TESTIMONIAL  START
    ==============================-->
    <section class="tf__testimonial pt_90 xs_pt_60 pb_100 xs_pb_70" style="background: url(images/testimonial_bg.jpg);">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="tf__section_heading mb_20">
                        <h4>testimonial</h4>
                        <h2>our customar feedbacks</h2>
                    </div>
                </div>
            </div>

            <div class="row testi_slider">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_2.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_3.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_1.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TESTIMONIAL END
    ==============================-->


    <!--=============================
        COUNTER START  
    ==============================-->
    @livewire('site.counter')
    <!--=============================
        COUNTER END
    ==============================-->


    <!--=============================
        BLOG START
    ==============================-->
    <section class="tf__blog pt_95 xs_pt_65 pb_65 xs_pb_35">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="tf__section_heading mb_25">
                        <h4>news & blogs</h4>
                        <h2>our latest foods blog</h2>
                    </div>
                </div>
            </div>

            <div class="row blog_slider">
            @foreach ($blogs as $blog)
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_blog">
                        <div class="tf__single_blog_img">
                            <img src="{{asset('site/blogimage/'.$blog->titleImage)}}" alt="author" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_blog_author">
                            <div class="img">
                                <img src="{{asset('admin/userimage/'.$blog->user->image)}}" alt="image" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h5>{{$blog->user->name}}</h5>
                                <p>{{$blog->created_at}}</p>
                            </div>
                        </div>
                        <div class="tf__single_blog_text">
                            <a class="category" href="#">{{$blog->category->name}}</a>
                            <a class="title" href="{{url('/blog-details/'.$blog->id)}}">{{$blog->title}}</a>
                            <p>{{ Str::limit($blog->content, 73) }}</p>
                            <div class="tf__single_blog_footer">
                                <a class="read_btn" href="{{url('/blog-details/'.$blog->id)}}">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                                <span><i class="far fa-comments"></i> 120</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!--=============================
        BLOG END
    ==============================-->


    <!--=============================
        FOOTER START
    ==============================-->
    @livewire('site.footer')
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="tf__scroll_btn"><i class="fas fa-hand-pointer"></i></div>
    <!--=============================
        SCROLL BUTTON END 
    ==============================-->


    <!--jquery library js-->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('assets/js/Font-Awesome.js')}}"></script>
    <!-- slick slider -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <!-- isotop js -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- counter up js -->
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countup.min.js')}}"></script>
    <!-- nice select js -->
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- venobox js -->
    <script src="{{asset('assets/js/venobox.min.js')}}"></script>
    <!-- sticky sidebar js -->
    <script src="{{asset('assets/js/sticky_sidebar.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- ex zoom js -->
    <script src="{{asset('assets/js/jquery.exzoom.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
        // Butonlara tıklama olayını dinle
        const buttons = document.querySelectorAll('.menu_filter button');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Tüm yiyecekleri gizle
                const foodItems = document.querySelectorAll('.food-item');
                foodItems.forEach(foodItem => {
                    foodItem.style.display = 'none';
                });

                // Seçilen kategoriye ait yiyecekleri göster
                const filterValue = button.getAttribute('data-filter');
                if (filterValue === '*') {
                    // Tüm yiyecekleri göster
                    foodItems.forEach(foodItem => {
                        foodItem.style.display = 'block';
                    });
                } else {
                    // Seçilen kategoriye ait yiyecekleri göster
                    const filteredFoodItems = document.querySelectorAll('.food-item' + filterValue);
                    filteredFoodItems.forEach(foodItem => {
                        foodItem.style.display = 'block';
                    });
                }
            });
        });
    </script>

</body>

</html>