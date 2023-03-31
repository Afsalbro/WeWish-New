@extends('themelayouts.app')
@section('content')
    <div id="page-wrapper">
        <!-- Header -->
        <header id="header">
            <h1><a href="#">We Wish</a></h1>
        </header>
        <article id="main">
            <section class="wrapper style5">
                <div class="inner">
                    <h2 align=center>Pour continuer la création de la carte commune, merci de vous identifier</h2>
                    <br>
                    <section>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row gtr-uniform">
                                <div class="col-4 col-12-xsmall">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4 col-12-xsmall">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-4 col-12-xsmall" align=center>
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('Se connecter') }}
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
                            <a align=center href="{{route('register')}}" >Créer un compte</a>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection
