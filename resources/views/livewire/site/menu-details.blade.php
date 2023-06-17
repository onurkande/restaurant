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
                <input class="form-check-input" type="radio" name="size" id="large" value="large" wire:click="updateTotalPrice('large')">
                <label class="form-check-label" for="large">
                    large <span>+ {{$firstPrice}} {{$foods->currency}}</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="size" id="medium" value="medium" wire:click="updateTotalPrice('medium')">
                <label class="form-check-label" for="medium">
                    medium <span>+ {{$SecondPrice}} {{$foods->currency}}</span>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="size" id="small" value="small" wire:click="updateTotalPrice('small')">
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
                    <input class="form-check-input extra-checkbox" type="checkbox" id="{{$single}}" value="{{$extra_price[$key]}}" wire:model="extras.{{$single}}">
                    <label class="form-check-label" for="{{$single}}">
                        {{$single}}<span>{{$extra_price[$key]}} {{$foods->currency}}</span>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="details_quentity">
            <input type="hidden" value="{{$foods->id}}" class="food_id">
            <h5>select quentity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger decrease-quantity"><i class="fal fa-minus"></i></button>
                    <input type="text" id="quantity" placeholder="1" value="1">
                    <button class="btn btn-success increase-quantity"><i class="fal fa-plus"></i></button>
                </div>
                <h3 id="total-price"> {{ $message }} </h3>
            </div>
        </div>
        <button wire:click="like">Like Post</button>
    @endif
</div>
