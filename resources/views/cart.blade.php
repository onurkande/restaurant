@extends('layouts.main')
@section('title','CART')
@section('content')
    @livewire('site.carts', ['cartitems' => $cartitems])
@endsection
@section('script')
    {{-- <script>
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
    </script> --}}
@endsection