@extends('layouts.main')
@section('title','CART')
@section('content')
    <!--============================
        CART VIEW START
    ==============================-->
    <section class="tf__cart_view mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__cart_list ">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="tf__pro_img">
                                            Image
                                        </th>

                                        <th class="tf__pro_name">
                                            details
                                        </th>

                                        <th class="tf__pro_status">
                                            price
                                        </th>

                                        <th class="tf__pro_select">
                                            quantity
                                        </th>

                                        <th class="tf__pro_tk">
                                            total
                                        </th>

                                        <th class="tf__pro_icon">
                                            <a class="clear_all" href="#">clear all</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartitems as $item)
                                        <tr class="food_data">
                                            @php $total = 0; @endphp
                                            <td class="tf__pro_img">
                                                <img src="{{asset('admin/foodimage/'.$item->food->image)}}" alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="tf__pro_name">
                                                <a href="#">{{$item->food->name}}</a>
                                                <span>{{$item->sizeName}}</span>
                                                @php
                                                    $selectedExtras=json_decode($item->selectedExtras, TRUE);
                                                    $selectedPrices=json_decode($item->selectedPrices, TRUE);
                                                @endphp
                                                @foreach($selectedExtras as $key => $single)
                                                    <p>{{$single}}  - {{$selectedPrices[$key]}} {{$item->food->currency}}</p>
                                                @endforeach
                                            </td>

                                            <td class="tf__pro_status">
                                                <h6>{{$item->sizePricee}} {{$item->food->currency}}</h6>
                                            </td>
                                            <td class="tf__pro_select">
                                                <input type="hidden" class="food_id" value="{{$item->food_id}}">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger  decrement-btn"><i class="fal fa-minus"></i></button>
                                                    <input type="text" name="quantity" class="qty-input" placeholder="1" value="{{$item->quantity}}">
                                                    <button class="btn btn-success  increment-btn"><i class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="tf__pro_tk">
                                                <h6>{{$item->totalPrice}} {{$item->food->currency}}</h6>
                                            </td>

                                            <td class="tf__pro_icon">
                                                <a class="delete-cart-item" href="#"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__cart_list_footer_button mt_50">
                        <div class="row">
                            <div class="col-xl-7 col-md-6">
                                <div class="tf__cart_list_footer_button_img">
                                    <img src="images/cart_offer_img.jpg" alt="cart offer" class="img-fluid w-100">
                                </div>
                            </div>
                            @php
                                //$total += $firstPrice * $item->food_qty 
                            @endphp
                            <div class="col-xl-5 col-md-6">
                                <div class="tf__cart_list_footer_button_text">
                                    <h6>total cart (02)</h6>
                                    <p>subtotal: <span>$124.00</span></p>
                                    <p>delivery: <span>$00.00</span></p>
                                    <p>discount: <span>$10.00</span></p>
                                    <p class="total"><span>total:</span> <span>{{$total}}</span></p>
                                    <form>
                                        <input type="text" placeholder="Coupon Code">
                                        <button type="submit">apply</button>
                                    </form>
                                    <a href="{{url('checkout')}}" class="common_btn" href="check_out.html">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CART VIEW END
    ==============================-->
@endsection
@section('script')
    <script>
        $('.increment-btn').click(function (e){
            e.preventDefault();

            //var inc_value = $(.qty-input).val();
            var inc_value = $(this).closest('.food_data').find('.qty-input').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                //$('.qty-input').val(value);
                $(this).closest('.food_data').find('.qty-input').val(value);
            }
        })

        $('.decrement-btn').click(function (e){
            e.preventDefault();

            //var dec_value = $(.qty-input).val();
            var dec_value = $(this).closest('.food_data').find('.qty-input').val();
            var value = parseInt(dec_value,10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                //$('.qty-input').val(value);
                $(this).closest('.food_data').find('.qty-input').val(value);
            }
        })

        $('.delete-cart-item').click(function (e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var food_id = $(this).closest('.food_data').find('.food_id').val();

            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'food_id': food_id,
                },
                success: function (response) {
                    window.location.reload();
                    alert(response.status);
                }
            });
        
        })
    </script>
@endsection