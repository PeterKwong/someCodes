<div x-data="{ sidebarOpen : false, cartOpen : false}" class="flex flex-col lg:hidden mx-5">
    <div class="flex justify-between items-center lg:hidden">
        <button @click="sidebarOpen = true" class="inline-block lg:hidden focus:outline-none">
            <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.75 15.5H23.25V13H0.75V15.5ZM0.75 9.25H23.25V6.75H0.75V9.25ZM0.75 0.5V3H23.25V0.5H0.75Z" fill="#656565"/>
            </svg>                
        </button>
        <a  class="w-11 h-12" href="{{ $baseUrl }}/">
            <img src="/assets/images/Logo-mobile.png" alt="">
        </a>
        <a href="{{ $baseUrl }}/shopping-cart" class="flex items-center" x-data="{shoppingIconShow:window.mutualVar.cookiesInfo.shoppingCart.items.length}">
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.0026 17.7476C17.3525 17.7476 16.0101 19.09 16.0101 20.7401C16.0101 22.3901 17.3526 23.7326 19.0026 23.7326C20.6527 23.7326 21.9951 22.3901 21.9951 20.7401C21.9951 19.09 20.6527 17.7476 19.0026 17.7476ZM19.0026 21.9371C18.3425 21.9371 17.8056 21.4002 17.8056 20.7401C17.8056 20.0799 18.3425 19.5431 19.0026 19.5431C19.6628 19.5431 20.1996 20.0799 20.1996 20.7401C20.1996 21.4002 19.6628 21.9371 19.0026 21.9371Z" fill="#656565"/>
                <path d="M23.8092 6.1817C23.6392 5.96415 23.3786 5.83726 23.1024 5.83726H5.54159L4.73361 2.45662C4.63695 2.05265 4.27573 1.76746 3.86037 1.76746H0.897755C0.401909 1.76741 0 2.16932 0 2.66516C0 3.16101 0.401909 3.56292 0.897755 3.56292H3.15175L6.06946 15.7713C6.16611 16.1756 6.52733 16.4604 6.9427 16.4604H20.9179C21.3305 16.4604 21.6902 16.1791 21.7893 15.7787L23.9738 6.95074C24.0399 6.68266 23.9792 6.39925 23.8092 6.1817ZM20.2155 14.665H7.65131L5.97069 7.63277H21.9553L20.2155 14.665Z" fill="#656565"/>
                <path d="M8.1397 17.7476C6.4896 17.7476 5.14719 19.09 5.14719 20.7401C5.14719 22.3901 6.48965 23.7326 8.1397 23.7326C9.78976 23.7326 11.1322 22.3901 11.1322 20.7401C11.1322 19.09 9.78976 17.7476 8.1397 17.7476ZM8.1397 21.9371C7.47956 21.9371 6.9427 21.4002 6.9427 20.7401C6.9427 20.0799 7.47956 19.5431 8.1397 19.5431C8.79985 19.5431 9.33671 20.0799 9.33671 20.7401C9.33671 21.4002 8.79985 21.9371 8.1397 21.9371Z" fill="#656565"/>
            </svg>
            <sup class="text-brown" x-show="shoppingIconShow>0" x-text="shoppingIconShow"> 
            </sup>
        </a>
    </div>
    <div x-show="sidebarOpen" class="sidebar">
        <div @click.away="sidebarOpen = false" class="fixed inset-0 w-3/4 p-3 bg-white z-50 border-2 border-sgb-pink h-full overflow-y-scroll">
            <div class="flex flex-col relative">
                <div class="flex py-2">
                    <button class="focus:outline-none" @click="sidebarOpen = false" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                    <li x-data="{ nav: 'hidden', nav2: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/gia-loose-diamonds" class="flex items-center justify-between" @click="nav = 'diamond'">
                            <span>{{trans('header.Diamonds')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'diamond'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.DIAMONDS')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/gia-loose-diamonds" class="flex items-center justify-between">
                                        <span class="text-sm">{{trans('header.Loose Diamond')}}</span>
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/" class="flex items-center justify-between" @click="nav2 = 'DER'">
                                        <span class="text-sm">{{trans('header.Design Your Engagement Rings')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'DER'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Design Your Engagement Rings')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds" class="flex items-center space-x-3">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M22.3681 4.19995C21.6044 4.19995 8.47504 4.19995 7.63321 4.19995L3 10.5179L15.0498 26.3994L27 10.5161L22.3681 4.19995ZM9.58739 11.212L12.9823 21.3544L5.28697 11.212H9.58739ZM11.0663 11.212H18.9391L15.0298 23.053L11.0663 11.212ZM20.4161 11.212H24.7214L17.0495 21.4089L20.4161 11.212ZM21.6573 5.60237L24.7427 9.80962H20.417L19.0365 5.60237H21.6573ZM17.5605 5.60237L18.941 9.80962H11.0603L12.4408 5.60237H17.5605ZM8.34387 5.60237H10.9647L9.58421 9.80962H5.25855L8.34387 5.60237Z" fill="#666666"></path>
                                                    </svg>                                    
                                                    <span class="font-lato group-hover:border-b border-brown">{{trans('header.Start with a Diamond')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/engagement-rings" class="flex items-center space-x-3">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 27C8.39255 27 3 21.6071 3 15C3 8.39255 8.39292 3 15 3C21.6075 3 27 8.39292 27 15C27 21.6075 21.6071 27 15 27ZM15 4.40625C9.15858 4.40625 4.40625 9.15858 4.40625 15C4.40625 20.8414 9.15858 25.5938 15 25.5938C20.8414 25.5938 25.5938 20.8414 25.5938 15C25.5938 9.15858 20.8414 4.40625 15 4.40625Z" fill="#666666"></path>
                                                        <path d="M15 24.1875C9.95377 24.1875 5.8125 20.0453 5.8125 15C5.8125 9.95377 9.95475 5.8125 15 5.8125C20.0462 5.8125 24.1875 9.9547 24.1875 15C24.1875 20.0462 20.0452 24.1875 15 24.1875ZM15 7.21875C10.7094 7.21875 7.21875 10.7094 7.21875 15C7.21875 19.2906 10.7094 22.7812 15 22.7812C19.2906 22.7812 22.7812 19.2906 22.7812 15C22.7812 10.7094 19.2906 7.21875 15 7.21875Z" fill="#666666"></path>
                                                    </svg>                                                                      
                                                    <span class="font-lato">{{trans('header.Start with a Setting')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond" class="flex items-center justify-between" @click="nav2 = 'FCutD'">
                                        <span class="text-sm">{{trans('header.Fancy Cut Diamond')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'FCutD'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Fancy Cut Diamond')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/heart-shaped" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-6.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Heart')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/princess-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-7.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Princess')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/emerald-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-9.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Emerald')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/cushion-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-5.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Cushion')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/pear-shaped" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-1.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Pear')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/marquise-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-2.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Marquise')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/oval-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-3.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Oval')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/asscher-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-8.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Asscher')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond/radiant-cut" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/dd-4.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Radiant')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/gia-loose-diamonds/fancy-color" class="flex items-center justify-between"@click="nav2 = 'FCD'" >
                                        <span class="text-sm">{{trans('header.Fancy Color Diamond')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'FCD'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Fancy Color Diamond')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/yellow" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-yellow.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Yellow')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/orange" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-orange.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Orange')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/pink" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-pink.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Pink')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/brown" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-brown.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Brown')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/purple" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-purple.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Purple')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/black" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-black.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Black')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/grey" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-grey.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Grey')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/blue" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-blue.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Blue')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color/green" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img src="/assets/images/diamond-green.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Green')}}</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden', nav2: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/" class="flex items-center justify-between" @click="nav = 'ER'">
                            <span>{{trans('header.Engagement Rings')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'ER'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Engagement Rings')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/" class="flex items-center justify-between" @click="nav2 = 'DER'">
                                        <span class="text-sm">{{trans('header.Design Your Engagement Rings')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'DER'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Design Your Engagement Rings')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/gia-loose-diamonds" class="flex items-center space-x-3">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M22.3681 4.19995C21.6044 4.19995 8.47504 4.19995 7.63321 4.19995L3 10.5179L15.0498 26.3994L27 10.5161L22.3681 4.19995ZM9.58739 11.212L12.9823 21.3544L5.28697 11.212H9.58739ZM11.0663 11.212H18.9391L15.0298 23.053L11.0663 11.212ZM20.4161 11.212H24.7214L17.0495 21.4089L20.4161 11.212ZM21.6573 5.60237L24.7427 9.80962H20.417L19.0365 5.60237H21.6573ZM17.5605 5.60237L18.941 9.80962H11.0603L12.4408 5.60237H17.5605ZM8.34387 5.60237H10.9647L9.58421 9.80962H5.25855L8.34387 5.60237Z" fill="#666666"></path>
                                                    </svg>                                    
                                                    <span class="font-lato group-hover:border-b border-brown">{{trans('header.Start with a Diamond')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/engagement-rings" class="flex items-center space-x-3">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 27C8.39255 27 3 21.6071 3 15C3 8.39255 8.39292 3 15 3C21.6075 3 27 8.39292 27 15C27 21.6075 21.6071 27 15 27ZM15 4.40625C9.15858 4.40625 4.40625 9.15858 4.40625 15C4.40625 20.8414 9.15858 25.5938 15 25.5938C20.8414 25.5938 25.5938 20.8414 25.5938 15C25.5938 9.15858 20.8414 4.40625 15 4.40625Z" fill="#666666"></path>
                                                        <path d="M15 24.1875C9.95377 24.1875 5.8125 20.0453 5.8125 15C5.8125 9.95377 9.95475 5.8125 15 5.8125C20.0462 5.8125 24.1875 9.9547 24.1875 15C24.1875 20.0462 20.0452 24.1875 15 24.1875ZM15 7.21875C10.7094 7.21875 7.21875 10.7094 7.21875 15C7.21875 19.2906 10.7094 22.7812 15 22.7812C19.2906 22.7812 22.7812 19.2906 22.7812 15C22.7812 10.7094 19.2906 7.21875 15 7.21875Z" fill="#666666"></path>
                                                    </svg>                                                                      
                                                    <span class="font-lato">{{trans('header.Start with a Setting')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/engagement-rings" class="flex items-center justify-between" @click="nav2 = 'ERS'">
                                        <span class="text-sm">{{trans('header.Engagement Rings Style')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'ERS'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Engagement Rings Style')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/engagement-rings/solitaire-ring-setting" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-1.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Solitare')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/engagement-rings/side-stones-setting" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-2.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Side-Stone')}}</span>
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/engagement-rings/halo-setting" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-3.png" alt="">                                                                                                
                                                    <span class="font-lato">{{trans('header.Halo')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/wedding-rings" class="flex items-center justify-between" @click="nav = 'WR'">
                            <span>{{trans('header.Wedding Rings')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'WR'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Wedding Rings')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/wedding-rings/japanese" class="dd-link font-lato flex space-x-2 items-center max-w-max">
                                        {{trans('header.Japanese Wedding Rings')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/wedding-rings/angerosa" class="dd-link font-lato flex space-x-2 items-center max-w-max">
                                        Angerosa {{trans('header.Wedding Rings')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/wedding-rings/feerie-porte" class="dd-link font-lato flex space-x-2 items-center max-w-max">
                                        Feerie Porte {{trans('header.Wedding Rings')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/wedding-rings/timeless-ones" class="dd-link font-lato flex space-x-2 items-center max-w-max">
                                        Timeless Ones {{trans('header.Wedding Rings')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/wedding-rings/forge" class="dd-link font-lato flex space-x-2 items-center max-w-max">
                                        {{trans('header.Forge Wedding Rings')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden', nav2: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/jewellery" class="flex items-center justify-between" @click="nav = 'JEW'">
                            <span>{{trans('header.Jewellery')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'JEW'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Jewellery')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/jewellery/rings" class="flex items-center justify-between" @click="nav2 = 'RINGS'" >
                                        <span class="flex space-x-2 items-center max-w-max">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.1605 5.14315L12.3172 2.67048C12.3613 2.61983 12.39 2.55753 12.3997 2.49103C12.4094 2.42453 12.3998 2.35664 12.372 2.29547C12.3674 2.28527 12.3596 2.27727 12.3542 2.26767C12.3534 2.26245 12.3516 2.25743 12.349 2.25287L11.0227 0.162605C10.9911 0.112802 10.9475 0.071785 10.8958 0.0433591C10.8441 0.0149332 10.7861 1.90619e-05 10.7271 0H5.42256C5.36358 1.90619e-05 5.30556 0.0149332 5.25389 0.0433591C5.20221 0.071785 5.15855 0.112802 5.12695 0.162605L3.80071 2.25287C3.79881 2.25661 3.79765 2.26068 3.79731 2.26487C3.79009 2.27469 3.78341 2.28491 3.77731 2.29547C3.74948 2.35664 3.73985 2.42453 3.74957 2.49103C3.75928 2.55753 3.78794 2.61983 3.83211 2.67048L5.98918 5.14315C4.23324 5.64607 2.71817 6.76654 1.72301 8.29817C0.727857 9.8298 0.319648 11.6694 0.573574 13.4782C0.8275 15.287 1.72646 16.9432 3.10487 18.1416C4.48328 19.34 6.2483 20 8.07484 20C9.90137 20 11.6664 19.34 13.0448 18.1416C14.4232 16.9432 15.3222 15.287 15.5761 13.4782C15.83 11.6694 15.4218 9.8298 14.4267 8.29817C13.4315 6.76654 11.9164 5.64607 10.1605 5.14315ZM8.85486 5.57636L9.66468 2.79048H11.2847L8.85486 5.57636ZM8.71126 0.70002H10.0913L9.40088 1.78705L8.71126 0.70002ZM8.76446 2.09046H7.38442L8.07484 1.00343L8.76446 2.09046ZM6.7488 1.78705L6.05898 0.70002H7.43902L6.7488 1.78705ZM8.93486 2.79048L8.07484 5.74817L7.21481 2.79048H8.93486ZM8.07484 7.35201C9.07834 7.35197 10.0593 7.64951 10.8937 8.207C11.7281 8.76449 12.3785 9.55688 12.7625 10.484C13.1466 11.4111 13.2471 12.4313 13.0513 13.4155C12.8556 14.3997 12.3724 15.3038 11.6628 16.0134C10.9532 16.723 10.0492 17.2062 9.06495 17.402C8.08073 17.5978 7.06056 17.4973 6.13345 17.1133C5.20633 16.7293 4.4139 16.079 3.85639 15.2446C3.29887 14.4102 3.00129 13.4293 3.00129 12.4258C3.00298 11.0807 3.53805 9.79116 4.48916 8.84002C5.44026 7.88888 6.72975 7.35376 8.07484 7.35201ZM11.4167 2.09046H10.0367L10.7263 1.00343L11.4167 2.09046ZM5.42256 1.00343L6.11218 2.09046H4.73214L5.42256 1.00343ZM6.48599 2.79048L7.29582 5.57636L4.86595 2.79048H6.48599ZM8.07484 19.3006C6.38859 19.3004 4.76123 18.6804 3.50221 17.5587C2.2432 16.4369 1.44035 14.8916 1.24635 13.2165C1.05234 11.5415 1.4807 9.85356 2.44998 8.47373C3.41925 7.0939 4.86183 6.11841 6.50339 5.73277L7.34662 6.7002C5.89025 6.88537 4.55912 7.61838 3.62401 8.75012C2.6889 9.88187 2.22004 11.3273 2.31281 12.7925C2.40558 14.2576 3.05301 15.6324 4.1234 16.6372C5.1938 17.642 6.60675 18.2012 8.07484 18.2012C9.54293 18.2012 10.9559 17.642 12.0263 16.6372C13.0967 15.6324 13.7441 14.2576 13.8369 12.7925C13.9296 11.3273 13.4608 9.88187 12.5257 8.75012C11.5906 7.61838 10.2594 6.88537 8.80306 6.7002L9.64629 5.73337C11.2873 6.11953 12.7292 7.09516 13.6979 8.47482C14.6667 9.85447 15.0947 11.542 14.9008 13.2166C14.7068 14.8912 13.9043 16.4362 12.6459 17.5578C11.3874 18.6795 9.76064 19.2997 8.07484 19.3006Z" fill="#666666"/>
                                            </svg>                                                                                                                    
                                            <span class="font-lato">{{trans('header.Rings')}}</span>
                                        </span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'RINGS'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Rings')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/jewellery/diamond-rings" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Diamond Rings')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/jewellery/fancy-diamond-rings" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Fancy Diamond Rings')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/jewellery/necklaces" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.6899 10.3041C17.6899 9.87209 17.4577 9.4937 17.1119 9.28589C17.1996 8.71175 17.2448 8.13157 17.2449 7.54946C17.2449 7.5493 17.2449 7.54914 17.2449 7.54898C17.2457 6.57275 17.0755 5.63691 16.739 4.76755C16.4155 3.93107 15.9444 3.17099 15.3392 2.50791C14.7473 1.85907 14.0391 1.31435 13.2339 0.888386C12.4307 0.463205 11.5491 0.166329 10.614 0.00597684C10.5918 0.00200539 10.5693 3.93185e-05 10.5467 3.93185e-05C10.3535 3.93185e-05 10.1896 0.138214 10.1571 0.329041C10.1389 0.433164 10.1627 0.538073 10.224 0.624344C10.285 0.710654 10.376 0.768456 10.4801 0.786269C12.1998 1.08157 13.6776 1.86147 14.754 3.04158C15.8644 4.26125 16.4518 5.81967 16.4531 7.54875C16.4531 7.54887 16.4531 7.54894 16.4531 7.54906C16.4531 8.09929 16.4113 8.62592 16.337 9.12825C15.7601 9.20893 15.3147 9.7054 15.3147 10.3041C15.3147 10.4616 15.3456 10.6119 15.4016 10.7495C14.9788 10.9605 14.6876 11.3972 14.6876 11.9009C14.6876 12.009 14.7014 12.1139 14.7267 12.2143C14.0714 12.3684 13.582 12.9575 13.582 13.6591C13.582 13.739 13.5887 13.8173 13.601 13.8937C12.7868 13.9419 12.1366 14.608 12.1132 15.4286C12.0013 15.4064 11.8858 15.3942 11.7676 15.3942C11.067 15.3942 10.4599 15.8008 10.1691 16.3902C10.0965 16.2776 9.972 16.2084 9.83709 16.2084H8.10514C7.96948 16.2084 7.84424 16.2784 7.77181 16.3922C7.48139 15.8016 6.87364 15.3942 6.17238 15.3942C6.0541 15.3942 5.93861 15.4061 5.82678 15.4283C5.80331 14.6079 5.15313 13.9419 4.33906 13.8936C4.35125 13.8172 4.35798 13.7389 4.35798 13.6591C4.35798 12.9576 3.86866 12.3685 3.21353 12.2143C3.23877 12.114 3.25234 12.009 3.25234 11.9009C3.25234 11.3971 2.96113 10.9603 2.53834 10.7492C2.59422 10.6116 2.62528 10.4615 2.62528 10.3041C2.62528 9.70627 2.18115 9.21039 1.60552 9.12856C1.53117 8.62611 1.48909 8.09944 1.48909 7.54902C1.48909 7.54895 1.48909 7.54843 1.48909 7.54824C1.49027 5.819 2.07817 4.26046 3.1886 3.04115C4.26498 1.86104 5.74279 1.08118 7.46287 0.785837C7.56699 0.768024 7.65802 0.710615 7.71901 0.624304C7.77995 0.537994 7.80374 0.433085 7.78589 0.329001C7.75302 0.138175 7.58913 0 7.39633 0C7.37376 0 7.35119 0.00200539 7.32862 0.00558363C6.39356 0.165897 5.51233 0.462812 4.70872 0.887993C3.90389 1.31396 3.19568 1.85868 2.60346 2.50752C1.99819 3.17016 1.52708 3.93064 1.20327 4.76673C0.867187 5.63608 0.696533 6.57197 0.697319 7.5482C0.697319 7.54828 0.697319 7.54879 0.697319 7.54898C0.697319 8.13066 0.742499 8.71042 0.830068 9.28416C0.483018 9.49165 0.25 9.87111 0.25 10.3041C0.25 10.7327 0.4783 11.109 0.819609 11.3178C0.730074 11.493 0.679074 11.691 0.679074 11.9008C0.679074 12.4457 1.0196 12.9121 1.49888 13.0993C1.42818 13.2722 1.38878 13.461 1.38878 13.659C1.38878 14.4183 1.96185 15.0459 2.69814 15.1329C2.67388 15.2428 2.66083 15.3569 2.66083 15.474C2.66083 16.3472 3.37117 17.0575 4.24434 17.0575C4.2955 17.0575 4.34583 17.0543 4.39572 17.0495C4.39278 17.0912 4.39085 17.1332 4.39085 17.1757C4.39085 18.158 5.19001 18.9571 6.1723 18.9571C6.51927 18.9571 6.84297 18.8569 7.117 18.6844L7.76226 19.8021C7.83296 19.9245 7.96362 20 8.1051 20H9.83705C9.97849 20 10.1092 19.9245 10.1799 19.8021L10.8245 18.6856C11.0982 18.8572 11.4213 18.957 11.7675 18.957C12.7498 18.957 13.549 18.1579 13.549 17.1756C13.549 17.1331 13.5469 17.0911 13.5439 17.0493C13.5939 17.0542 13.6443 17.0575 13.6955 17.0575C14.5686 17.0575 15.279 16.3472 15.279 15.474C15.279 15.3568 15.2655 15.2428 15.2412 15.1329C15.9777 15.0461 16.551 14.4185 16.551 13.659C16.551 13.4609 16.5112 13.2722 16.4404 13.0993C16.92 12.9121 17.2608 12.4458 17.2608 11.9008C17.2608 11.6909 17.2093 11.493 17.1197 11.3178C17.4613 11.1091 17.6899 10.7329 17.6899 10.3041ZM1.04177 10.3041C1.04177 10.0858 1.21935 9.90819 1.43766 9.90819C1.65597 9.90819 1.83355 10.0858 1.83355 10.3041C1.83355 10.5224 1.65597 10.7 1.43766 10.7C1.21935 10.7 1.04177 10.5223 1.04177 10.3041ZM1.47085 11.9008C1.47085 11.6279 1.69282 11.406 1.96571 11.406C2.2386 11.406 2.46057 11.6279 2.46057 11.9008C2.46057 12.1737 2.2386 12.3957 1.96571 12.3957C1.69282 12.3957 1.47085 12.1737 1.47085 11.9008ZM2.8734 14.3518C2.49143 14.3518 2.18064 14.041 2.18064 13.659C2.18064 13.2771 2.49143 12.9663 2.8734 12.9663C3.25537 12.9663 3.56616 13.2771 3.56616 13.659C3.56616 14.041 3.25537 14.3518 2.8734 14.3518ZM4.24434 16.2658C3.80775 16.2658 3.4526 15.9106 3.4526 15.474C3.4526 15.0375 3.80779 14.6823 4.24434 14.6823C4.68092 14.6823 5.03607 15.0375 5.03607 15.474C5.03607 15.9106 4.68092 16.2658 4.24434 16.2658ZM6.17234 18.1653C5.62664 18.1653 5.18266 17.7213 5.18266 17.1756C5.18266 16.6299 5.62664 16.1859 6.17234 16.1859C6.71804 16.1859 7.16202 16.6299 7.16202 17.1756C7.16202 17.7213 6.71804 18.1653 6.17234 18.1653ZM9.60847 19.2082H8.33364L7.69624 18.1042L8.33364 17.0001H9.60847L10.2459 18.1042L9.60847 19.2082ZM11.7675 18.1653C11.2218 18.1653 10.7779 17.7213 10.7779 17.1756C10.7779 16.6299 11.2218 16.1859 11.7675 16.1859C12.3132 16.1859 12.7572 16.6299 12.7572 17.1756C12.7572 17.7213 12.3133 18.1653 11.7675 18.1653ZM13.6955 16.2658C13.2589 16.2658 12.9038 15.9106 12.9038 15.474C12.9038 15.0375 13.2589 14.6823 13.6955 14.6823C14.1321 14.6823 14.4872 15.0375 14.4872 15.474C14.4872 15.9106 14.1321 16.2658 13.6955 16.2658ZM15.0665 14.3518C14.6845 14.3518 14.3737 14.041 14.3737 13.659C14.3737 13.2771 14.6845 12.9663 15.0665 12.9663C15.4484 12.9663 15.7592 13.2771 15.7592 13.659C15.7592 14.041 15.4485 14.3518 15.0665 14.3518ZM15.9742 12.3957C15.7013 12.3957 15.4793 12.1737 15.4793 11.9008C15.4793 11.6279 15.7013 11.406 15.9742 11.406C16.2471 11.406 16.469 11.6279 16.469 11.9008C16.469 12.1737 16.247 12.3957 15.9742 12.3957ZM16.5022 10.7C16.284 10.7 16.1064 10.5224 16.1064 10.3041C16.1064 10.0858 16.2839 9.90819 16.5022 9.90819C16.7205 9.90819 16.8981 10.0858 16.8981 10.3041C16.8981 10.5224 16.7205 10.7 16.5022 10.7Z" fill="#666666"/>
                                        </svg>                                                                                                                                                                
                                        <span class="font-lato">{{trans('header.Necklaces')}}</span>
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/jewellery/bracelets" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.313218 10.2462C-0.0234547 10.7269 -0.0901317 11.3467 0.136664 11.8879C0.363617 12.4292 0.852113 12.8163 1.43092 12.9133C1.05011 13.3581 0.924268 13.9674 1.09785 14.5268C1.27143 15.0862 1.71985 15.5175 2.28583 15.6688C2.43076 15.7076 2.58008 15.7273 2.73018 15.7275C2.83474 15.7258 2.93867 15.7144 3.04103 15.6934C2.84303 16.2165 2.91456 16.8036 3.23245 17.2637C3.55019 17.7241 4.07374 17.9991 4.63299 17.9994C4.68323 17.9994 4.73566 17.9972 4.78481 17.9928C5.03962 17.9689 5.28567 17.8878 5.50464 17.7555C5.48961 18.4819 5.93835 19.1374 6.62109 19.3861C7.30383 19.6347 8.06905 19.4214 8.52483 18.8555C8.76117 19.5405 9.40619 20 10.1307 20C10.8554 20 11.5003 19.5405 11.7368 18.8555C12.1936 19.4184 12.957 19.6297 13.6382 19.3818C14.3193 19.1338 14.7684 18.4813 14.7566 17.7566C14.9751 17.8886 15.2206 17.9696 15.4747 17.9939C15.5253 17.9983 15.5773 18.0003 15.6264 18.0003C16.1858 18 16.7094 17.7252 17.0271 17.2648C17.345 16.8045 17.4165 16.2176 17.2185 15.6945C17.3207 15.7155 17.4248 15.7269 17.5292 15.7286C17.6793 15.7284 17.8288 15.7087 17.9737 15.6697C18.5416 15.5211 18.9924 15.09 19.1662 14.5294C19.3401 13.9689 19.2126 13.3581 18.8286 12.9142C19.5472 12.8012 20.1144 12.2442 20.2406 11.5278C20.3666 10.8114 20.0235 10.0941 19.3866 9.74253C20.0219 9.39146 20.3641 8.67554 20.2381 7.96056C20.1121 7.24558 19.5458 6.68979 18.8286 6.57709C19.3062 6.02959 19.3829 5.23901 19.0194 4.61012C18.6558 3.98107 17.9327 3.65269 17.2198 3.79325C17.4815 3.11583 17.2835 2.34717 16.7272 1.88058C16.1709 1.41384 15.3794 1.35265 14.758 1.72798C14.7681 0.89608 14.1763 0.178284 13.3578 0.0294348C12.5392 -0.119415 11.7328 0.344038 11.4492 1.12616C11.4406 1.14917 11.4386 1.17265 11.4311 1.19456H10.0689C9.92458 0.786204 9.53923 0.512452 9.10599 0.510731H8.42215C8.28097 0.365951 8.11522 0.247466 7.93256 0.160598C7.40102 -0.0882674 6.7787 -0.0456943 6.28583 0.272978C5.79295 0.591651 5.49885 1.14182 5.50761 1.7286C4.88592 1.35593 4.09628 1.41854 3.54095 1.8845C2.98562 2.35045 2.78684 3.11724 3.04588 3.79418C2.33341 3.6541 1.6106 3.98216 1.24717 4.6109C0.88373 5.23948 0.959954 6.02959 1.43671 6.57709C0.719385 6.68916 0.152473 7.2448 0.0260054 7.95994C-0.100305 8.67492 0.241532 9.3913 0.876999 9.74253C0.65349 9.86587 0.460815 10.038 0.313218 10.2462ZM3.11428 7.27767C3.08204 7.23228 3.04275 7.19456 3.00722 7.15261C3.06185 7.14369 3.11694 7.13446 3.17172 7.11833C4.0836 6.87385 4.62485 5.93646 4.38036 5.02442C4.36534 4.9687 4.3403 4.91768 4.32026 4.86446C4.37629 4.87495 4.43061 4.89076 4.48805 4.89592C4.53939 4.9003 4.59057 4.90234 4.64019 4.90234C5.52546 4.90077 6.26313 4.22367 6.34029 3.34185C6.34264 3.28581 6.34202 3.22978 6.33857 3.1739C6.77667 3.43967 7.31181 3.49148 7.79279 3.31477C8.16859 3.17703 8.48335 2.91048 8.68104 2.56222H9.10599C9.53939 2.56082 9.92505 2.28706 10.0695 1.87839H11.36C11.4423 2.75208 12.1759 3.41979 13.0536 3.41979C13.3606 3.41791 13.6616 3.33371 13.925 3.17562C13.9216 3.2315 13.921 3.28753 13.9233 3.34357C14.0005 4.22539 14.7382 4.9025 15.6234 4.90406C15.6737 4.90406 15.726 4.90203 15.7756 4.89764C15.833 4.89248 15.8873 4.87667 15.9435 4.86618C15.9233 4.9194 15.8983 4.9687 15.8833 5.02615C15.6388 5.93818 16.18 6.87557 17.0919 7.12006C17.1467 7.13446 17.2018 7.14369 17.2564 7.15418C17.2223 7.19628 17.1816 7.23385 17.1493 7.27939C16.8723 7.67445 16.7756 8.16842 16.8829 8.63892C16.9903 9.10925 17.2919 9.51229 17.7128 9.74801C17.2916 9.98185 16.9895 10.3836 16.882 10.8533C16.7745 11.3229 16.8717 11.8161 17.1493 12.2099C17.1836 12.257 17.2235 12.2965 17.2605 12.3398C17.2044 12.349 17.1481 12.3528 17.0919 12.3675C16.18 12.612 15.6388 13.5494 15.8833 14.4614C15.8983 14.5171 15.9233 14.5682 15.9435 14.6215C15.8873 14.6109 15.833 14.5951 15.7756 14.5901C15.2899 14.5254 14.8009 14.6816 14.4427 15.0158C14.0844 15.3498 13.8945 15.8267 13.925 16.3157C13.512 16.0657 13.0121 16.0034 12.5503 16.1446C12.0886 16.2857 11.7087 16.6167 11.506 17.0549C11.4841 17.1078 11.465 17.1618 11.4489 17.2166C11.1288 16.8169 10.6446 16.5843 10.1324 16.5843C9.62046 16.5843 9.13619 16.8169 8.81611 17.2166C8.79983 17.1618 8.7809 17.1078 8.75898 17.0549C8.55645 16.6165 8.17658 16.2853 7.71484 16.1443C7.25296 16.0031 6.75288 16.0654 6.33998 16.3157C6.34969 15.8328 6.15357 15.3686 5.8003 15.0393C5.4472 14.71 4.97044 14.5466 4.48946 14.5901C4.43202 14.5951 4.3777 14.6109 4.32151 14.6215C4.3417 14.5682 4.36675 14.5189 4.38177 14.4614C4.49979 14.023 4.43859 13.5555 4.21164 13.1623C3.98453 12.769 3.61045 12.4822 3.17172 12.3652C3.11553 12.3505 3.05919 12.3467 3.00315 12.3375C3.04009 12.2939 3.0811 12.2547 3.11428 12.2075C3.39163 11.8137 3.48883 11.3209 3.38162 10.8513C3.27424 10.3818 2.97263 9.97981 2.55175 9.74566C2.97248 9.50963 3.27362 9.10659 3.38083 8.63626C3.48789 8.16607 3.39116 7.67226 3.11428 7.27736V7.27767ZM2.46348 15.0081C2.062 14.9012 1.76462 14.5627 1.71046 14.1506C1.65631 13.7386 1.85603 13.3346 2.21633 13.1276C2.37223 13.0376 2.54925 12.9903 2.72925 12.9908C2.8194 12.9906 2.90909 13.002 2.99627 13.025C3.38569 13.1291 3.67775 13.4523 3.74177 13.8502C3.80594 14.2482 3.63033 14.6467 3.29334 14.8681H3.29099C3.27424 14.8789 3.26063 14.8926 3.2431 14.9022C3.00785 15.0401 2.72721 15.0783 2.46348 15.0081ZM3.97717 17.0764C3.65959 16.8097 3.53391 16.378 3.65865 15.9823C3.7834 15.5868 4.134 15.3054 4.54721 15.2691C4.57758 15.2664 4.60794 15.265 4.63846 15.265C5.09143 15.2658 5.49024 15.5636 5.61968 15.9978C5.74912 16.4318 5.57836 16.8994 5.19974 17.1481C4.82112 17.3968 4.32417 17.3677 3.97717 17.0764ZM7.64128 18.7046C7.19771 18.9116 6.66977 18.7762 6.38052 18.3814C6.09112 17.9867 6.12101 17.4426 6.45158 17.0819C6.7823 16.7211 7.32183 16.6442 7.7402 16.8983C8.15842 17.1521 8.33904 17.6663 8.17157 18.1262C8.07906 18.3818 7.88842 18.5901 7.64191 18.7046H7.64128ZM10.1318 19.3163C9.56537 19.3163 9.10599 18.8571 9.10599 18.2907C9.10599 17.7241 9.56537 17.2648 10.1318 17.2648C10.6983 17.2648 11.1576 17.7241 11.1576 18.2907C11.1576 18.8571 10.6983 19.3163 10.1318 19.3163ZM13.4063 18.7392C13.1508 18.8324 12.8685 18.8202 12.6219 18.7051C12.3752 18.5901 12.1844 18.3819 12.0914 18.1262C11.977 17.8117 12.023 17.4614 12.2148 17.1872C12.4067 16.9131 12.72 16.7499 13.0545 16.7496C13.5528 16.7486 13.9798 17.106 14.0665 17.5968C14.1533 18.0875 13.8748 18.5696 13.4063 18.7396V18.7392ZM16.2865 17.0764C15.9393 17.3672 15.4427 17.3958 15.0644 17.1471C14.686 16.8984 14.5154 16.4312 14.6447 15.9972C14.774 15.5633 15.1723 15.2655 15.6252 15.2642C15.6554 15.2642 15.6859 15.2656 15.7164 15.2684C16.1299 15.3043 16.481 15.586 16.6058 15.9818C16.7307 16.3778 16.6045 16.8098 16.2865 17.0764ZM18.4228 14.5295C18.2868 14.7654 18.0626 14.9376 17.7997 15.0081C17.5367 15.0787 17.2566 15.0418 17.0208 14.9056C17.0035 14.8953 16.9894 14.8817 16.9726 14.8713C16.6358 14.65 16.4605 14.2514 16.525 13.8535C16.5893 13.4556 16.8814 13.1327 17.2708 13.0288C17.358 13.0058 17.4477 12.9944 17.5378 12.9947C17.9025 12.9966 18.2387 13.1921 18.4209 13.5081C18.6031 13.8239 18.6037 14.2129 18.4228 14.5295ZM19.5604 11.4051C19.476 11.887 19.0629 12.2425 18.5737 12.2537C18.0844 12.2651 17.6552 11.9293 17.5488 11.4516C17.4422 10.974 17.6878 10.4876 18.1354 10.2899C18.5831 10.0922 19.108 10.2382 19.3893 10.6388C19.5463 10.8612 19.6078 11.137 19.5604 11.4051ZM19.5604 8.08014C19.6324 8.48881 19.4513 8.90062 19.1014 9.1235C18.7515 9.34654 18.3016 9.33668 17.9618 9.09877C17.6219 8.86086 17.4589 8.44155 17.5486 8.03647C17.6385 7.6314 17.9636 7.32024 18.3721 7.24824C18.4315 7.23745 18.4918 7.23212 18.5524 7.23228C19.0493 7.23338 19.4741 7.59055 19.5604 8.08014ZM17.8001 4.47708C18.2016 4.58398 18.499 4.92253 18.5532 5.33449C18.6073 5.7466 18.4076 6.15058 18.0473 6.35765C18.0271 6.36955 18.0049 6.37597 17.9841 6.3863C17.5001 6.62702 16.9124 6.4489 16.6436 5.97997C16.3747 5.51104 16.5179 4.91392 16.9703 4.61794L16.9733 4.61622C16.99 4.60527 17.0038 4.59149 17.0212 4.58194C17.177 4.49195 17.3541 4.44468 17.5341 4.44515C17.6238 4.44421 17.7131 4.45501 17.8001 4.47708ZM15.6272 2.16905C16.1082 2.16952 16.524 2.50416 16.6277 2.97371C16.7313 3.44343 16.4948 3.92206 16.0587 4.12491C15.6227 4.32776 15.1043 4.20035 14.8117 3.8186C14.5194 3.43685 14.5314 2.90312 14.8407 2.53483C15.0354 2.30209 15.3237 2.16795 15.6272 2.16905ZM12.6217 0.780569C13.0273 0.583199 13.5137 0.668502 13.8279 0.992026C14.142 1.31571 14.2129 1.80452 14.0036 2.20395C13.7944 2.60355 13.3522 2.82361 12.9072 2.74958C12.4624 2.67554 12.1152 2.32416 12.0465 1.87839H12.1833C12.3722 1.87839 12.5253 1.72532 12.5253 1.53656C12.5253 1.34764 12.3722 1.19456 12.1833 1.19456H12.1703C12.2747 1.01347 12.4322 0.868846 12.6217 0.780569ZM9.44798 1.53656C9.44814 1.62859 9.41026 1.71671 9.34327 1.77994C9.28097 1.8438 9.1952 1.87933 9.10599 1.87839H8.90361C8.92708 1.648 8.90282 1.41525 8.83255 1.19456H9.10599C9.2949 1.19456 9.44798 1.34764 9.44798 1.53656ZM6.85728 0.745979C7.11334 0.651754 7.39664 0.664119 7.64363 0.7801C7.89046 0.894672 8.08126 1.10284 8.17391 1.35875C8.36753 1.89107 8.09284 2.47943 7.56052 2.67304C7.0282 2.86665 6.43968 2.59228 6.24607 2.05996C6.0523 1.52763 6.32668 0.939123 6.859 0.745353L6.85728 0.745979ZM3.97717 2.40868C4.29506 2.14197 4.74224 2.09298 5.11021 2.28456C5.47834 2.47614 5.69465 2.87057 5.6585 3.28393C5.62234 3.6973 5.34061 4.04806 4.94493 4.1728C4.54925 4.29755 4.11741 4.17155 3.8507 3.85366C3.67462 3.6458 3.58885 3.37628 3.61264 3.10488C3.63643 2.83347 3.76775 2.58289 3.97717 2.40868ZM1.84084 4.95571C1.97623 4.71937 2.20037 4.54704 2.46348 4.47708C2.55066 4.45407 2.6405 4.44249 2.73065 4.4428C2.91065 4.44233 3.08752 4.4896 3.24341 4.5796C3.26094 4.58977 3.27487 4.60354 3.29162 4.61372H3.29381C3.74756 4.90876 3.89218 5.50682 3.62328 5.97653C3.35438 6.4464 2.76556 6.62452 2.28129 6.38254C2.26016 6.37221 2.23793 6.36548 2.21743 6.3539C1.98155 6.21788 1.80923 5.99375 1.73879 5.73079C1.6682 5.46784 1.70514 5.18767 1.84131 4.95196L1.84084 4.95571ZM0.70342 8.08014C0.789505 7.59055 1.2143 7.23338 1.7114 7.23228C1.77182 7.23212 1.83208 7.23745 1.89156 7.24824C2.30007 7.32024 2.62516 7.6314 2.715 8.03647C2.80469 8.44155 2.64175 8.86086 2.30179 9.09877C1.96199 9.33668 1.51215 9.34654 1.16218 9.1235C0.812357 8.90062 0.631264 8.48881 0.70342 8.08014ZM0.874338 10.6388C1.1556 10.2382 1.68057 10.0922 2.12821 10.2899C2.57586 10.4876 2.82143 10.974 2.71485 11.4516C2.60841 11.9293 2.17924 12.2651 1.68996 12.2537C1.20084 12.2425 0.787627 11.887 0.70342 11.4051C0.655368 11.1371 0.716567 10.8612 0.873243 10.6388H0.874338Z" fill="#666666"/>
                                        </svg>                                                                                                                                                                  
                                        <span class="font-lato">{{trans('header.Bracelets')}}</span>
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/jewellery/earrings" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5211 5.85942C17.5708 5.88672 17.6248 5.89952 17.6781 5.89952C17.7948 5.89952 17.9076 5.83759 17.9676 5.72824C18.0546 5.56862 17.9956 5.36892 17.836 5.28178C16.8701 4.75486 16.7963 4.23227 16.6742 3.36694L16.6742 3.36646L16.6734 3.36127C16.6109 2.91928 16.5401 2.41821 16.3305 1.84225C16.0124 0.967033 15.4522 0.352496 14.7528 0.111763C14.1654 -0.0913257 13.52 -0.0150968 12.9845 0.319746C12.0562 0.899839 11.6248 2.27554 11.7577 3.21701C11.8435 3.82477 12.1563 4.24883 12.6167 4.38021C12.9827 4.48482 13.2696 4.60865 13.484 4.72129C13.2765 4.90339 13.1452 5.17049 13.1452 5.46772C13.1452 5.92747 13.4594 6.31525 13.8844 6.42758V6.48118C13.4594 6.59357 13.1452 6.9815 13.1452 7.44141C13.1452 7.8462 13.3888 8.1952 13.7371 8.34953C13.7042 8.37599 13.6736 8.40569 13.6457 8.43863C12.7142 9.53934 10.5064 12.2621 10.1281 13.7773C10.1132 13.8364 10.1151 13.8981 10.1336 13.9561C10.1686 14.067 11.021 16.7067 13.6497 19.7425C13.7908 19.9063 13.9966 20 14.2134 20C14.4302 20 14.6358 19.9063 14.7771 19.7427C17.4058 16.7067 18.2582 14.067 18.2934 13.9561C18.3117 13.8981 18.3136 13.8364 18.2987 13.7773C17.9204 12.2619 15.7126 9.53896 14.7811 8.43863C14.7362 8.38565 14.6842 8.34105 14.6274 8.30483C14.9277 8.13394 15.1308 7.81093 15.1308 7.44141C15.1308 7.03789 14.8888 6.68978 14.5424 6.53458V6.37421C14.8888 6.21907 15.1308 5.8711 15.1308 5.46772C15.1308 4.99147 14.7937 4.59255 14.3457 4.49675C14.1477 4.33634 13.6515 3.99171 12.7972 3.7476C12.5251 3.66968 12.4372 3.32411 12.4091 3.12516C12.3045 2.38395 12.651 1.30413 13.3333 0.877629C13.6995 0.648377 14.1388 0.595676 14.5384 0.733641C14.8976 0.857489 15.3929 1.18913 15.7122 2.06718C15.8989 2.58064 15.9617 3.02672 16.0225 3.45831C16.1468 4.34049 16.2644 5.17393 17.5211 5.85942ZM13.8032 5.46753C13.8032 5.28861 13.9441 5.14186 14.1208 5.13293C14.1567 5.14344 14.1941 5.1477 14.2312 5.14572C14.3706 5.18624 14.4729 5.31523 14.4729 5.46753C14.4729 5.65236 14.3225 5.80256 14.1379 5.80256C13.9533 5.80256 13.8032 5.65236 13.8032 5.46753ZM14.147 19.3121C11.8757 16.6889 10.9615 14.3254 10.791 13.846C11.2173 12.3997 13.4592 9.67749 14.1483 8.86363C14.1906 8.81319 14.2362 8.81319 14.2787 8.86363C14.9678 9.67749 17.2095 12.3997 17.6358 13.846C17.4651 14.3254 16.5509 16.6889 14.2798 19.3121C14.2343 19.3642 14.1925 19.3644 14.147 19.3121ZM13.7452 18.2065C13.8613 18.3486 14.0322 18.4303 14.2135 18.4303C14.3945 18.4303 14.5655 18.3486 14.6821 18.2061C16.4772 16.01 17.0613 14.0962 17.085 14.0158C17.1013 13.9606 17.1032 13.9023 17.09 13.8462C16.8292 12.7419 15.3213 10.7707 14.6853 9.97414C14.4521 9.68278 13.9748 9.68278 13.7416 9.97414V9.97433C13.1056 10.7707 11.5978 12.7419 11.3369 13.8462C11.3237 13.9021 11.3256 13.9606 11.342 14.0158C11.3657 14.0962 11.9498 16.01 13.7452 18.2065ZM14.2135 17.7397C12.7425 15.9243 12.131 14.2942 11.9998 13.9117C12.2916 12.9143 13.7094 11.0718 14.2135 10.4377C14.7175 11.0718 16.1354 12.9143 16.4271 13.9117C16.2959 14.2942 15.6844 15.9245 14.2135 17.7397ZM13.8032 7.44122C13.8032 7.25658 13.9533 7.10619 14.1379 7.10619C14.3225 7.10619 14.4729 7.25658 14.4729 7.44122C14.4729 7.62587 14.3225 7.77607 14.1379 7.77607C13.9533 7.77607 13.8032 7.62587 13.8032 7.44122ZM15.2007 14.1445C15.0889 14.1445 14.9799 14.0876 14.9182 13.9849L13.9313 12.3402C13.838 12.1844 13.8884 11.9824 14.0441 11.8889C14.2005 11.7951 14.4021 11.8461 14.4954 12.0016L15.4823 13.6463C15.5758 13.8021 15.5252 14.0043 15.3695 14.0976C15.3166 14.1294 15.2581 14.1445 15.2007 14.1445ZM3.7815 19.7425C3.92286 19.9063 4.12839 20 4.34522 20C4.56205 20 4.76759 19.9063 4.90913 19.7427C7.53761 16.7067 8.39025 14.067 8.42526 13.9561C8.44351 13.8981 8.4454 13.8364 8.43071 13.7773C8.05221 12.2619 5.84439 9.53896 4.91289 8.43863C4.86805 8.38566 4.81608 8.34107 4.75924 8.30486C5.05963 8.13398 5.2627 7.81095 5.2627 7.44141C5.2627 7.03788 5.02071 6.68975 4.6743 6.53456V6.37423C5.02071 6.2191 5.2627 5.87111 5.2627 5.46772C5.2627 4.99146 4.92563 4.59253 4.47766 4.49674C4.27961 4.33633 3.78337 3.99171 2.92913 3.7476C2.65697 3.66968 2.56888 3.32411 2.54102 3.12516C2.43618 2.38395 2.78289 1.30413 3.46518 0.877629C3.83108 0.648377 4.27095 0.595676 4.67054 0.733641C5.02966 0.857489 5.52487 1.18913 5.84428 2.06718C6.0308 2.58064 6.09386 3.02672 6.15446 3.45831L6.15449 3.45851C6.27889 4.34062 6.39642 5.17398 7.65307 5.85942C7.70276 5.88672 7.75678 5.89952 7.81004 5.89952C7.92674 5.89952 8.03948 5.83759 8.09933 5.72824C8.18648 5.56862 8.12757 5.36892 7.96796 5.28178C7.0017 4.7548 6.92805 4.23214 6.8061 3.36661L6.80608 3.36646L6.80535 3.36128V3.36128L6.80535 3.36126L6.80534 3.36125C6.74285 2.91926 6.672 2.4182 6.46239 1.84225C6.1443 0.967033 5.58416 0.352496 4.88473 0.111763C4.29711 -0.0913257 3.6519 -0.0150968 3.11641 0.319746C2.18811 0.899839 1.75671 2.27554 1.8896 3.21701C1.97542 3.82477 2.28824 4.24883 2.74863 4.38021C3.11468 4.48483 3.40161 4.60867 3.61598 4.72132C3.40852 4.90342 3.27736 5.17051 3.27736 5.46772C3.27736 5.92745 3.59141 6.31522 4.01628 6.42757V6.4812C3.59141 6.5936 3.27736 6.98152 3.27736 7.44141C3.27736 7.84621 3.52084 8.19521 3.86907 8.34953C3.83623 8.37599 3.8056 8.40569 3.77774 8.43863C2.84605 9.53934 0.638425 12.2621 0.259915 13.7773C0.245046 13.8364 0.246928 13.8981 0.265374 13.9561C0.300383 14.067 1.15283 16.7067 3.7815 19.7425ZM4.27878 19.3121C2.00772 16.6889 1.09335 14.3254 0.922825 13.846C1.34914 12.3997 3.59102 9.67749 4.2801 8.86363C4.32245 8.81319 4.36818 8.81319 4.41053 8.86363C5.0996 9.67749 7.3413 12.3997 7.76762 13.846C7.59709 14.3254 6.68291 16.6889 4.41185 19.3121C4.36611 19.3642 4.32452 19.3644 4.27878 19.3121ZM4.34527 18.4303C4.16421 18.4303 3.9933 18.3486 3.87698 18.2065C2.08156 16.01 1.49751 14.0962 1.4738 14.0158C1.45742 13.9606 1.45554 13.9021 1.46872 13.8462C1.72959 12.7419 3.23741 10.7707 3.87341 9.97433V9.97414C4.10661 9.68278 4.58393 9.68278 4.81714 9.97414C5.45332 10.7707 6.96115 12.7419 7.22202 13.8462C7.235 13.9023 7.23312 13.9606 7.21675 14.0158C7.19303 14.0962 6.60899 16.01 4.81394 18.2061C4.69724 18.3486 4.52653 18.4303 4.34527 18.4303ZM2.13162 13.9117C2.26281 14.2942 2.87434 15.9243 4.34527 17.7397C5.81621 15.9245 6.42773 14.2942 6.55892 13.9117C6.26718 12.9143 4.84932 11.0718 4.34527 10.4377C3.84122 11.0718 2.42336 12.9143 2.13162 13.9117ZM4.25273 5.13293C4.07602 5.14188 3.93519 5.28862 3.93519 5.46753C3.93519 5.65236 4.0852 5.80256 4.26984 5.80256C4.45449 5.80256 4.60487 5.65236 4.60487 5.46753C4.60487 5.31523 4.50256 5.18624 4.3631 5.14572C4.32601 5.14771 4.28865 5.14344 4.25273 5.13293ZM4.26984 7.10619C4.0852 7.10619 3.93519 7.25658 3.93519 7.44122C3.93519 7.62587 4.0852 7.77607 4.26984 7.77607C4.45449 7.77607 4.60487 7.62587 4.60487 7.44122C4.60487 7.25658 4.45449 7.10619 4.26984 7.10619ZM5.04999 13.9849C5.11173 14.0876 5.22071 14.1445 5.33251 14.1445C5.38992 14.1445 5.44846 14.1294 5.50135 14.0976C5.65719 14.0043 5.70763 13.8021 5.61409 13.6463L4.62725 12.0016C4.53389 11.8461 4.33212 11.7951 4.1759 11.8889C4.02024 11.9824 3.9698 12.1844 4.06315 12.3402L5.04999 13.9849Z" fill="#666666"/>
                                        </svg>                                                                                                                                                        
                                        <span class="font-lato">{{trans('header.Earrings')}}</span>
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/jewellery/pendants" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3333 0.333405C19.3333 0.149231 19.4826 0 19.6666 0C19.8508 0 20 0.149231 20 0.333405V1.99997C19.9937 7.04483 15.9833 11.1736 10.9407 11.3263C10.9065 11.4253 10.8569 11.5182 10.7936 11.6017C11.1621 11.8721 11.3647 12.3138 11.3292 12.7695C11.2938 13.2253 11.0252 13.6302 10.6194 13.8403C11.3147 14.6083 12.6666 16.2413 12.6666 17.3334C12.6666 18.8062 11.4728 20 10 20C8.52722 20 7.33337 18.8062 7.33337 17.3334C7.33337 16.2413 8.6853 14.6083 9.38065 13.8403C8.97476 13.6302 8.70621 13.2253 8.67081 12.7695C8.63525 12.3138 8.83789 11.8721 9.20639 11.6017C9.14307 11.5182 9.09348 11.4253 9.0593 11.3263C4.01672 11.1736 0.0062561 7.04483 0 1.99997V0.333405C0 0.149231 0.149231 0 0.333405 0C0.517426 0 0.666656 0.149231 0.666656 0.333405V1.99997C0.672607 6.67862 4.38751 10.5098 9.06372 10.6596C9.20502 10.264 9.57993 10 10 10C10.4201 10 10.795 10.264 10.9363 10.6596C15.6125 10.5098 19.3274 6.67862 19.3333 1.99997V0.333405ZM8.00003 17.3334C8.0011 18.4375 8.89587 19.3323 10 19.3333C11.1041 19.3323 11.9989 18.4375 12 17.3334C12 16.492 10.7204 14.9313 10 14.151C9.27963 14.9333 8.00003 16.4931 8.00003 17.3334ZM9.33334 12.6666C9.33334 13.0348 9.63181 13.3333 10 13.3333C10.3682 13.3333 10.6667 13.0348 10.6667 12.6666C10.6667 12.2984 10.3682 12 10 12C9.63181 12 9.33334 12.2984 9.33334 12.6666ZM10 10.6667C9.81598 10.6667 9.6666 10.8159 9.6666 11.0001C9.6666 11.1841 9.81598 11.3333 10 11.3333C10.184 11.3333 10.3334 11.1841 10.3334 11.0001C10.3334 10.8159 10.184 10.6667 10 10.6667ZM8.66671 17.3334C8.66671 17.3222 8.66747 17.3111 8.66869 17.3C8.71905 16.8184 9.43331 15.8667 9.73833 15.4813C9.80379 15.405 9.89947 15.361 10 15.361C10.1006 15.361 10.1962 15.405 10.2617 15.4813C10.5651 15.8673 11.2804 16.8187 11.3317 17.3146C11.3333 17.325 11.3333 17.3367 11.3333 17.348C11.3294 18.0844 10.7291 18.678 9.9927 18.674C9.25631 18.6699 8.66259 18.0698 8.66671 17.3334ZM10.6687 17.3706C10.5083 16.9597 10.2832 16.5772 10.002 16.2373L10 16.236C9.72262 16.5736 9.49847 16.9519 9.33535 17.3573C9.33169 17.7255 9.6271 18.027 9.99529 18.0307C10.3635 18.0344 10.665 17.7388 10.6687 17.3706Z" fill="#666666"/>
                                        </svg>                                                                                                                                                                  
                                        <span class="font-lato">{{trans('header.Pendants')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden', nav2: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/education-diamond-grading" class="flex items-center justify-between" @click="nav = 'EDU'">
                            <span>{{trans('header.Education')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'EDU'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Education')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/education-diamond-grading/4cs" class="flex items-center justify-between" @click="nav2 = 'DG'">
                                        <span class="text-sm">{{trans('header.Diamond Grading | 4Cs')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'DG'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Diamond Grading | 4Cs')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/4cs/carat" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Carat')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/4cs/cut" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Cut')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/4cs/color" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Color')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/4cs/clarity" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Clarity')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/education-diamond-grading/gia-report" class="flex items-center justify-between" @click="nav2 = 'DC'">
                                        <span class="text-sm">{{trans('header.Diamond Certificates')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'DC'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Diamond Certificates')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/gia-report/grading-certficate" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Certificate')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/gia-report" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.GIA Report')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/gia-report/grading-eye-clean" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Eye Clean Diamond')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="pt-3">
                                    <a href="#{{ $baseUrl }}/education-diamond-grading/anatomy" class="flex items-center justify-between" @click="nav2 = 'DA'">
                                        <span class="text-sm">{{trans('header.Diamond Anatomy')}}</span>
                                        <button class="focus:outline-none">
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                            </svg>                                    
                                        </button>
                                    </a>
                                    <div x-show="nav2 == 'DA'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                                        <div class="flex py-2">
                                            <button @click="nav2 = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                                </svg>                                            
                                            </button>
                                            <span class="w-full uppercase text-center text-xl font-suranna">{{trans('header.Diamond Anatomy')}}</span>
                                        </div>
                                        <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5 overflow-y-auto">
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/shape" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Shape')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/hearts-and-arrows" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Hearts and Arrows')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/proportion" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Proportion')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/symmetry" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                   {{trans('header.Symmetry')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/polish" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Polish')}}
                                                </a>
                                            </li>
                                            <li class="pt-3">
                                                <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/fluorescence" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                                    {{trans('header.Fluorescence')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/customer-jewellery" class="flex items-center justify-between" @click="nav = 'CJ'">
                            <span> {{trans('header.Customer Jewellery')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'CJ'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna"> {{trans('header.Customer Jewellery')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/customer-jewellery" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                        {{trans('header.Customer Jewellery')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/customer-moments" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                        {{trans('header.Customer Moments')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/engagement-tips" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                       {{trans('header.Engagement Tips')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ nav: 'hidden'}" class="pt-3">
                        <a href="#{{ $baseUrl }}/about-us" class="flex items-center justify-between" @click="nav = 'AU'">
                            <span> {{trans('header.About Us')}}</span>
                            <button class="focus:outline-none">
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.59 10.59L5.17 6L0.59 1.41L2 0L8 6L2 12L0.59 10.59Z" fill="#BB9A5B"/>
                                </svg>                                    
                            </button>
                        </a>
                        <div x-show="nav == 'AU'" class="absolute top-0 h-full w-full bg-white flex flex-col">
                            <div class="flex py-2">
                                <button @click="nav = 'hidden'" class="flex-1 w-9 focus:outline-none">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                                    </svg>                                            
                                </button>
                                <span class="w-full uppercase text-center text-xl font-suranna"> {{trans('header.About Us')}}</span>
                            </div>
                            <ul class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/about-us" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                         {{trans('header.About Us')}}
                                    </a>
                                </li>
                                <li class="pt-3">
                                    <a href="{{ $baseUrl }}/buying-procedure" class="dd-link font-lato flex space-x-2 items-center max-w-max">                                                                 
                                         {{trans('header.Buying Procedure')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col space-y-4">
                <ul x-data="{ nav: 'hidden', nav2: 'hidden'}" class="z-50 flex flex-col space-y-3 divide-y uppercase font-lato pt-5">
                    <li class="pt-3">
                        <a href="{{ $baseUrl }}/login" class="flex items-center space-x-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.021 4.23113C14.4479 2.58912 12.2713 1.66246 9.99731 1.66664C5.40187 1.66085 1.67181 5.3815 1.66602 9.97697C1.66316 12.2493 2.58973 14.4239 4.23051 15.9959C4.23529 16.0006 4.23706 16.0078 4.24181 16.0119C4.28999 16.0583 4.34236 16.0976 4.39118 16.1423C4.52507 16.2613 4.65896 16.3845 4.8 16.4993C4.87555 16.5588 4.95411 16.6183 5.03148 16.6731C5.16478 16.7724 5.29807 16.8718 5.4373 16.9635C5.53193 17.023 5.62952 17.0825 5.72649 17.142C5.85501 17.2194 5.98297 17.2973 6.11568 17.3681C6.22816 17.4276 6.34298 17.4788 6.45724 17.5329C6.5822 17.5924 6.70539 17.6519 6.83331 17.7055C6.96124 17.759 7.0898 17.8007 7.2195 17.8471C7.34921 17.8935 7.4611 17.9364 7.58547 17.9744C7.72592 18.0167 7.86992 18.0494 8.01273 18.0845C8.13174 18.1137 8.24718 18.147 8.36977 18.1708C8.534 18.2036 8.70063 18.2244 8.86726 18.247C8.97022 18.2613 9.07078 18.2815 9.17489 18.2916C9.44745 18.3184 9.72234 18.3333 9.99964 18.3333C10.2769 18.3333 10.5519 18.3184 10.8244 18.2916C10.9285 18.2815 11.0291 18.2613 11.132 18.247C11.2987 18.2244 11.4653 18.2036 11.6295 18.1708C11.7485 18.147 11.8676 18.1113 11.9866 18.0845C12.1294 18.0494 12.2734 18.0167 12.4138 17.9744C12.5382 17.9364 12.6584 17.89 12.7798 17.8471C12.9012 17.8043 13.0392 17.7578 13.166 17.7055C13.2927 17.6531 13.4171 17.5918 13.5421 17.5329C13.6563 17.4788 13.7712 17.4276 13.8836 17.3681C14.0163 17.2973 14.1442 17.2193 14.2728 17.142C14.3698 17.0825 14.4674 17.0283 14.562 16.9635C14.7012 16.8718 14.8345 16.7725 14.9678 16.6731C15.0452 16.6135 15.1237 16.56 15.1993 16.4993C15.3403 16.3862 15.4742 16.266 15.6081 16.1423C15.6569 16.0976 15.7093 16.0584 15.7575 16.0119C15.7622 16.0078 15.764 16.0006 15.7688 15.9959C19.0872 12.8167 19.2001 7.54948 16.021 4.23113ZM14.6835 15.3728C14.5752 15.468 14.4633 15.5585 14.3503 15.646C14.2836 15.6972 14.217 15.7477 14.1485 15.7965C14.0408 15.8745 13.9313 15.9483 13.82 16.0191C13.7391 16.0709 13.6564 16.1208 13.5731 16.1696C13.4683 16.2292 13.3618 16.2886 13.2541 16.3482C13.1589 16.3969 13.0619 16.4428 12.9643 16.488C12.8668 16.5332 12.759 16.5814 12.6537 16.6237C12.5484 16.6659 12.4365 16.7058 12.3264 16.7427C12.2258 16.7772 12.1253 16.8129 12.0235 16.8432C11.9045 16.8789 11.7801 16.9081 11.657 16.9379C11.5605 16.9605 11.4654 16.9861 11.3678 17.0051C11.2267 17.0325 11.0827 17.0515 10.9381 17.0712C10.856 17.0819 10.7745 17.0968 10.6918 17.1051C10.4632 17.1271 10.2318 17.1402 9.9979 17.1402C9.76405 17.1402 9.53256 17.1271 9.30404 17.1051C9.22134 17.0968 9.13982 17.0819 9.05767 17.0712C8.91308 17.0515 8.76907 17.0325 8.62804 17.0051C8.53044 16.9861 8.43522 16.9605 8.33885 16.9379C8.21566 16.9081 8.09307 16.8784 7.97229 16.8432C7.87055 16.8129 7.76995 16.7772 7.6694 16.7427C7.55932 16.7046 7.44921 16.6659 7.3421 16.6237C7.23498 16.5814 7.13383 16.535 7.03146 16.488C6.92909 16.441 6.83687 16.397 6.74168 16.3482C6.63398 16.2922 6.52746 16.2333 6.42272 16.1696C6.33942 16.1209 6.25668 16.0709 6.17575 16.0191C6.06449 15.9483 5.95497 15.8745 5.84727 15.7965C5.77882 15.7477 5.71219 15.6972 5.64553 15.646C5.53245 15.5585 5.4206 15.4674 5.3123 15.3728C5.28611 15.3532 5.2623 15.3282 5.23674 15.3056C5.26335 13.2813 6.56379 11.4938 8.48166 10.8455C9.44062 11.3017 10.554 11.3017 11.513 10.8455C13.4308 11.4938 14.7312 13.2812 14.7579 15.3056C14.7329 15.3282 14.7091 15.3508 14.6835 15.3728ZM7.92225 6.43781C8.56657 5.29193 10.0178 4.88534 11.1637 5.52965C12.3095 6.17397 12.7161 7.62518 12.0718 8.77105C11.858 9.15125 11.5439 9.4654 11.1637 9.67921C11.1607 9.67921 11.1571 9.6792 11.1535 9.68276C10.9957 9.77059 10.829 9.84123 10.6561 9.89343C10.6251 9.90236 10.5965 9.91425 10.5638 9.92199C10.5043 9.93747 10.4418 9.94817 10.3805 9.95888C10.2651 9.97906 10.1484 9.99078 10.0312 9.99399H9.96338C9.84626 9.99078 9.72949 9.97906 9.61408 9.95888C9.55456 9.94817 9.49149 9.93747 9.43082 9.92199C9.39926 9.91425 9.3713 9.90236 9.3386 9.89343C9.16569 9.84123 8.99892 9.77063 8.84111 9.68276L8.83041 9.67921C7.68453 9.03489 7.27794 7.58368 7.92225 6.43781ZM15.8135 14.1256C15.4316 12.3445 14.2588 10.8345 12.6275 10.0238C13.961 8.57119 13.8644 6.3126 12.4118 4.9791C10.9592 3.6456 8.70063 3.74218 7.36713 5.19479C6.11351 6.5604 6.11351 8.65822 7.36713 10.0238C5.73587 10.8345 4.563 12.3445 4.18114 14.1256C1.89928 10.9114 2.65507 6.45601 5.86924 4.17415C9.0834 1.8923 13.5388 2.64808 15.8207 5.86225C16.6784 7.07051 17.1389 8.51579 17.1382 9.99758C17.1382 11.4781 16.675 12.9215 15.8135 14.1256Z" fill="#9A7474"/>
                            </svg>                                    
                            <span class="text-sm text-brown"> {{trans('header.Login')}}</span>
                        </a>
                    </li>
                    <li class="pt-3">
                        <a href="{{ $baseUrl }}/shopping-cart" class="flex items-center space-x-3" x-data="{shoppingIconShow:window.mutualVar.cookiesInfo.shoppingCart.items.length}">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.2002 3.56545C17.0822 3.41437 16.9011 3.32625 16.7093 3.32625H4.51435L3.95324 0.978584C3.88612 0.698048 3.63527 0.5 3.34683 0.5H1.28946C0.945119 0.499967 0.666016 0.779071 0.666016 1.12341C0.666016 1.46775 0.945119 1.74685 1.28946 1.74685H2.85473L4.88092 10.2249C4.94804 10.5056 5.19889 10.7034 5.48734 10.7034H15.1923C15.4789 10.7034 15.7287 10.5081 15.7975 10.23L17.3145 4.0995C17.3604 3.91333 17.3182 3.71652 17.2002 3.56545ZM14.7045 9.4566H5.97943L4.81233 4.57314H15.9128L14.7045 9.4566ZM13.8623 11.5973C12.7164 11.5973 11.7842 12.5296 11.7842 13.6754C11.7842 14.8213 12.7164 15.7536 13.8623 15.7536C15.0082 15.7536 15.9404 14.8213 15.9404 13.6754C15.9404 12.5296 15.0082 11.5973 13.8623 11.5973ZM13.8623 14.5067C13.4039 14.5067 13.0311 14.1339 13.0311 13.6754C13.0311 13.217 13.4039 12.8442 13.8623 12.8442C14.3207 12.8442 14.6936 13.217 14.6936 13.6754C14.6936 14.1339 14.3207 14.5067 13.8623 14.5067ZM4.24047 13.6754C4.24047 12.5296 5.17271 11.5973 6.31861 11.5973C7.46449 11.5973 8.39675 12.5296 8.39675 13.6754C8.39675 14.8213 7.46449 15.7536 6.31861 15.7536C5.17274 15.7536 4.24047 14.8213 4.24047 13.6754ZM5.48736 13.6754C5.48736 14.1339 5.86018 14.5067 6.31861 14.5067C6.77705 14.5067 7.14987 14.1339 7.14987 13.6754C7.14987 13.217 6.77705 12.8442 6.31861 12.8442C5.86018 12.8442 5.48736 13.217 5.48736 13.6754Z" fill="#9A7474"/>
                            </svg>
                            <sup class="text-brown" x-show="shoppingIconShow>0" x-text="shoppingIconShow"> 
                            </sup>
                            <span class="text-sm text-brown"> {{trans('header.My Cart')}}</span>
                        </a>
                    </li>
                </ul>
                <ul class="flex items-center space-x-3">
                    <li>
                        <a href="/links/facebook">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 9C18 4.02943 13.9706 0 9 0C4.02943 0 0 4.02943 0 9C0 13.4921 3.29115 17.2155 7.59375 17.8907V11.6016H5.30859V9H7.59375V7.01719C7.59375 4.76156 8.93742 3.51563 10.9932 3.51563C11.9779 3.51563 13.0078 3.69141 13.0078 3.69141V5.90625H11.873C10.755 5.90625 10.4062 6.60006 10.4062 7.3118V9H12.9023L12.5033 11.6016H10.4062V17.8907C14.7088 17.2155 18 13.4921 18 9Z" fill="#1877F2"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="/links/instagram">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6377 1H6.3623C3.40551 1 1 3.40551 1 6.3623V13.6377C1 16.5945 3.40551 19 6.3623 19H13.6377C16.5945 19 19 16.5945 19 13.6377V6.3623C19 3.40551 16.5945 1 13.6377 1ZM17.1892 13.6377C17.1892 15.5991 15.5991 17.1892 13.6377 17.1892H6.3623C4.40088 17.1892 2.8108 15.5991 2.8108 13.6377V6.3623C2.8108 4.40084 4.40088 2.8108 6.3623 2.8108H13.6377C15.5991 2.8108 17.1892 4.40084 17.1892 6.3623V13.6377ZM9.99998 5.34454C7.43297 5.34454 5.34454 7.43297 5.34454 9.99995C5.34454 12.5669 7.43297 14.6554 9.99998 14.6554C12.567 14.6554 14.6554 12.567 14.6554 9.99995C14.6554 7.43294 12.567 5.34454 9.99998 5.34454ZM9.99998 12.8446C8.42892 12.8446 7.15534 11.571 7.15534 9.99998C7.15534 8.42892 8.42895 7.15534 9.99998 7.15534C11.571 7.15534 12.8446 8.42892 12.8446 9.99998C12.8446 11.571 11.571 12.8446 9.99998 12.8446ZM15.78 5.37947C15.78 5.99556 15.2805 6.49501 14.6645 6.49501C14.0484 6.49501 13.5489 5.99556 13.5489 5.37947C13.5489 4.76337 14.0484 4.26393 14.6645 4.26393C15.2805 4.26393 15.78 4.76337 15.78 5.37947Z" fill="url(#paint0_linear)"/>
                            <defs>
                            <linearGradient id="paint0_linear" x1="14.6645" y1="18.9476" x2="14.6645" y2="1.13981" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#E09B3D"/>
                            <stop offset="0.3" stop-color="#C74C4D"/>
                            <stop offset="0.6" stop-color="#C21975"/>
                            <stop offset="1" stop-color="#7024C4"/>
                            </linearGradient>
                            </defs>
                            </svg>                          
                        </a>
                    </li>
                    <li>
                        <a href="/links/twitter">
                            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 1.73137C17.3306 2.025 16.6174 2.21962 15.8737 2.31412C16.6388 1.85737 17.2226 1.13962 17.4971 0.2745C16.7839 0.69975 15.9964 1.00013 15.1571 1.16775C14.4799 0.446625 13.5146 0 12.4616 0C10.4186 0 8.77387 1.65825 8.77387 3.69113C8.77387 3.98363 8.79862 4.26487 8.85938 4.53262C5.7915 4.383 3.07687 2.91263 1.25325 0.67275C0.934875 1.22513 0.748125 1.85738 0.748125 2.538C0.748125 3.816 1.40625 4.94887 2.38725 5.60475C1.79437 5.5935 1.21275 5.42138 0.72 5.15025C0.72 5.1615 0.72 5.17613 0.72 5.19075C0.72 6.984 1.99912 8.4735 3.6765 8.81662C3.37612 8.89875 3.04875 8.93812 2.709 8.93812C2.47275 8.93812 2.23425 8.92463 2.01038 8.87512C2.4885 10.3365 3.84525 11.4109 5.4585 11.4457C4.203 12.4279 2.60888 13.0196 0.883125 13.0196C0.5805 13.0196 0.29025 13.0061 0 12.969C1.63462 14.0231 3.57188 14.625 5.661 14.625C12.4515 14.625 16.164 9 16.164 4.12425C16.164 3.96112 16.1584 3.80363 16.1505 3.64725C16.8829 3.1275 17.4982 2.47837 18 1.73137Z" fill="#00ACEE"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="/links/facebook">
                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5818 2.2C19.3523 1.33409 18.6739 0.652273 17.8136 0.420455C16.2545 0 10 0 10 0C10 0 3.74545 0 2.18636 0.420455C1.32614 0.652273 0.647727 1.33409 0.418182 2.2C0 3.77045 0 7.04545 0 7.04545C0 7.04545 0 10.3205 0.418182 11.8909C0.647727 12.7568 1.32614 13.4386 2.18636 13.6705C3.74545 14.0909 10 14.0909 10 14.0909C10 14.0909 16.2545 14.0909 17.8136 13.6705C18.6739 13.4386 19.3523 12.7568 19.5818 11.8909C20 10.3205 20 7.04545 20 7.04545C20 7.04545 20 3.77045 19.5818 2.2ZM7.95455 10.0193V4.07159L13.1818 7.04545L7.95455 10.0193Z" fill="#FF0000"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul class="flex items-center divide-x divide-opacity-20 space-x-3 mt-5 font-lato">
                    <li>
                        <a class="pl-3 {{app()->getLocale()=='hk'?'active':''}}" href="{{ '/hk' . substr(str_replace(url(''),'',url()->current()), 3) }}">
                            <span>繁</span>
                        </a>
                    </li>
                    <li>
                        <a class="pl-3 {{app()->getLocale()=='cn'?'active':''}}" href="{{ '/cn' . substr(str_replace(url(''),'',url()->current()), 3) }}">
                            <span>简</span>
                        </a>
                    </li>
                    <li>
                        <a class="pl-3 {{app()->getLocale()=='en'?'active':''}}" href="{{ '/en' . substr(str_replace(url(''),'',url()->current()), 3) }}">
                            <span>Eng</span>
                        </a>
                    </li>
                </ul>
            </div> 
            
        </div>
        <div class="sidebarOverlay inset-0 left-3/4 fixed h-full w-1/4 pointer-events-none">
            <div class="absolute inset-0 bg-black opacity-75"></div>
        </div>
    </div>
</div>