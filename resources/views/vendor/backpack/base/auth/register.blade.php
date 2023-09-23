@extends(backpack_view('layouts.plain'))
 {!! RecaptchaV3::initJs() !!}
@section('content')
@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
@endphp
@php $locale = app()->getLocale();
$localizedTitles = [
            'en' => 'OR',
            'fr' => 'OU',
            'es' => 'O',
            'de' => 'ODER',
            'it' => 'O',
        ];
        $iclassic = $localizedTitles[$locale] ?? '';
// Traduction Multi Langues minifiée
switch($locale){case'en':$rules="By signing up, you accept the";$rules2="rules";$iclassique='Classic Registration';break;case'fr':$rules="En vous iscrivant vous acceptez le";$rules2="règlement";$iclassique='Inscription Classique';break;case'es':$rules="Al registrarte, aceptas el";$rules2="reglamento";$iclassique='Registro Clásico';break;case'de':$rules="Durch Ihre Anmeldung akzeptieren Sie die";$rules2="Bestimmungen";$iclassique='Klassische Anmeldung';break;case'it':$rules="Iscrivendoti, accetti il";$rules2="regolamento";$iclassique='Registrazione Classica';break;default:break;}
@endphp 
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-4">
            <a href="{{ str_replace('https://gokdo.com/admin/login', 'https://gokdo.com', route('backpack.auth.login')) }}"><img class="pb-2 mx-auto w-[240px]" src="{{ asset('img/logo.png') }}"></a>
            <div class="card">
                <div class="card-body">
                    <form class="col-md-12" role="form" method="POST" action="{{ url('/admin/register') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="parrain" value="{{ request()->input('parrain') }}">
                        <div class"form-group">
                        <div>
                       <!--  <a href="{{ route('socialite.redirect', 'google') }}" class="border btn btn-block">
                                    <div class="flex justify-center">
                                        <svg class="w-6 h-6 mx-2" viewBox="0 0 40 40">
                                            <path
                                                d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                                fill="#FFC107" />
                                            <path
                                                d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                                fill="#FF3D00" />
                                            <path
                                                d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                                fill="#4CAF50" />
                                            <path
                                                d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                                fill="#1976D2" />
                                        </svg>

                                        <span class="py-1 text-sm"> {{ trans('backpack::base.register') }} via Google</span>
                                    </div>
                                </a>-->

                               <!-- <a href="{{ route('socialite.redirect', 'facebook') }}" class="btn btn-block btn-primary">
                                    <div class="flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            class="w-6 h-6 mx-2">
                                            
                                            <path fill="currentColor"
                                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                        </svg>

                                        <span class="py-1 text-sm"> {{ trans('backpack::base.register') }} via Facebook</span>
                                    </div>
                                </a>-->
                                </div>
                                </div>
                        <!--<div class="divider">
                            <span class="divider-text">{{ $iclassic }}</span>
                        </div>-->
                        <style>
                        .divider {
                        display: flex;
                        align-items: center;
                        margin-top:10px;
                        }

                        /* Style for the horizontal line */
                        .divider::before,
                        .divider::after {
                        content: "";
                        flex: 1;
                        border-bottom: 1px solid #000; /* You can change the color and size of the line here */
                        }

                        /* Style for the text "ou" */
                        .divider-text {
                        padding: 0 10px;
                        font-weight: bold;
                        color: #000; /* You can change the text color here */
                        }
                        </style>
                        
                                <style>
                        #show,#content{display:block;}
                        #show:checked~#content{display:block;}
                        </style>
                       <!--<input type=checkbox id="show">
                        <label for="show"class="mt-2 border btn btn-block" style="cursor:pointer;"><i class="mr-2 fa fa-user"></i> {{ $iclassique }}</label>-->
                        <span id="content">
                        <div class="form-group">
                            <!--<label class="control-label" for="name">Pseudo</label>-->

                            <div>
                            
                            @php
                            $code = null;
                            do {
                            $lettres = strtoupper(Str::random(4));
                            $chiffres = rand(1000, 9999);
                            $code = $lettres . $chiffres;
                            $user_verif = DB::table('users')->where('name', $code)->first();
                            } while ($user_verif !== null);     
                            @endphp
                                <input type="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ $code }}">
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="{{ backpack_authentication_column() }}">{{ config('backpack.base.authentication_column_name') }}</label>

                            <div>
                                <input type="{{ backpack_authentication_column()=='email'?'email':'text'}}" class="form-control{{ $errors->has(backpack_authentication_column()) ? ' is-invalid' : '' }}" name="{{ backpack_authentication_column() }}" id="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}">

                                @if ($errors->has(backpack_authentication_column()))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(backpack_authentication_column()) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>

                            <div>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>
                            <div>
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! RecaptchaV3::field('register') !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if ($errors->has('parrain'))
                            <span class="invalid-feedback">
                            <strong>Le parrain entré n'existe pas !</strong>
                            </span>
                        @endif
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.register') }}
                                </button>


                            </div>
                        </div>
                      </span>
                    </form>
                    @if(!empty(request()->input('parrain')))
    @php
        $parrain = \App\Models\User::where('name', request()->input('parrain'))->first();
    @endphp
    @if($parrain)
        @php $count = \App\Models\User::where('parrain', request()->input('parrain'))->count(); @endphp
        <center><b>{{__('Parrain :')}} {{ request()->input('parrain') }} </b></center>
    @else
        <div class="alert alert-danger mb-0 mt-4 text-center">
            {{__("Le parrain indiqué n'existe pas")}}
        </div>
    @endif
@endif

                      @if (backpack_users_have_email() && config('backpack.base.setup_password_recovery_routes', true))
                <br>
            @endif
            <div class="text-center"><a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a> /
            <a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
               <div class="text-center"><br>{{ $rules }} <a href="{{ str_replace('/admin/login', '/reglement', route('backpack.auth.login')) }}">{{ $rules2 }}</a>
                </div></div>
            </div>
          
        </div>
    </div>
@endsection
