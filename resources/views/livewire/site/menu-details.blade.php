<div>
    @if ($foods)
        @php
            $price=json_decode($foods->price, TRUE);
            $firstPrice = $price[0];
            $SecondPrice = $price[1];
            $ThirdPrice = $price[2];


            $firstPrice = intval($firstPrice);
            $SecondPrice = intval($SecondPrice);
            $ThirdPrice = intval($ThirdPrice);

            $extra_price=json_decode($foods->extra_price, TRUE);
            $extra_price = array_map('intval', $extra_price);

            $oldprice=json_decode($foods->oldprice, TRUE);
            $firstOldPrice = $oldprice[0];
        @endphp
        <div class="details_size">
            <h5>select size</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="size" id="large" value="large" wire:click="sizePrice('large')">
                <label class="form-check-label" for="large">
                    large <span>+ {{$firstPrice}} {{$foods->currency}}</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="size" id="medium" value="medium" wire:click="sizePrice('medium')">
                <label class="form-check-label" for="medium">
                    medium <span>+ {{$SecondPrice}} {{$foods->currency}}</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="size" id="small" value="small" wire:click="sizePrice('small')">
                <label class="form-check-label" for="small">
                    small <span>+ {{$ThirdPrice}} {{$foods->currency}}</span>
                </label>
            </div>
        </div>

        @php
            $extra=json_decode($foods->extra, TRUE);
        @endphp

        <div class="details_extra_item">
            <h5>select option <span>(optional)</span></h5>
            @foreach ($extra as $key => $single)
                <div class="form-check">
                    <input class="form-check-input extra-checkbox" type="checkbox" id="{{$single}}" value="{{$extra_price[$key]}}"  wire:click="selectExtra({{$key}}, {{$extra_price[$key]}}, '{{$single}}')">
                    <label class="form-check-label" for="{{$single}}">
                        {{$single}}<span>{{$extra_price[$key]}} {{$foods->currency}}</span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="details_quentity">
            <h5>select quentity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button wire:click="decreaseQuantity" class="btn btn-danger"><i class="fal fa-minus"></i></button>
                    <input type="text" placeholder="1" value="{{$quantity}}"  wire:model="quantity">
                    <button wire:click="increaseQuantity" class="btn btn-success"><i class="fal fa-plus"></i></button>
                </div>
                <h3 id="total-price"> {{ $totalPrice }} {{$foods->currency}} </h3>
            </div>
        </div>

        <ul class="details_button_area d-flex flex-wrap">
            <form action="{{url('add-to-cart')}}" method="POST">
                @csrf
                <input type="hidden" name="food_id" value="{{$foods->id}}">
                <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                <input type="hidden" name="quantity" value="{{$quantity}}">
                <input type="hidden" name="sizePricee" value="{{$sizePricee}}">
                <input type="hidden" name="seciliPrice" value="{{$seciliPrice}}">
                <input type="hidden" name="sizeName" value="{{$sizeName}}">
                @if($selectedExtras && $selectedPrices)
                    @foreach($selectedExtras as $single)
                        <input type="hidden" name="selectedExtras[]" value="{{$single}}">
                    @endforeach
                    @foreach($selectedPrices as $single)
                        <input type="hidden" name="selectedPrices[]" value="{{$single}}">
                    @endforeach
                @endif
                <li><button wire:click="addToCart" type="submit" class="common_btn add-to-cart-btn">add to cart</button></li>
            </form>
            <li><button class="common_btn wishlist-btn" href="#">wishlist</button></li>
        </ul>
    @endif
</div>
