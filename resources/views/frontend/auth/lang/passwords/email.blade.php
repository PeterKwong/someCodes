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




