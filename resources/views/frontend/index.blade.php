@extends('frontend.main_master')  
@section('main')

@section('title')
    Home | Sylvia Website
@endsection
  
  <!-- banner-area -->
    @include('frontend.home_all.home_slide') 
<!-- banner-area-end -->

<!-- about-area -->
    @include('frontend.home_all.home_about')
<!-- about-area-end -->

<!-- services-area -->
    @php
    $all_service = App\Models\Service::latest()->limit(5)->get();
    @endphp
<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing web development experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            @foreach ($all_service as $services)
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb">
                            <a href="{{ route('service.details', $services->id ) }}"><img src="{{ $services->image }}" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light" src="{{ $services->icon }}" alt="">
                                <img class="dark" src="{{ $services->icon }}" alt="">
                            </div>
                            <h3 class="title"><a href="services-details.html">{{ $services->title }}</a></h3>
                            <p>{!! Str::limit($services->short_description, 70,) !!}</p>
                            <a href="{{ route('service.details', $services->id) }}" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- services-area-end -->

<!-- work-process-area -->
<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Working Process</span>
                    <h2 class="title">A clear Web Development process is the basis of success</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 01</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset("frontend/assets/img/icons/wp_light_icon01.png") }}" alt="">
                        <img class="dark" src="{{ asset("frontend/assets/img/icons/wp_icon01.png") }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Planning</h4>
                        <p>Initial stage defines goals, requirements, audience, timeline, and scope.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 02</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon02.png') }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon02.png') }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Design</h4>
                        <p>Design UI, layout, colors, fonts, style guide per requirements.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 03</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon03.png') }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon03.png') }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Development</h4>
                        <p>Code website with HTML, CSS, JS, backend and databases.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 04</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon04.png') }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon04.png') }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Launch</h4>
                        <p>Deploy code to server, configure DNS, and security measures.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 05</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon02.png') }}" alt="">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon02.png') }}" alt="">
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Maintenance</h4>
                        <p>Monitor for bugs, update, fix issues, add features, security patches.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- work-process-area-end -->

<!-- portfolio-area -->
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
       
    </div>
    <div class="tab-content" id="portfolioTabContent">
        @php
            $all_portfolio = App\Models\Portfolio::latest()->get();
        @endphp
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach ($all_portfolio as $item)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ asset($item->portfolio_image) }}" alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{ $item->portfolio_name }}</span>
                                        <h4 class="title"><a href="{{ route('porfolio.details', $item->id) }}">{{ $item->portfolio_title }}</a></h4>
                                        <a href="{{ route('porfolio.details', $item->id) }}" class="link">Case Study</a>
                                    </div>
                                </div>
                            @endforeach
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- portfolio-area-end -->

<!-- partner-area -->
{{-- <section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    <li>
                        <img class="light" src="assets/img/icons/partner_light01.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_01.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light02.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_02.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light03.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_03.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light04.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_04.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light05.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_05.png" alt="">
                    </li>
                    <li>
                        <img class="light" src="assets/img/icons/partner_light06.png" alt="">
                        <img class="dark" src="assets/img/icons/partner_06.png" alt="">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                    </div>
                    <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile apps in different industries and verticals. Eventually, I decided that it would be a fun challenge to try designing and building my own.</p>
                    <a href="contact.html" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- partner-area-end -->

<!-- testimonial-area -->
<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    <li><img src="assets/img/images/testi_img01.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img02.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img03.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img04.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img05.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img06.png" alt=""></li>
                    <li><img src="assets/img/images/testi_img07.png" alt=""></li>
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item">
                            <div class="testimonial__icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial__content">
                                <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                                <div class="testimonial__avatar">
                                    <span>Rasalina De Wiliamson</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->

<!-- blog-area -->
    @php
    $blog = App\Models\Blog::latest()->limit(3)->get();
    @endphp
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blog as $item)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="blog-details.html"><img src="{{ asset($item->blog_image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">{{ $item['category']['blog_category'] }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->blog_title }}</a></h3>
                            <a href="{{ route('blog.details', $item->id) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
            @endforeach
     
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('home.blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->

<!-- contact-area -->
<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="#">
                            <input type="text" placeholder="Enter name*">
                            <input type="email" placeholder="Enter mail*">
                            <input type="number" placeholder="Enter number*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection