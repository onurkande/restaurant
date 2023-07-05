<div>
    <section class="tf__counter mt_100 xs_mt_70" style="background: url(images/counter_bg.jpg);">
        <div class="tf__counter_overlay pt_120 xs_pt_90 pb_100 xs_pb_0">
            <div class="container">
                <div class="row">
                    @foreach ($records as $record)
                        <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="tf__single_counter">
                                <div class="text">
                                    <h2 class="counter">{{$record->number}}</h2>
                                    <span>{!!$record->icon!!}</span>
                                </div>
                                <p>{{$record->title}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
