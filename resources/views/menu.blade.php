@extends('layouts.main')
@section('title','MENU')
@section('content')
        <!--=============================
        MENU PAGE START
    ==============================-->
    <section class="tf__menu_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <form class="tf__menu_search_area">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="tf__menu_search">
                            <input type="text" placeholder="search...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="tf__menu_search">
                            <div class="select_area">
                                <select class="select_js">
                                    <option value="AL">default shorting</option>
                                    <option value="">short by popularity</option>
                                    <option value="">short by avarage rating</option>
                                    <option value="">short by latest</option>
                                    <option value="">short by low to high</option>
                                    <option value="">short by high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="tf__menu_search">
                            <button class="common_btn" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                @foreach ($foods as $food)
                    <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
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
                                    <span>24</span>
                                </p>
                                @php
                                    $price=json_decode($food->price, TRUE);
                                    $firstPrice = $price[0];

                                    $oldprice=json_decode($food->oldprice, TRUE);
                                    $firstoldPrice = $oldprice[0];
                                @endphp
                                <h5 class="price">{{$firstPrice}} {{$food->currency}}<del>{{$firstoldPrice}} {{$food->currency}}</del></h5>
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
                {{-- <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_2.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">Chicken</a>
                            <a class="title" href="menu_details.html">Daria Shevtsova</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>30</span>
                            </p>
                            <h5 class="price">$80.00</h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_3.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">burger</a>
                            <a class="title" href="menu_details.html">Spicy Burger</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>17</span>
                            </p>
                            <h5 class="price">$100.00 <del>$110.00</del></h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_4.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">dressert</a>
                            <a class="title" href="menu_details.html">Fried Chicken</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>22</span>
                            </p>
                            <h5 class="price">$99.00</h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_5.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">kabab</a>
                            <a class="title" href="menu_details.html">Mozzarella Sticks</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>72</span>
                            </p>
                            <h5 class="price">$75.00</h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_6.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">kacchi</a>
                            <a class="title" href="menu_details.html">Popcorn Chicken</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span>57</span>
                            </p>
                            <h5 class="price">$69.00 <del>$80.00</del></h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_7.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">noodles</a>
                            <a class="title" href="menu_details.html">Chicken Wings</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>43</span>
                            </p>
                            <h5 class="price">$79.00 <del>$90.00</del></h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_item">
                        <div class="tf__menu_item_img">
                            <img src="images/menu2_img_8.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__menu_item_text">
                            <a class="category" href="#">grill</a>
                            <a class="title" href="menu_details.html">Onion Rings</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>62</span>
                            </p>
                            <h5 class="price">$110.00</h5>
                            <a class="tf__add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                to cart</a>
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="tf__pagination mt_50">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </li>
                            </ul>
                        </nav>
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
                            <h4 class="price">{{$firstPrice}} {{$food->currency}}<del>{{$firstoldPrice}} {{$food->currency}}</del> </h4>

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
        MENU PAGE END
    ==============================-->
@endsection