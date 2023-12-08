@extends('layouts.head_forms')
@section('title')
    تسجيل دخول
@endsection
@section('style')
    <style>
        .bg{
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 30px 10px 30px 10px;
            position: relative;
            background: rgba(0, 0, 0, 0.277); 
            box-shadow: 0 0 12px 0px rgb(0, 183, 255);
        }
        .bg input{
            margin-bottom: 10px
        }
        .title h1{
            text-align: center;
            font-size: 40px !important;
            margin-bottom: 20px
        }
        label{
            font-size: 20px;
        }
        .mes{
            background-color: #fff !important;
            padding: 20px;
            border-radius: 10px !important;
            text-align: center;
        }.sec{
            margin-top: 200px;
        }
    </style>
@endsection

@section('body')
    <form class="php-email-form" method="POST" action="{{ route('login') }}">
        @csrf
        <section class="sec">
            <div class="container">
                <div class="row justify-content-center" >
                    <div id="createaccount " class="col-lg-5 mt-5 mt-lg-0 d-flex align-items-stretch" >
                        <div class="tooltip-demo">
                            <div class="row bg" dir="rtl" data-aos="flip-right">
                                <div class="title text-white">
                                    <h1 class="text-white" >تسجيل دخول</h1>
                                    <hr>
                                </div>
                                <div class="row" dir="rtl" style="margin-right: 0px">
                                    <div class="form-group">
                                        <label for="email">{{ __('الايميل') }}</label>
                                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('كلمة المرور') }}</label>
                                        <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <div class="form-group col-md-6 {{$errors->has('g-recaptcha-response') ? 'has-error' : ''}}">
                                            <label for="password">{{__('captcha')}}</label>
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                                
                                            @endif
                                        </div> --}}
                                        <div class="row my-2">
                                            <div class="col-md-6 ">
                                                <div class="form-check">
                                                    
                                                    <label class="form-check-label" for="remember">
                                                        {{__('تــذكــرنــي')}}
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-1 mt-2">
                                        <div class="col-sm-6">
                                            <a href="{{ route('register.index') }}" style="font-size: 20px; color: #93e0ff;"> ليس لدي حساب ؟</a>
                                        </div>
                                        <div class="col-sm-6">
                                            @if (Route::has('password.request'))
                                            <a class="" href="{{ route('password.request') }}" style="font-size: 20px; color: #93e0ff;">
                                                {{ __('هل نسيت كلمة المرور؟') }}
                                            </a>
                                            @endif
                                        </div>
                                        </div>
                                    </div><hr>
                                    <div class="text-center"><button class="btn btn-primary shadownext col-md-7 text-white">{{ __('تـسـجـيـل دخـــول') }}</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection







