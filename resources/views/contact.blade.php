@extends('layouts.main')
@section('title','CONTACT')
@section('content')
    <!--=============================
        CONTACT PAGE START
    ==============================-->
    <section class="tf__contact mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="tf__contact_form_area">
                <div class="row">
                    <div class="col-xl-5 col-md-6 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__contact_info_area">
                            <div class="tf__contact_info">
                                <h3>call</h3>
                                <p>+1347-430-9510</p>
                                <p>+9658745554002</p>
                            </div>
                            <div class="tf__contact_info">
                                <h3>mail</h3>
                                <p>websolutionus1@gmail.com</p>
                                <p>example@gmail.com</p>
                            </div>
                            <div class="tf__contact_info border-0 p-0 m-0">
                                <h3>location</h3>
                                <p>7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-md-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                        <form class="tf__contact_form">
                            <h3>contact us</h3>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="tf__contact_form_input">
                                        <span><i class="fas fa-user"></i></span>
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="tf__contact_form_input">
                                        <span><i class="fas fa-envelope"></i></span>
                                        <input type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="tf__contact_form_input">
                                        <span><i class="fas fa-phone-alt"></i></span>
                                        <input type="text" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="tf__contact_form_input">
                                        <span><i class="fas fa-book"></i></span>
                                        <input type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="tf__contact_form_input textarea">
                                        <span><i class="fas fa-pen"></i></span>
                                        <textarea rows="5" placeholder="Message"></textarea>
                                    </div>
                                    <button class="common_btn" type="submit">send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tf__contact_map_area">
                <div class="row mt_100 xs_mt_70">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__contact_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29199.78758207035!2d90.43684581929195!3d23.819543211524437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fce7d991f%3A0xacfaf1ac8e944c05!2sBasundhara%20Residential%20Area%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1667021568123!5m2!1sen!2sbd"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CONTACT PAGE END
    ==============================-->
@endsection