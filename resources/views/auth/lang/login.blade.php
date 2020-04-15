@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('jewellery.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('jewellery.metaDescription2')}} - {{trans('home.meta2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('jewellery.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('jewellery.metaDescription2')}} - {{trans('home.meta2')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('jewellery.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('jewellery.metaDescription2')}} - {{trans('home.meta2')}}" /> 
        <meta property="og:site_name" content="{{trans('jewellery.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>
          <div class="row justify-content-between color-white background-primary border">
            <div class="col-auto mr-auto">
               <strong><p >{{__('login.Login')}}</p></strong>
                      
            </div>
            <div class="col-auto">
              <a class="btn btn-success" href="{{ url(app()->getLocale()) }}/register">{{__('login.Register')}}</a>
            </div>
          </div>

          <div class="row justify-content-center border background-primary-op-008">
            <div class="col">
              <div class="row justify-content-center" >
                  <div class="col-md-6">
                    @include('auth.lang.socialLogin')
                  </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-6">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                                      {{ csrf_field() }}
                              <div class="row justify-content-center">
                                  <div class="col-md-8">

                                      <div class="form-group" >
                                        <label for="email" class="control-label">{{__('login.E-Mail Address')}}</label>

                                        <p class="control has-icons-left has-icons-right">
                                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('login.E-Mail Address')}}">
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
                                      
                                      <div class="form-group">
                                          <label for="password" class="control-label">{{__('login.Password')}}</label>

                                        <p class="control has-icons-left">
                                          <input id="password" type="password" class="form-control" name="password" placeholder="{{__('login.Password')}}" required>
                                          <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                          </span>
                                        </p>

                                          @if ($errors->has('password'))
                                              <span class="help-block" >
                                                  <strong><p style="color: red">{{ $errors->first('password') }}</p></strong>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="form-group">
                                          <div class="control">
                                              <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('login.Remember Me')}}
                                                  </label>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="field">
                                        <p class="control">
                                          <button class="btn btn-success">
                                            {{__('login.Login')}}
                                          </button>
                                        </p>

                                          <a class="" href="{{ url(app()->getLocale()) }}/password/request">
                                              {{__('login.Forgot Your Password?')}}
                                          </a>
                                      </div>

                                  </div>
                              </div>


                            </form>

                  </div>
                </div>

            </div>
          </div>

          
<!-- 
          <article class="message is-primary">

            <div class="message-body">



          <div class="row is-mobile is-centered">
              <div class="col is-8-desktop">
                  <form class="" method="POST" action="{{ route('login') }}">

                                  {{ csrf_field() }}
                          <div class="row is-centered is-mobile">
                              <div class="col is-6">

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
                                      <label for="password" class="label">{{__('login.Password')}}</label>

                                    <p class="control has-icons-left">
                                      <input id="password" type="password" class="input" name="password" placeholder="{{__('login.Password')}}" required>
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                      </span>
                                    </p>

                                      @if ($errors->has('password'))
                                          <span class="help-block" >
                                              <strong><p style="color: red">{{ $errors->first('password') }}</p></strong>
                                          </span>
                                      @endif
                                  </div>

                                  <div class="field">
                                      <div class="control">
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('login.Remember Me')}}
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="field">
                                    <p class="control">
                                      <button class="button is-success">
                                        {{__('login.Login')}}
                                      </button>
                                    </p>

                                      <a class="" href="{{ url(app()->getLocale()) }}/password/request">
                                          {{__('login.Forgot Your Password?')}}
                                      </a>
                                  </div>

                              </div>
                          </div>


                              </form>

                      </div>
                  </div>

            
            </div>
          </article> -->

    @endSection



