@extends('themelayouts.app')
@section('content')
    <style>

        .comment{
            display: inline;
            padding: 50px;
            border-bottom: 1px solid #bbbbbb;
        }
    </style>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <img src="{{ asset('assets/images/WeWish-1.png') }}" style="align-self: center;max-height: 174px;">
            <p>{{ __('home.description') }}<br/>

            <ul class="actions special">
                <li><a href="{{ route('wish_card.index') }}" class="button primary">{{ __('home.create_card') }}</a></li>
            </ul>
        </div>
        <a href="#two" class="more scrolly">{{ __('home.how_it_works') }}</a>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style1 special">
        <div class="inner">
            <header class="major">
                <h2>{{ __('home.why') }}</h2>
                <p>{{ __('home.why_1') }}<br></p>
                <p>{{ __('home.why_2') }}</p>
                <p>{{ __('home.why_3') }}</p>
            </header>
            <!--<ul class="icons major">
                                                    <li><span class="icon fa-gem major style1"><span class="label">Lorem</span></span></li>
                                                    <li><span class="icon fa-heart major style2"><span class="label">Ipsum</span></span></li>
                                                    <li><span class="icon solid fa-code major style3"><span class="label">Dolor</span></span></li>
                                                   </ul>-->
        </div>
    </section>

    <!-- Two -->
    <section id="two">
        <div class="container" style="display: flex; flex-direction: row;width:100%;margin-top:2%;font-size:12px">
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/phone.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/profile.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/contract.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/star.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
        </div>
    </section>
    <!-- Three -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major">
                <h2>{{ __('home.about_head') }}</h2>

            </header>
            <ul class="features">
                <li class="icon solid fa-headphones-alt">
                    <h3>{{ __('home.free') }}</h3>
                    <a href="{{ url('/card') }}" class="button primary">{{ __('home.free_1') }}</a>
                    <p>{{ __('home.free_2') }}</p>
                </li>
                <li class="icon fa-paper-plane">
                    <h3>{{ __('home.from') }}</h3>
                    <a href="{{ url('/card') }}" class="button primary">{{ __('home.from_1') }}</a>
                    <p>{{ __('home.from_2') }}</p>

                </li>

            </ul>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper style4">
        <div class="inner">
            <header>


                <h2>{{ __('home.login') }}</h2>

            </header>
            <ul class="actions stacked">
                <div id="container">
                    <!-- zone de connexion -->
                    @if (!isset(auth()->user()->id))
                        <form action='{{ route('login.store') }}' method='POST'>
                            @csrf
                            {{--  --}}
                            <label><b>{{ __('home.username') }}</b></label>
                            <input type='email' placeholder='adresse mail' name='email' required>
                            {{--  --}}
                            <label><b>{{ __('home.password') }}</b></label>
                            <input type='password' placeholder='Mot de passe' name='password' required><br>
                            {{--  --}}
                            <input type='submit' id='submit' value='{{ __('home.toLogin') }}'>
                        </form>
                    @else
                        <a href="{{ route('wishcard.list') }}" style="border: none;"><input type='submit' id='submit'
                                value='{{ __('home.cardSpace') }}'></a>
                    @endif
                </div>
            </ul>
        </div>
    </section>
@endsection
