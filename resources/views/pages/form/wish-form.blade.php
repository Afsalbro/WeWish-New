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
                    <form method="post" action="{{route('wish_card_form.store')}}">
                        @csrf
                        <div class="row gtr-uniform">
                            @php
                                
                                if (isset($id)) {
                                    echo '<div class="col-12 col-12-xsmall">
                                            <input type="hidden" name="id" value="'.$id.'">
                                            <h2>project: '.$name.'</h2>
                                        </div>';
                                } else {
                                    $data = '';
                                    foreach ($projects as $key => $p) {
                                        $data .= '<option value="'. $p['id'] .'">'. $p['name'] .'</option>';
                                    }
                                    echo '<div class="col-12 col-12-xsmall">
                                            <select name="id" id="">
                                                <option value="">- Select Project -</option>
                                               '. $data .'
                                            </select>
                                        </div>';
                                }
                            @endphp

                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="name" id="name"
                                    class="@error('name') is-invalid @enderror" placeholder="Name"
                                    value="{{ old('name') }}" />
                                {{-- @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="email" id="email"
                                    class="@error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}" />
                                {{-- @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror --}}
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
                                    <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>Happy BirthDay
                                    </option>
                                    <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Happy Anniversary
                                    </option>
                                    <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Happy Retirement
                                    </option>
                                    <option value="4" {{ old('category') == '4' ? 'selected' : '' }}>Our Condolonces
                                    </option>
                                </select>
                                {{-- @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="message" class="@error('message') is-invalid @enderror" placeholder="Enter your message"
                                    rows="6">{{ old('message') }}</textarea>
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
