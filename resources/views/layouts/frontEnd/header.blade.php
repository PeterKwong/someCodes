<header class="fixed top-0 bg-white z-50 w-full bg-white py-2 lg:py-0 shadow-bottom" id="td-header">
    <!-- Header for Desktop  -->
     
    @include('layouts.frontEnd.header-desktop')

    @include('layouts.frontEnd.header-mobile')
esfsfd

    <!-- <div x-data="{ cartOpen : false}" class="flex flex-col lg:hidden">
        <div x-show="cartOpen" class="sidebar">
            
        </div>
    </div> -->

    <div id="header" >
        <shopping-cart-progress></shopping-cart-progress>
        
<!--         <x-floating-contact/>
 -->
    </div>

</header>

<div class="mb-16 lg:mb-52" id="header" ></div>

@livewire('notification.flash')

sudo chmod -R 777 /var/www/laravel/storage/logs