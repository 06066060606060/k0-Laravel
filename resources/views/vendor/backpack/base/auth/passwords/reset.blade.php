@extends(backpack_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
                <a href="/">
                    <img class="w-auto pb-4 mx-auto h-auto" src="/img/logo-mobile.webp" alt="Gokdo" width="354" title="Gokdo Sondages rémunérés" height="96" class="w-auto h-24">
                </a>
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Mot de passe oublié')}}</h1>

            <div class="nav-steps-wrapper">
                <ul class="nav nav-tabs">
                      <li class="nav-item"><a class="nav-link disabled text-muted"><strong>{{ trans('backpack::base.step') }} 1.</strong> {{ trans('backpack::base.confirm_email') }}</a></li>
                      <li class="nav-item active"><a class="nav-link active"><strong>{{ trans('backpack::base.step') }} 2.</strong> {{ trans('backpack::base.choose_new_password') }}</a></li>
                </ul>
            </div>
            <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="col-md-12 p-t-5" role="form" method="POST" action="{{ route('backpack.auth.password.reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="control-label" for="email">{{ trans('backpack::base.email_address') }}</label>

                            <div>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ $email ?? old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ trans('backpack::base.new_password') }}</label>

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
                            <label class="control-label" for="password_confirmation">{{ trans('backpack::base.confirm_new_password') }}</label>
                            <div>
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.change_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                  </div>
                  {{-- /.tab-pane --}}
                </div>
                {{-- /.tab-content --}}
              </div>
        </div>
    </div>
@endsection
