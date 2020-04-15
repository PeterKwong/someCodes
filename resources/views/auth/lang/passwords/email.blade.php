@extends('layouts.appBM')

@section('content')

<br>

<article class="message is-primary">
  <div class="message-header">
            <strong><p >{{__('login.Reset Password')}}</p></strong>
            <a class="button is-info" href="{{ url(app()->getLocale()) }}/login">{{__('login.Login')}}</a>
  </div>
  <div class="message-body">


<div class="columns is-mobile is-centered">
    <div class="column is-8-desktop">
        <form class="" method="POST" action="{{ route('password.email') }}">

                        {{ csrf_field() }}
                <div class="columns is-centered is-mobile">
                    <div class="column is-6">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <div class="field" >
                          <label for="email" class="label">{{__('login.E-Mail Address')}}</label>

                          <p class="control has-icons-left has-icons-right">
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('login.E-Mail Address')}}">
                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                              <i class="fas fa-check"></i>
                            </span>
                          </p>

                            @if ($errors->has('email'))
                                <span class="help-block" >
                                    <strong><p style="color: red">{{ $errors->first('email') }}</p></strong>
                                </span>
                            @endif

                        </div>
                        


                        <div class="field">
                          <p class="control">
                            <button class="button is-success">
                                    {{__('login.Send Password Reset Link')}}
                            </button>
                          </p>

                        </div>

                    </div>
                </div>


                    </form>

            </div>
        </div>


  </div>
</article>




@endsection




