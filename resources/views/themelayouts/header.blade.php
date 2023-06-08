<!-- Header -->
<header id="header" class="alt">
    <img src="{{ asset('assets/images/WeWish-2.png') }}"
         style="height:35px !important; margin-left: 30px; margin-top: 10px;">
    <nav id="nav">
        <ul>
            <li class="special">
                <img src="{{ asset('assets/images/franceflag.png') }}" class="btn-french" style=" margin-top:20px;border-radius: 5px; height: 20px;width: 40px;">
                <img src="{{ asset('assets/images/british.png') }}" class="btn-english"  style=" margin-top:20px;border-radius: 5px; height: 20px;width: 40px;">
            </li>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        <li><a href="index.php"></a></li>
                        <li><a href="#one" class="more scrolly">{{ __('home.menu_1') }}</a></li>
                        <li><a href="#two" class="more scrolly">{{ __('home.menu_2') }}</a></li>
                        <li><a href="#three" class="more scrolly">{{ __('home.menu_3') }}</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>

