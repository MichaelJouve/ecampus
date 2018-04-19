@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!-- Debut de la messagerie -->
                <div id="box-messagerie">
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12 text-center" id="bandeau_naviguation">--}}
                            {{--<h1><img src="{{asset('images/messagerie.png')}}" alt="Bandeau des preferences" class="img-fluid">Votre messagerie : Envoyer/Recevoir des messages</h1>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-lg-9" id="contenu-message">--}}
                            {{--<div id="description-message" class="col-12">--}}
                                {{--<h3>Damien THIBAULT</h3>--}}
                                {{--<p>Notre conversation secrète...</p>--}}
                            {{--</div>--}}
                            {{--<div class="row align-items-center">--}}
                                {{--<div id="message-contact" class="col-5 offset-1 mt-2">--}}
                                    {{--<p class="expediteur">Damien</h4>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos repudiandae quod odio eius ipsam impedit consectetur cum consequuntur sapiente amet, magni quidem voluptate voluptatem, saepe quasi ipsum animi libero ducimus.</p>--}}
                                    {{--<span>04.58PM</span>--}}
                                {{--</div>--}}
                                {{--<div id="message-personnel" class="offset-6 col-5 mt-2">--}}
                                    {{--<p class="expediteur">Moi</h4>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos repudiandae quod odio eius ipsam impedit consectetur cum consequuntur sapiente amet, magni quidem voluptate voluptatem, saepe quasi ipsum animi libero ducimus.</p>--}}
                                    {{--<span>04.58PM</span>--}}
                                {{--</div>--}}
                                {{--<div id="message-contact" class="col-5 offset-1 mt-2">--}}
                                    {{--<p class="expediteur">Damien</h4>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos repudiandae quod odio eius ipsam impedit consectetur cum consequuntur sapiente amet, magni quidem voluptate voluptatem, saepe quasi ipsum animi libero ducimus.</p>--}}
                                    {{--<span>04.58PM</span>--}}
                                {{--</div>--}}
                                {{--<div id="message-personnel" class="offset-6 col-5 mt-2">--}}
                                    {{--<p class="expediteur">Moi</h4>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos repudiandae quod odio eius ipsam impedit consectetur cum consequuntur sapiente amet, magni quidem voluptate voluptatem, saepe quasi ipsum animi libero ducimus.</p>--}}
                                    {{--<span>04.58PM</span>--}}
                                {{--</div>--}}
                                {{--<div class="offset-1  mt-3 col-10" id="post-message">--}}
                                    {{--<form action="" method="post" id="formulaire-envoi-message">--}}
                                        {{--<div class="form-group row">--}}
                                            {{--<input type="text" class="form-control offset-1 col-10" id="message" name="message" placeholder="Votre message.. ">--}}
                                            {{--<button type="submit" class="btn btn-success ml-2">--}}
                                                {{--<i class="fas fa-location-arrow"></i>--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-3 col-12" id="naviguation-message">--}}
                            {{--<p class="title text-center"><a href="#"> <i class="fas fa-plus" style="color:#444; margin-right: 10px;"></i> </a> Vos conversations</p>--}}
                            {{--<div id="onglet-message">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="image-contact-message col-2">--}}
                                        {{--<img src="{{asset('images/Users/Damien.png')}}" alt="Image du contact du message" class="img-fluid">--}}
                                    {{--</div>--}}
                                    {{--<div class="infos-contact-message col-8">--}}
                                        {{--<p>Damien Thibault</p>--}}
                                        {{--<p>Les premiers mots du contenu du message...</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="date-message col-2 ">--}}
                                        {{--<p>09.58 AM</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="onglet-message">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="image-contact-message col-2">--}}
                                        {{--<img src="{{asset('images/Users/Romaric.png')}}" alt="Image du contact du message" class="img-fluid">--}}
                                        {{--<span>+1</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="infos-contact-message col-8">--}}
                                        {{--<p>Romaric Gilson</p>--}}
                                        {{--<p>Les premiers mots du contenu du message...</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="date-message col-2">--}}
                                        {{--<p>06.08 AM</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="onglet-message">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="image-contact-message col-2">--}}
                                        {{--<img src="{{asset('images/Users/Anthony.png')}}" alt="Image du contact du message" class="img-fluid">--}}
                                    {{--</div>--}}
                                    {{--<div class="infos-contact-message col-8">--}}
                                        {{--<p>Anthony Baptiste</p>--}}
                                        {{--<p>Les premiers mots du contenu du message...</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="date-message col-2">--}}
                                        {{--<p>04.58 AM</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!--****************  FIN DE MESSAGERIE   ************************************************** -->
            </div>
        </div>
    </div>
@endsection
