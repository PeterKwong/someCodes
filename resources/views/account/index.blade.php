@extends('layouts.section.account')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('home.meta1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('home.webTitle')}}"> 
        <meta itemprop="keywords" content="{{trans('home.keywords')}}"> 
        <meta itemprop="description" content="{{trans('home.meta1')}}""> 
        <meta itemprop="image" content="{{url("/front_end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('home.webTitle')}}" /> 
        <meta property="og:type" content="article" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/front_end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('home.meta1')}}" /> 
        <meta property="og:site_name" content="{{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" /> 
        <meta property="article:section" content="Article Section" /> 
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
        <meta property="fb:admins" content="https://www.facebook.com/tingdiamonds/" />

    @endSection

    @section('content')
        <br>
                <div class="col-10 " id="account">

                    <p class="title is-4"></p>

                    <div class="row justify-content-center">

                      <div class="col-sm-8 box">
                        <article class="message is-info">
                          <div class="message-header">
                            <p>{{__('account.My Account')}}</p>
                          </div>
                          <div class="message-body">
                            <p class="subtitle is-5"> {{ auth()->user()->name }}, 
                            <small> {{__('account.welcome to your account')}}!</small>
                            </p>
                            <p class=""> {{__('account.You are logged in as')}} 
                                <strong>{{ auth()->user()->email }}</strong>
                            </p>
                          </div>
                        </article>
                      </div>

                    </div>

                    <div class="row justify-content-center">

                      <div class="col box">
                        <article class="message is-link">
                          <div class="message-body">
                            <a class="subtitle is-4" href="{{ url(app()->getLocale()) }}/account/setting">{{__('account.My Details')}}</a>
                            <p><small>{{__('account.Manage account details')}}</small></p>
                          </div>
                        </article>                        
                      </div>
                      <div class="col box ">
                        <article class="message is-link">
                          <div class="message-body">
                            <a class="subtitle is-4" href="{{ url(app()->getLocale()) }}/shopping-cart">{{__('account.Shopping Cart')}}</a>
                            <p><small>{{__('account.Browse your favorite items')}}</small></p>
                          </div>
                        </article>
                      </div>
                      <div class="col box">
                        <article class="message is-link">
                          <div class="message-body">
                            <a class="subtitle is-4" href="{{ url(app()->getLocale()) }}/account/pending">{{__('account.Pending Orders')}}</a>
                            <p><small>{{__('account.Manage your orders and ask for services')}}</small></p>
                          </div>
                        </article>
                      </div>                      

                    </div>


                </div>


    @endSection
