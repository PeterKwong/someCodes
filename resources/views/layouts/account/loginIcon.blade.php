<a class="" href="{{ url(app()->getLocale()).'/account' }}">
  @if( Auth::user() &&  !empty(Auth::user()->image_url))

      <img style="border-radius: 70%; opacity: 0.8" width="30" src="{{ Auth::user()->image_url }}">
    
  @else
    <i class="fa fa-lg fa-user-circle"></i>

  @endif
  


</a>