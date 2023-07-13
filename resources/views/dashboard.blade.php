@extends('layouts.main')
@section('title','dashboard')
@section('content')
    <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="tf__dashboard mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="tf__dashboard_area">
                <div class="row">
                    @livewire('site.dashboard-sidebar')
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__dashboard_content">
                            <div class="tf_dashboard_body">
                                <h3>Parsonal Information
                                    <a class="dash_add_new_address" href="dashboard_info_edit.html">edit</a>
                                </h3>

                                <div class="tf_dash_personal_info">
                                    <div class="personal_info_text">
                                        <p><span>Name:</span> {{ Auth::user()->name }}</p>
                                        <p><span>Email:</span> {{ Auth::user()->email }}</p>
                                        <p><span>Phone:</span> {{ Auth::user()->phone }}</p>
                                        <p><span>Address:</span> {{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        DASHBOARD END 
    ==========================-->
@endsection