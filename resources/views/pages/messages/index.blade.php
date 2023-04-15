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


                        <div class="card-body" attr="{{ $project->id }}">
                            <ul id="sortable">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="card-title" style="margin: 0px;">project:
                                            {{ $project->name }}
                                        </h5>
                                    </div>
                                    <div class="col-12">
                                        @if ($card->category == '1')
                                            <p style="margin: 0px 0px 10px;"><b>Happy Birthday</b> <span
                                                    class="date-form">{{ $card->created_at->format('m-d-y') }}</span>
                                            </p>
                                        @elseif($card->category == '2')
                                            <p style="margin: 0px 0px 10px;"><b>Happy Anniversary</b> <span
                                                    class="date-form">{{ $card->created_at->format('m-d-y') }}</span>
                                            </p>
                                        @elseif($card->category == '3')
                                            <p style="margin: 0px 0px 10px;"><b>Happy Retirement</b> <span
                                                    class="date-form">{{ $card->created_at->format('m-d-y') }}</span>
                                            </p>
                                        @elseif($card->category == '4')
                                            <p style="margin: 0px 0px 10px;"><b>Our Condolonces</b> <span
                                                    class="date-form">{{ $card->created_at->format('m-d-y') }}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </ul>
                        </div>

                    </div>
                </div>
                <div id="messages-container">
                    @php echo $response; @endphp
                </div>
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
        width: 100%;
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

    // $(document).on({
    //     'click': function() {
    //         $.get("{{ url('wish_card/') }}/" + $(this).attr('attr'), function(data, status) {
    //             $('#messages-container').html(data['data']);
    //         });
    //     }

    // }, '.card-body');
</script>
