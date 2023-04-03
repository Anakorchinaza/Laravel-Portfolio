@php
    $route = Route::current()->getName(); 
@endphp

<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}" class="logo__black me-5"><img src="{{ asset('frontend/assets/img/logo/crystal-.png') }}" alt="" height="94"></a>
                                <a href="{{ url('/') }}" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/crystal-.png') }}" alt=""></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="{{ ($route == 'home')? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="{{ ($route == 'home.about')? 'active' : '' }}"><a href="{{ route('home.about') }}">About</a></li>
                                    <li class="{{ ($route == 'home.service')? 'active' : '' }}"><a href="{{ route('home.service') }}">Services</a></li>
                                    <li class="{{ ($route == 'home.portfolio')? 'active' : '' }}"><a href="{{ route('home.portfolio') }}">Portfolio</a>
                                        {{-- <ul class="sub-menu">
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Portfolio Details</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="{{ ($route == 'home.blog')? 'active' : '' }}"><a href="{{ route('home.blog') }}">Our Blog</a>
                                    
                                    </li>
                                    <li class="{{ ($route == 'contact')? 'active' : '' }}"><a href="{{ route('contact') }}">contact me</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact') }}" class="btn">Contact me</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ url('/') }}" class="logo__black me-5"><img src="{{ asset('frontend/assets/img/logo/crystal-.png') }}" alt="" height="94"></a>
                                <a href="{{ url('/') }}" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/crystal-.png') }}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="https://twitter.com/I_m_Ruby?t=NOZcHskBqHwtlowog4Idyw&amp;s=09" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="https://www.facebook.com/ruby.anakor" target="_blank"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="https://www.linkedin.com/in/rubyanakor/" target="_blank"><span class=" fab fa-linkedin-in"></span></a></li>
                                    <li><a href="https://www.instagram.com/_r_u_b_y_____/" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="https://github.com/Anakorchinaza" target="_blank"><span class=" fab fa-github"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                   
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>

