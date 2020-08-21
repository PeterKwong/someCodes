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
          <div class="flex justify-between text-white bg-blue-400 border p-2 px-2">
            <div class="">
               <strong><p >{{__('login.Login')}}</p></strong>
                      
            </div>
            <div class="">
              <a class="btn btn-primary bg-green-400" href="{{ url(app()->getLocale()) }}/register">{{__('login.Register')}}</a>
            </div>
          </div>

          <div class="grid grid-cols-12 border background-primary-op-008">
            <div class="col-span-12 sm:col-span-6 sm:col-start-4">
              <div class="grid grid-cols-12" >
                  <div class="col-span-12 p-4">
                    @include('auth.lang.socialLogin')
                  </div>
              </div>
              <div class="grid grid-cols-12">
                <div class="col-span-12">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                                      {{ csrf_field() }}
                              <div class="grid grid-cols-12 p-8">
                                  <div class="col-span-12">

                                      <div class="p-2" >
                                        <label for="email" class="control-label">{{__('login.E-Mail Address')}}</label>

                                        <p class="">
                                          <input id="email" type="email" class="input w-9/12" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('login.E-Mail Address')}}">
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
                                      
                                      <div class="p-2">
                                          <label for="password" class="control-label">{{__('login.Password')}}</label>

                                        <p class="">
                                          <input id="password" type="password" class="input w-9/12" name="password" placeholder="{{__('login.Password')}}" required>
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

                                      <div class="p-2">
                                          <div class="control">
                                              <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('login.Remember Me')}}
                                                  </label>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="p-2">
                                        <p class="control">
                                          <button class="btn btn-primary bg-green-400">
                                            {{__('login.Login')}}
                                          </button>
                                        </p>

                                          <a class="text-blue-600" href="{{ url(app()->getLocale()) }}/password/request">
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



