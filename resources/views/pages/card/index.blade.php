@extends('themelayouts.app')
@section('content')
    <header id="header">
        <img src="{{ asset('assets/images/WeWish-2.png') }}"
             style="height:35px !important; margin-left: 30px; margin-top: 10px;">
    </header>
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h4>{{ __('home.createCommonCard') }}</h4>
                    <form method="POST" action="{{ route('wish_card.store') }}">
                        @csrf
                        <div class="row gtr-uniform">
                            <div class="col-12"></div>
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="nomprojet" id="nomprojet" value=""
                                    placeholder="{{ __('home.nameOfProject') }}" required />
                            </div>
                            <div class="col-12"></div>
                            <div class="col-4 col-12-small">
                                <input type="hidden" id="demo-priority-low" value="carte" name="type">
                            </div>
                            <div class="col-12" align=center>
                                <input type="submit" type="submit" value="{{ __('home.createCommonCard_2') }}" class="primary" />
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection
