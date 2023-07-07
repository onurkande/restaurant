<div>
    @php
        $recordsArray = $records->toArray();
    @endphp
    @if(($recordsArray))
        <section class="tf__mission mt_100 xs_mt_70" style="background: url({{asset('site/CompanyVmgImage/CompanyVmgImage.png')}});">
            <div class="tf__mission_overlay pt_70 xs_pt_40 pb_100 xs_pb_70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-10 col-lg-7">
                            <div class="tf__mission_text">
                                <ul>
                                    @foreach($records as $record)
                                        <li>
                                            <div class="icon">
                                                {!!$record->icon!!}
                                            </div>
                                            <div class="text">
                                                <h4>{{$record->title}}</h4>
                                                <p>{{$record->content}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    @endif
</div>
