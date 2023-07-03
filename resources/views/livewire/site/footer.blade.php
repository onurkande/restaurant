<div>
    @if($records)
        <footer style="background: url(images/footer_bg.jpg);">
            <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_20">
                <div class="container wow fadeInUp" data-wow-duration="1s">
                    <div class="row justify-content-between">
                        <div class="col-xxl-4 col-lg-4 col-sm-9 col-md-7">
                            <div class="tf__footer_content">
                                <a class="footer_logo" href="index.html">
                                    <img src="images/footer_logo.png" alt="RegFood" class="img-fluid w-100">
                                </a>
                                <span>{{$records->content}}</span>
                                <ul class="social_link d-flex flex-wrap">
                                @php
                                    $icons = json_decode($records->icons, TRUE);
                                    $iconsUrl = json_decode($records->iconsUrl, TRUE);
                                @endphp
                                @foreach($icons as $key=>$single)
                                    <li><a href="{{$iconsUrl[$key]}}">{{$single}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-2 col-sm-5 col-md-5">
                            <div class="tf__footer_content">
                                <h3>{{$records->ShTitle}}</h3>
                                @php
                                    $Shrows = json_decode($records->Shrows, TRUE);
                                    $ShRowsUrl = json_decode($records->ShRowsUrl, TRUE);
                                @endphp
                                <ul>
                                    @foreach($Shrows as $key=>$single)
                                        <li><a href="{{$ShRowsUrl[$key]}}">{{$single}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-2 col-sm-6 col-md-5 order-md-4">
                            <div class="tf__footer_content">
                                <h3>{{$records->HlTitle}}</h3>
                                @php
                                    $HlRows = json_decode($records->HlRows, TRUE);
                                    $HlRowsUrl = json_decode($records->HlRowsUrl, TRUE);
                                @endphp
                                <ul>
                                    @foreach($HlRows as $key=>$single)
                                        <li><a href="{{$HlRowsUrl[$key]}}">{{$single}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-9 col-md-7 order-lg-4">
                            <div class="tf__footer_content">
                                <h3>{{$records->CuTitle}}</h3>
                                @php
                                    $CuRows = json_decode($records->CuRows, TRUE);
                                    $CuIcons = json_decode($records->CuIcons, TRUE);
                                @endphp
                                @foreach($CuRows as $key=>$single)
                                    <p class="info">{{$CuIcons[$key]}}{{$single}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf__footer_bottom d-flex flex-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tf__footer_bottom_text">
                                <p>{{$records->bottom}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
</div>
