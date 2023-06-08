@extends('themelayouts.app')
@section('content')
    <div id="page-wrapper">
        <!-- Header -->
        <header id="header">
            <img src="{{ asset('assets/images/WeWish-2.png') }}"
                 style="height:35px !important; margin-left: 30px; margin-top: 10px;">
        </header>
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    <h2 align=center>{{ __('home.identify') }}</h2>
                    <br>
                    <section>
                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <div class="row gtr-uniform">
                                <div class="col-4 col-12-xsmall">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>


                                </div>
                                <div class="col-4 col-12-xsmall">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                <div class="col-4 col-12-xsmall" align=center>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('home.toLogin') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                        </form>
                        <div class="col-12" style="text-align: center">
                            <a align=center href="{{route('register.index')}}" >     {{ __('home.createAcc') }}</a>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection
