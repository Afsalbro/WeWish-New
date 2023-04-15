{{-- @extends('layouts.app') --}}
@extends('themelayouts.app')
@section('content')
    <header id="header">
        <h1><a href="{{ url('/home') }}">La carte commune</a></h1>
    </header>
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h4>Form</h4>
                    <form method="post" action="{{ route('store.wishes') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gtr-uniform">

                            <div class="col-12 col-12-xsmall">
                                <input type="hidden" name="id" value="{{ $project->id }}">
                                <h2>project: {{ $project->name }}</h2>
                            </div>

                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="name" id="name"
                                    class="@error('name') is-invalid @enderror" placeholder="Name"
                                    value="{{ !empty(auth()->user()->name) ? auth()->user()->name : old('name') }}" />

                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="email" id="email"
                                    class="@error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ !empty(auth()->user()->email) ? auth()->user()->email : old('email') }}" />

                            </div>
                            <div class="col-6 col-12-medium">
                                <input type="hidden" class="active-type" name="active" value="Text">
                                <ul class="actions small">
                                    <li><input type="button" class="button primary small light-button active"
                                            value="Text" attr="tx-msg" /></li>
                                    <li><input type="button" class="button primary small light-button" value="Gif"
                                            attr="gif-msg" />
                                    </li>
                                    <li><input type="button" class="button primary small light-button" value="Video"
                                            attr="vd-msg" />
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="category" value="{{ $card->category }}">
                                category: {{ $card->categoryN }}
                                </select>

                            </div>
                            <div class="col-12">
                                <label for="" class="tx-msg message-area">Text Message</label>
                                <textarea name="message" id="message" class="tx-msg @error('message') is-invalid @enderror message-area"
                                    placeholder="Enter your message" rows="6">{{ old('message') }}</textarea>

                                <label for="" class="vd-msg message-area">Video Message</label>
                                <input type="file" name="video" class="form-control vd-msg message-area"
                                    accept="video/*" />

                                <label for="" class="gif-msg message-area">GIF Message</label>
                                <input type="file" name="gif" class="form-control gif-msg message-area"
                                    accept="image/gif" />
                                {{-- @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror --}}
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
@endsection
