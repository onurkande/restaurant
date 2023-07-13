<div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
    <div class="tf__dashboard_menu">
        <div class="dasboard_header">
            <div class="dasboard_header_img">
                <img src="{{asset('admin/userimage/'.Auth::user()->image)}}" alt="user" class="img-fluid w-100">
                <label for="upload"><i class="far fa-camera"></i></label>
                <input type="file" id="upload" hidden>
            </div>
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <ul>
            <li><a class="{{Request::is('dashboard') ? 'active':''}}" href="{{url('dashboard')}}"><span><i class="fas fa-user"></i></span>
                    Parsonal Info</a></li>
            <li><a class="{{Request::is('address') ? 'active':''}}" href="dashboard_address.html"><span><i class="fas fa-user"></i></span>address</a>
            </li>
            <li><a class="{{Request::is('order') ? 'active':''}}" href="dashboard_order.html"><span><i class="fas fa-bags-shopping"></i></span>
                    Order</a></li>
            <li><a class="{{Request::is('wishlist') ? 'active':''}}" href="dashboard_wishlist.html"><span><i class="far fa-heart"></i></span>
                    wishlist</a></li>
            <li><a class="{{Request::is('reviews') ? 'active':''}}" href="dashboard_review.html"><span><i class="fas fa-star"></i></span> Reviews</a>
            </li>
            <li><a class="{{Request::is('change-password') ? 'active':''}}" href="dashboard_change_password.html"><span><i
                            class="fas fa-user-lock"></i></span> Change Password</a></li>
            <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <span> <i class="fas fa-sign-out-alt"></i></span> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
    </div>
</div>