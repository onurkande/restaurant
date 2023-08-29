<div>
    <!--=============================
        TOPBAR START
    ==============================-->
    <section class="tf__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-md-8">
                    <ul class="tf__topbar_info d-flex flex-wrap d-none d-sm-flex">
                        @php
                            $infoRows = json_decode($records->infoRows, TRUE);
                            $infoRowsUrl = json_decode($records->infoRowsUrl, TRUE);
                            $infoRowsIcon = json_decode($records->infoRowsIcon, TRUE);
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
                            $icons = json_decode($records->icons, TRUE);
                            $iconsUrl = json_decode($records->iconsUrl, TRUE);
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
            <a class="navbar-brand" href="{{$records->imageUrl}}">
                <img src="{{asset('admin/headerimage/'.$records->image)}}" alt="RegFood" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars menu_icon_bar"></i>
                <i class="far fa-times close_icon_close"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    @php
                        $pages = json_decode($records->pages, TRUE);
                        $pagesUrl = json_decode($records->pagesUrl, TRUE);
                    @endphp
                    @foreach($pages as $key=>$single)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is($pagesUrl[$key]) ? 'active':'' }}" aria-current="page" href="{{$pagesUrl[$key]}}">{{$single}}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="menu_icon d-flex flex-wrap">
                    <li>
                        <a class="cart_icon" href="{{url('cart')}}"><i class="fas fa-shopping-basket"></i>
                            <span>@livewire('site.cart-count')</span></a>
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
        BREADCRUMB START
    ==============================-->
    <section class="tf__breadcrumb" style="background: url({{asset('admin/headerimage/'.$records->opImage)}});">
        <div class="tf__breadcrumb_overlay">
            <div class="container">
                <div class="tf__breadcrumb_text">
                    <h1>{{$records->opTitle}}</h1>
                    <ul>
                        <li><a href="{{$records->opSmallTitleUrl}}">{{$records->opSmallTitle}}</a></li>
                        <li><a>{{$records->opSmallTitle2}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->
</div>
