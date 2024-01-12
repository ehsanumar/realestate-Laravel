@auth
    @php

        $count = App\Models\Favurite::where('user_id', auth()->user()->id)->count();
    @endphp
@endauth

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                        <a href="index.html" class="logo m-0 float-start">Property</a>
                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                        <li class="has-children">
                            <a>Type Of Estates</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('all') }}">All Estate</a></li>
                                <li><a href="{{ route('buy') }}">Buy Estate</a></li>
                                <li><a href="{{ route('rent') }}">rent Estate</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a style="background: #005555; border-radius:100%; width: 40px; height: 40px; text-align: center; display: flex; justify-content: center; align-items: center;"
                                    href="{{ route('favourite.index') }}"><i class="fa badge fa-lg"
                                        value={{ $count }}>&#xf07a;</i></a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>

                        @endauth
                    </ul>

                    <a href="#"
                        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
