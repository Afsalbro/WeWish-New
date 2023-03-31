@extends('themelayouts.app')
@section('content')
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>La carte commune </h2>
            <p>Anniversaire, pot de départ, voeux ... évitez de courrir derière tous le monde le jour J <br />

            <ul class="actions special">
                <li><a href="{{ url('/card') }}" class="button primary">Créer votre carte</a></li>
            </ul>
        </div>
        <a href="#two" class="more scrolly">Comment ça marche?</a>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style1 special">
        <div class="inner">
            <header class="major">
                <h2>Pourquoi la carte commune ?</h2>
                <p>Les amis ou la famille qui se trouve à 500 km, peuvent enfin écrire un mot dessus<br></p>
                <p> Plus besoin de cacher la carte, ou de la faire passer à la dernière minute</p>
                <p> Chacun peut personnaliser à sa manière sous le contrôle du créateur de la carte</p>
            </header>
            <!--<ul class="icons major">
                                        <li><span class="icon fa-gem major style1"><span class="label">Lorem</span></span></li>
                                        <li><span class="icon fa-heart major style2"><span class="label">Ipsum</span></span></li>
                                        <li><span class="icon solid fa-code major style3"><span class="label">Dolor</span></span></li>
                                       </ul>-->
        </div>
    </section>

    <!-- Two -->
    <section id="two">
        <div class="container" style="display: flex; flex-direction: row;width:100%;margin-top:2%;font-size:12px">
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/phone.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/profile.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/contract.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
            <div class="arrow-container"
                style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;justify-content:space-around">
                <img src="{{ asset('assets/images/arrow.png') }}" style="width: 50%;">
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; margin-right: 10px; width:100%;">
                <img src="{{ asset('assets/images/star.png') }}" style="width: 50%;">
                <p style="text-align: center;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis
                    dolores iusto ea pariatur consectetur cum, velit expedita voluptates minus vitae aliquid iure quas
                    quasi! Distinctio, porro. Vel maxime vero saepe.</p>
            </div>
        </div>
    </section>
    <!-- Three -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major">
                <h2>La carte commune c'est des cartes de voeux de créateurs francais, fabriqués en France 🇫🇷 </h2>

            </header>
            <ul class="features">
                <li class="icon solid fa-headphones-alt">
                    <h3>GRATUIT !</h3>
                    <a href="{{ url('/card') }}" class="button primary">La liste des messages</a>
                    <p>Vous souhaitez utiliser les messages sur votre propre support, récupérez la liste des
                        messages gratuitement !</p>
                </li>
                <li class="icon fa-paper-plane">
                    <h3>Carte dès 9,90 €</h3>
                    <a href="{{ url('/card') }}" class="button primary">Créer la carte commune</a>
                    <p>Créer la carte de voeux commune, parmi plusieurs centaines de modèles d'artiste Français
                        partenaire ! Fabrication Francaise !</p>

                </li>

            </ul>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper style4">
        <div class="inner">
            <header>


                <h2>Gérer votre carte commune en cours en vous connectant</h2>

            </header>
            <ul class="actions stacked">
                <div id="container">
                    <!-- zone de connexion -->
                    <form action='connection.php' method='POST'><label><b>Nom d'utilisateur</b></label><input
                            type='email' placeholder='adresse mail' name='username' required><label><b>Mot de
                                passe</b></label><input type='password' placeholder='Mot de passe' name='password'
                            required><br><input type='submit' id='submit' value='Se connecter'>
                </div>
            </ul>
        </div>
    </section>
@endsection
