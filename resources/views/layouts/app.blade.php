@extends('themelayouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.index') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{-- @yield('content') --}}
            {{-- <header id="header">
                <h1><a href="{{ url('/home') }}">La carte commune</a></h1>
            </header> --}}
            <article id="main">
                <section class="wrapper style5">
                    <div class="inner">
                        <section>
                            <h4>Form</h4>
                            <form method="post" action="">
                                @csrf
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-12-xsmall">
                                        <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-12-medium">
                                        <ul class="actions small">
                                            <li><a href="#" class="button primary small">Text</a></li>
                                            <li><a href="#" class="button primary small">Gif</a></li>
                                            <li><a href="#" class="button primary small">Video</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <select name="category" id="demo-category" class="@error('category') is-invalid @enderror">
                                            <option value="">-Select the Category -</option>
                                            <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>Happy BirthDay</option>
                                            <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Happy Anniversary</option>
                                            <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Happy Retirement</option>
                                            <option value="4" {{ old('category') == '4' ? 'selected' : '' }}>Our Condolonces</option>
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" id="message" class="@error('message') is-invalid @enderror" placeholder="Enter your message" rows="6">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <ul class="actions">
                                            <li><input type="submit" value="Send Message" class="primary" /></li>
                                            <li><input type="reset" value="Reset" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </section>
            </article>
        </main>
    </div>
</body>
</html>
