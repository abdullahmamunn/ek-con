@extends('frontend.layouts.index')
@section('content')
<div id="wrapper">
    <div id="content">
        <div class="post" id="post-15">
        <!--	<h2 class="posttitle">Contact Us</h2>  -->
        <div class="postentry">
        <p>Thank you for your interest about <strong><em>EKConsulting</em></strong>. Please leave your queries below, so that we may get in touch.</p>
        <p><strong><br />
        EK  Management  Consulting  Ltd.</strong><br />
        House: 11, Apt.: A3, Road: 82<br />
        Gulshan, Dhaka 1212, Bangladesh</p>
        <div style="position: absolute; left: -5857px;">Lorsque la meilleure salle de poker en ligne au monde se lance dans <a href="https://topcasinosuisse.com/">comment choisir un casino en ligne</a> Un vrai moment de plaisir, incroyablement addictif ! Bien qu&#8217;il y ait de très nombreuses variantes pour les machines à sous, chacune avec leurs propres spécificités, leurs fonctions bonus, leur nombre de rouleaux et de lignes de paiement (la combinaison doit se former une ligne gagnante sur les rouleaux), le principe de base ne varie pas beaucoup d&#8217;une machine à sous à une autre. Notre casino en ligne revue déniche pour vous, cher lecteur, les meilleurs jeux casino, les meilleurs bonus et vous offre une expérience de jeu exceptionnelle. Casino Now a acquis au fil des années une solide expérience pour évaluer les casinos en ligne.</div>
        <div role="form" class="wpcf7" id="wpcf7-f44700-p15-o1" dir="ltr">
        <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
        @if ($errors->any())
        <div class="alert alert-danger" style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       
        <form action="{{route('contact-form')}}" method="post">
        @csrf
        <p>Your Name (required)<br />
            <span>
                <input type="text" name="name" value="" size="40" class="" aria-required="true" aria-invalid="false" />
            </span> 
        </p>
        <p>Your Email (required)<br />
            <span>
                <input type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" />
            </span>
         </p>
        <p>Subject<br />
            <span>
                <input type="text" name="subject" value="" size="40" class="" aria-invalid="false" />
            </span> 
        </p>
        <p>Your Message<br />
            <span>
                <textarea name="message" cols="40" rows="10" class="" aria-invalid="false"></textarea>
            </span>
         </p>
        {{-- <p>Enter Text from Image <input type="hidden" name="_wpcf7_captcha_challenge_captcha-162" value="3313264183" /><img class="wpcf7-form-control wpcf7-captchac wpcf7-captcha-captcha-162" width="84" height="28" alt="captcha" src="http://www.ekconsultingbd.com/wp-content/uploads/wpcf7_captcha/3313264183.png" /> <br />
            <span><input type="text" name="captcha-162" value="" size="40" class="wpcf7-form-control wpcf7-captchar" autocomplete="off" aria-invalid="false" /></span> </p> --}}
        
            <p>
                <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" />
            </p>
        <div class="wpcf7-response-output" aria-hidden="true"></div>
    </form>
    @if(Session::has('message'))
    <h2>{{Session::get('message')}}</h2>
    @endif
    </div>
    </div>
        
    </div>
  
    </div>


</div>
    
@endsection