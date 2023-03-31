@extends('themelayouts.app')
@section('content')
    {{-- {{dd($card)}} --}}
    <article id="main">
        <header>
            <h2>Salut !
            </h2>
            <p>Bienvenu dans ton espace carte commune</p>
        </header>
        <section class="wrapper style5">
            <h3 align=center>Liste des message(s) du projet :</h3>
            <div style="border:solid 1px black;width:50%;height:100vh;background-color:white;margin:auto;display:flex">
                <div style="border:solid 1px;width:50%">
                    {{-- {{dd($c)}} --}}
                    <div class="card" style="width: 100%;padding:10px">
                        <div class="card-body">
                            <ul id="sortable">
                                @foreach ($card as $c)
                                    @if ($c->category == '1')
                                        <h5 class="card-title">Happy Birthday</h5> 
                                    @elseif($c->category == '2')
                                        <h5 class="card-title">Happy Anniversary</h5>
                                    @elseif($c->category == '3')
                                        <h5 class="card-title">Happy Retirement</h5>
                                    @elseif($c->category == '4')
                                        <h5 class="card-title">Our Condolonces</h5>
                                    @endif
                                    <p class="card-text">{{ $c->message }}</p>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="border:solid 1px;width:50%;border-left-color:red"></div>
            </div>
            <div class='col-12' align=center style="padding:20px">
                <a align=center; href='' class='button'><span>Retour</span></a>
                <a align=center; href='' class='button'><span>Ecrire un mot</span></a>
                <a align=center; href='' class='button'><span>Télécharger les messages </span></a>
            </div>
        </section>
    </article>
@endsection
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 18px;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }
</style>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js"
    integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#sortable").sortable();
    });
</script>
