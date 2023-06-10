@extends('layouts.main')
@section('title','MENU')
@section('content')
    <!--=============================
        MENU DETAILS START
    ==============================-->
    <section class="tf__menu_details mt_100 xs_mt_75 mb_95 xs_mb_65">
        <div class="container">
            <div class="row food_data">
                <div class="col-lg-5 col-sm-10 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box tf__menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100" src="{{asset('admin/foodimage/'.$records->image)}}" alt="product"></li>
                                {{-- <li><img class="zoom ing-fluid w-100" src="images/menu2_img_2.jpg" alt="product"></li> --}}
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_details_text">
                        <h2>{{$records->name}}</h2>
                        @php
                            $price=json_decode($records->price, TRUE);
                            $firstPrice = $price[0];

                            $oldprice=json_decode($records->oldprice, TRUE);
                            $firstOldPrice = $oldprice[0];
                        @endphp
                        <h3 class="price">{{$firstPrice}}TL<del>{{$firstOldPrice}}TL</del> </h3>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <p class="short_description">{{$records->content}}</p>

                        @php
                            $SecondPrice = $price[1];
                            $ThirdPrice = $price[2];
                        @endphp
                        <div class="details_size">
                            <h5>select size</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="large" checked>
                                <label class="form-check-label" for="large">
                                    large <span>+ {{$firstPrice}} {{$records->currency}}</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="medium" >
                                <label class="form-check-label" for="medium">
                                    medium <span>+ {{$SecondPrice}} {{$records->currency}}</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="small" >
                                <label class="form-check-label" for="small">
                                    small <span>+ {{$ThirdPrice}} {{$records->currency}}</span>
                                </label>
                            </div>
                        </div>

                        @php
                            $extra=json_decode($records->extra, TRUE);
                            $extra_price=json_decode($records->extra_price, TRUE);
                        @endphp

                        <div class="details_extra_item">
                            <h5>select option <span>(optional)</span></h5>
                            @foreach ($extra as $key => $single)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{$single}}">
                                    <label class="form-check-label" for="{{$single}}">
                                        {{$single}}<span>{{$extra_price[$key]}} {{$records->currency}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- TOPLAM ÜCRETİ HESAPLAMA --}}
                        @php
                            $firstPrice = intval($firstPrice);
                            $SecondPrice = intval($SecondPrice);
                            $ThirdPrice = intval($ThirdPrice);
                            
                            $total = $firstPrice + $SecondPrice + $SecondPrice; 

                            $total2 = 0;
                            foreach ($extra_price as $value) 
                            {
                                $total2 += intval($value);
                            }

                            $totalPrice = $total + $total2;
                        @endphp

                        <div class="details_quentity">
                            <input type="hidden" value="{{$records->id}}" class="food_id">
                            <h5>select quentity</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger decrease-quantity"><i class="fal fa-minus"></i></button>
                                    <input type="text" id="quantity" placeholder="1" value="1">
                                    <button class="btn btn-success increase-quantity"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3 id="total-price">687</h3>
                            </div>
                        </div>
                        <ul class="details_button_area d-flex flex-wrap">
                            <li><a class="common_btn add-to-cart-btn" href="#">add to cart</a></li>
                            <li><a class="common_btn wishlist-btn" href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    <p>{{$records->desc}}</p>
                                    <ul>
                                        @php
                                            $desc_row=json_decode($records->desc_row, TRUE);
                                        @endphp
                                        @foreach($desc_row as $single)
                                            <li>{{$single}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="tf__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 reviews</h4>
                                            <div class="tf__comment pt-0 mt_20">
                                                <div class="tf__single_comment m-0 border-0">
                                                    <img src="images/client_1.png" alt="review" class="img-fluid">
                                                    <div class="tf__single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="tf__single_comment">
                                                    <img src="images/client_2.png" alt="review" class="img-fluid">
                                                    <div class="tf__single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="tf__single_comment">
                                                    <img src="images/client_3.png" alt="review" class="img-fluid">
                                                    <div class="tf__single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="tf__single_comment">
                                                    <img src="images/client_4.png" alt="review" class="img-fluid">
                                                    <div class="tf__single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>

                                                <div class="tf__pagination mt_30">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <nav aria-label="...">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-left"></i></a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">1</a></li>
                                                                    <li class="page-item active"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="tf__post_review">
                                                <h4>write a Review</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3"
                                                                placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf__related_menu mt_90 xs_mt_60">
                <h2>related item</h2>
                <div class="row related_product_slider">
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__menu_item">
                            <div class="tf__menu_item_img">
                                <img src="images/menu2_img_1.jpg" alt="menu" class="img-fluid w-100">
                            </div>
                            <div class="tf__menu_item_text">
                                <a class="category" href="#">Biryani</a>
                                <a class="title" href="menu_details.html">Hyderabadi biryani</a>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>24</span>
                                </p>
                                <h5 class="price">$65.00 <del>$90.00</del></h5>
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
                                <a class="tf__add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="menu_details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CART POPUT START -->
    {{-- <div class="tf__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fal fa-times"></i></button>
                        <div class="tf__cart_popup_img">
                            <img src="images/popup_cart_img.jpg" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="tf__cart_popup_text">
                            <a href="#" class="title">Maxican Pizza Test Better</a>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span>(201)</span>
                            </p>
                            <h4 class="price">$320.00 <del>$350.00</del> </h4>

                            <div class="details_size">
                                <h5>select size</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="large01"
                                        checked>
                                    <label class="form-check-label" for="large01">
                                        large <span>+ $350</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="medium01">
                                    <label class="form-check-label" for="medium01">
                                        medium <span>+ $250</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="small01">
                                    <label class="form-check-label" for="small01">
                                        small <span>+ $150</span>
                                    </label>
                                </div>
                            </div>

                            <div class="details_extra_item">
                                <h5>select option <span>(optional)</span></h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="coca-cola01">
                                    <label class="form-check-label" for="coca-cola01">
                                        coca-cola <span>+ $10</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="7up01">
                                    <label class="form-check-label" for="7up01">
                                        7up <span>+ $15</span>
                                    </label>
                                </div>
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
    </div> --}}
    <!-- CART POPUT END -->

    <!--=============================
        MENU DETAILS END
    ==============================-->
@endsection

@section('script')
    <script>
        // Miktarı azaltma
        document.querySelector('.decrease-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            var quantity = parseInt(quantityInput.value);
            
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
                calculateTotalPrice(quantity);
            }
        });

        // Miktarı artırma
        document.querySelector('.increase-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            var quantity = parseInt(quantityInput.value);
            
            quantity++;
            quantityInput.value = quantity;
            calculateTotalPrice(quantity);
        });

        // Toplam fiyatı hesaplama
        function calculateTotalPrice(quantity) {
            var price = 320.00; // Yemek fiyatı
            var totalPrice = price * quantity;
            document.getElementById('total-price').innerHTML = '$' + totalPrice.toFixed(2);
        }
    </script>

    <script>
        $(document).ready(function() {
           $('.add-to-cart-btn').click(function (e){
                e.preventDefault();

                var food_id = $(this).closest('.food_data').find('.food_id').val();
                var food_qty = $(this).closest('.food_data').find('#quantity').val();

                alert(food_id);
                alert(food_qty);
           }) 
        });
    </script>
@endsection