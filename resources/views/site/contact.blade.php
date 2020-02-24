@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 reveal">
        <h3>Notre adresse</h3>
        <div class="padding-as25 lgray-bg">
            <p class="big">Lot n°632, Extension du village de Ngor<br>
                Dakar - Senegal</p>
            <p>Notre email: <a href="#"><strong style="color: tomato !important;">s3investissement@gmail.com</strong></a> ou appelez-nous au<strong>
                    (+221) 33 825 82 92
                    |
                    (+221) 77 390 12 63
                    |
                    (+221) 77 472 39 46
                </strong></p>
        </div>
    </div>

    <div class="col-md-12">
        <br/>
        <h3 class="reveal-2">Laissez nous un message</h3>
            <form class="forma reveal-3" method="post" action="{{ route('save_mess_two') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nom</label>
                        <input required type="text" name="name" class="form-control" placeholder="saisir votre nom">
                        @if($errors->has('name'))
                        <span style="color: red" class="small">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input required type="email" name="email" class="form-control" placeholder="saisir votre adresse e-mail">
                        @if($errors->has('email'))
                        <span style="color: red" class="small">{{ $errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label>Téléphone</label>
                        <input required type="text" name="phone" class="form-control" placeholder="saisir votre numéro de téléphone">
                        @if($errors->has('phone'))
                        <span style="color: red" class="small">{{ $errors->first('phone')}}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label>Message</label>
                        <textarea required class="form-control" name="message" placeholder="saisir votre message"></textarea>
                        @if($errors->has('message'))
                        <span style="color: red" class="small">{{ $errors->first('message')}}</span>
                        @endif
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                        @if($errors->has('g-recaptcha-response'))
                        <span>
                <strong style="color: red">{{ $errors->first('g-recaptcha-response')}}</strong>
               </span>
                        @endif
                        <p hidden class="alert ">{{ $message = Session::get('message')}}</p>
                        @if($message)
                        <p style="color: #1a741a; font-family: 'Manjari Regular'" class="data-notify=" message"> {{$message }}
                        </p>
                        {{ Session::put('message',NULL) }}
                        @endif
                    </div>
                </div>
                <div  style="padding-left: 16px" class="row">
                    <button type="submit" class="btn btn-primary pull-left">
                        <i class="fa fa-send" style="color: white"></i>
                        Envoyer
                    </button>
                </div>

            </form>
        <div class="clearfix"></div>
        <div id="message"></div>
    </div>
@endsection