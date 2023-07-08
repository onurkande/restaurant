<div>
    @php
        $recordsArray = $records->toArray();
    @endphp
    @if(($recordsArray))
        <section class="tf__about_choose mt_100 xs_mt_70">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-lg-7 wow fadeInLeft" data-wow-duration="1s">
                        <div class="tf__section_heading mb_25">
                            <h4>{{$records->message}}</h4>
                            <h2>{{$records->title}}</h2>
                        </div>
                        <div class="tf__about_choose_text">
                            <p>{{$records->content}}</p>
                            <div class="row">
                                @php
                                    $rows = json_decode($records->rows, TRUE);
                                @endphp
                                @foreach ($rows as $row)
                                    <div class="col-xl-6">
                                        <div class="tf__about_choose_text_box">
                                            <span>{!!$row['icon']!!}</span>
                                            <h4>{{$row['title']}}</h4>
                                            <p>{{$row['content']}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-lg-5 wow fadeInRight" data-wow-duration="1s">
                        <div class="tf__about_choose_img">
                            <img src="{{asset('admin/aboutChooseImage/'.$records->image)}}" alt="about us" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
