@extends('layouts.main')
@section('title','ABOUT')
@section('content')
    <section class="tf__about_us mt_100 xs_mt_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-duration="1s">
                    <div class="tf__about_us_img">
                        <div class="img">
                            <img src="images/about_chef.jpg" alt="about us" class="img-fluid w-100">
                        </div>
                        <h3>12+ <span>Years experience</span></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate officiis architecto
                            reiciendis.
                            <span>jhon deo</span>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow fadeInRight" data-wow-duration="1s">
                    <div class="tf__section_heading mb_25">
                        <h4>About Company</h4>
                        <h2>Helathy Foods Provider</h2>
                    </div>
                    <div class="tf__about_us_text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae
                            minima pariatur consequatur voluptate sapiente deleniti soluta,.</p>
                        <ul>
                            <li>
                                <h4>trusted partner</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Minus, Officiis Placeat
                                    Iusto Quasi Adipisci Impedit Delectus Beatae Ab Maxime.</p>
                            </li>
                            <li>
                                <h4>first Delivery</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Minus, Officiis Placeat
                                    Iusto Quasi Adipisci Impedit Delectus Beatae Ab Maxime.</p>
                            </li>
                            <li>
                                <h4>secure payment</h4>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Minus, Officiis Placeat
                                    Iusto Quasi Adipisci Impedit Delectus Beatae Ab Maxime.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('site.company-vmg')

    <section class="tf__about_choose mt_100 xs_mt_70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7 wow fadeInLeft" data-wow-duration="1s">
                    <div class="tf__section_heading mb_25">
                        <h4>Why choose us</h4>
                        <h2>Why we are the best</h2>
                    </div>
                    <div class="tf__about_choose_text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius culpa, itaque repudiandae
                            praesentium tempore quos, totam, facilis doloribus doloremque illo delectus.</p>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="tf__about_choose_text_box">
                                    <span><i class="fas fa-burger-soda"></i></span>
                                    <h4>Fresh food</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tf__about_choose_text_box">
                                    <span><i class="fal fa-truck"></i></span>
                                    <h4>Fast Delivery</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tf__about_choose_text_box">
                                    <span><i class="fas fa-file-certificate"></i></span>
                                    <h4>Quality Maintain</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tf__about_choose_text_box">
                                    <span><i class="fas fa-headset"></i></span>
                                    <h4>24/7 Service</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-5 wow fadeInRight" data-wow-duration="1s">
                    <div class="tf__about_choose_img">
                        <img src="images/why_choose_img.jpg" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @livewire('site.counter')

    <section class="tf__testimonial pt_95 xs_pt_65 mb_100 xs_mb_70">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="tf__section_heading mb_20">
                        <h4>testimonial</h4>
                        <h2>our customar feedbacks</h2>
                    </div>
                </div>
            </div>

            <div class="row testi_slider">
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_2.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_3.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_testimonial">
                        <div class="tf__single_testimonial_img">
                            <img src="images/testimonial_img_1.jpg" alt="testimonial" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_testimonial_text">
                            <h4>isita islam</h4>
                            <p class="designation">nyc usa</p>
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus
                                praesentium quaerat nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection