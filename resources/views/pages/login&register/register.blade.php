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
                    <h2 align=center>S'il vous plait enregistrez vous</h2>
                    <br>
                    <section>
                        <form method="POST" action="{{ route('register.perform') }}">
                            @csrf
                            <div class="row gtr-uniform">
                                <div class="col-3 col-12-xsmall">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-3 col-12-xsmall">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-3 col-12-xsmall">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-3 col-12-xsmall" align=center>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="col-12" style="text-align: center">
                            <a align=center href="{{route('login')}}">veuillez vous connecter</a>
                        </div>
                    </section>
                </div>
            </section>
        </article>
    </div>
@endsection
