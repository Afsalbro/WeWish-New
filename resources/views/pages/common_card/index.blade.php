@extends('themelayouts.app')
@section('content')
    <!-- Main -->
    <article id="main">
        <header>
            <h2>Salut {{ auth()->user()->name }} !
            </h2>
            <p>Bienvenu dans ton espace carte commune</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">

                @php
                    
                    echo '<h3 align=center>Liste des projets :</h3>';
                    
                    echo '<table>';
                    // dd($projects);
                    if (!empty($projects[0])) {
                        foreach ($projects as $key => $ligne) {
                            echo '<tr>';
                            echo '<td>';
                            echo $ligne->name;
                    
                            echo "</td><td>
                            <a href='" .
                                route('wish_card.show', $ligne->id) .
                                "'>Plaçer les mots</a>
                                            </td><td>
                                        <a href='#'>Acheter la carte</a></td></tr>";
                        }
                    } else {
                        echo "<tr><td align=center>Tu n'as pas créé de projet ! </td></tr>";
                    }
                    echo "</table>
                                                 <div class='col-12' align='center'>
                                                    <a align=center; href='" .
                        route('wish_card.index') .
                        "' class='button'><span >Créé ta carte sans attendre !</span></a>
                                                </div>";
                    
                @endphp
                <br>

                <h3 align=center>Mes informations :</h3>

                <form method="post" action="{{ route('update.profile', auth()->user()->id) }}">
                    @csrf
                    <div class="row gtr-uniform">

                        <div class="col-12 col-12-xsmall">
                            <label>E-mail de contact : </label><input type="email" name="email" id="mail"
                                value="{{ auth()->user()->email }}" placeholder="Saisie mail*" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <label>Votre nom :</label><input type="text" name="name" id="nom"
                                value="{{ auth()->user()->name }}" placeholder="Votre nom*" />
                        </div>

                        @php
                            if (!empty(auth()->user()->dob)) {
                                $date = date('d/m/Y', strtotime(auth()->user()->dob));
                            }else{
                                $date = '';
                            }
                        @endphp

                        <div class="col-6 col-12-xsmall">
                            <label>Votre anniversaire :</label><input type="text" name="dob" id="ddn"
                                value="{{ $date }}" placeholder="Anniv (JJ/MM/AAAA) 🎁 🎉*">
                        </div>

                        <div class="col-12 col-12-xsmall" align=center>
                            <label>Confirmer votre mot de passe pour valider les modifications</label>
                            <input type="password" name="mdp" id="mdp" value=""
                                placeholder="Saisir mot de passe*" />
                        </div>
                        <div class="col-12"></div>


                        <div class="col-12" align=center>

                            <input type="submit" value="Mettre à jour mes informations" class="primary" />

                        </div>
                    </div>
                </form>
            </div>
        </section>
    </article>
@endsection
