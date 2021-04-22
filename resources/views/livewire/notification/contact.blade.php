<div>
    
@if(cache()->get('homePageShow') == 1)
	{{ session()->put('notification', $companyInfo ) }}
@endif


@if( session()->has('notification') && count( request()->segments() ) == 0)

  <div class="z-10" x-data="{ open: true }" x-show="open">
    <div x-on:click="open = !open" >
      <transition name="modal" >
        <div class="modal-mask">
          <button tabindex="-1" class="modal-button"></button>          
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-centered" role="document" x-on:click="open = !open">
              <div class="modal-content">
                <div class="modal-header border-b">

                  <h5 class="modal-title"></h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" x-on:click="open = !open">&times;</span>
                  </button>
                </div>

                <div class="modal-body p-2">
                  <div class="grid grid-cols-12">

                    <div class="col-span-12">
                      <div class="content">
                        <p class="text-2xl p-1 text-center">
                          <strong>{{ __('home.Please Note') }}</strong> <small>@Admin</small>
                          <br>
                        </p> 
                        <p class="is-info p-2">
                          {!! session()->get('notification') !!}
                        </p>
                        <a href="{{app()->getLocale()}}/about-us" target="_blank">
                          <i class="fas fa-search-plus"></i>
                          {{__('home.Any inquiry, please contact') }}
                        </a>

                         <div class="flex p-1">
                          <x-contacts/>
                        </div>

                      </div>

                    </div>
                  </div>



                </div>






              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
@endif



</div>
