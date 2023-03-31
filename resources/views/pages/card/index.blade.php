@extends('themelayouts.app')
@section('content')
    <header id="header">
        <h1><a href="{{ url('/home') }}">La carte commune</a></h1>
    </header>
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h4>Créer votre carte commune !</h4>
                    <form method="GET" action="{{route('register.show')}}">
                        @csrf
                        <div class="row gtr-uniform">
                            <div class="col-12"></div>
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="nomprojet" id="nomprojet" value=""
                                    placeholder="Nom du projet*" required />
                            </div>
                            <div class="col-12"></div>
                            <div class="col-4 col-12-small">
                                <input type="hidden" id="demo-priority-low" value="carte" name="type">
                            </div>
                            <div class="col-12" align=center>
                                <input type="submit" type="submit" value="Creer votre carte commune !" class="primary" />
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection
