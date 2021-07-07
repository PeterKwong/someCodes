<!DOCTYPE html>

@include('layouts.head.lang')

<head>
    @include('layouts.head.schema')
    @include('layouts.head.google')
    @include('layouts.head.twitter')
    
    @include('layouts.metas.userApiToken')
    @include('layouts.metas.mutualVar')
    @include('layouts.metas.stripeHeaders')
    @include('layouts.metas.cache')

    @include('layouts.head.asset')

    @yield('meta')
    

    @livewireStyles

</head>
<body>
     <header class="max-w-screen-2xl 2xl:mx-auto mx-5 md:mx-10 lg:mx-20 py-2 lg:py-10">
        <!-- Header for Desktop  -->
        <div class="hidden lg:flex lg:flex-col">
            <div class="order-2 lg:order-1 flex flex-col lg:flex-row lg:items-center justify-between pb-10">
                <ul class="hidden lg:flex items-center space-x-5">
                    <li>
                        <a href="https://facebook.com/">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 9C18 4.02943 13.9706 0 9 0C4.02943 0 0 4.02943 0 9C0 13.4921 3.29115 17.2155 7.59375 17.8907V11.6016H5.30859V9H7.59375V7.01719C7.59375 4.76156 8.93742 3.51563 10.9932 3.51563C11.9779 3.51563 13.0078 3.69141 13.0078 3.69141V5.90625H11.873C10.755 5.90625 10.4062 6.60006 10.4062 7.3118V9H12.9023L12.5033 11.6016H10.4062V17.8907C14.7088 17.2155 18 13.4921 18 9Z" fill="#1877F2"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6377 0H5.3623C2.40551 0 0 2.40551 0 5.3623V12.6377C0 15.5945 2.40551 18 5.3623 18H12.6377C15.5945 18 18 15.5945 18 12.6377V5.3623C18 2.40551 15.5945 0 12.6377 0ZM16.1892 12.6377C16.1892 14.5991 14.5991 16.1892 12.6377 16.1892H5.3623C3.40088 16.1892 1.8108 14.5991 1.8108 12.6377V5.3623C1.8108 3.40084 3.40088 1.8108 5.3623 1.8108H12.6377C14.5991 1.8108 16.1892 3.40084 16.1892 5.3623V12.6377ZM8.99998 4.34454C6.43297 4.34454 4.34454 6.43297 4.34454 8.99995C4.34454 11.5669 6.43297 13.6554 8.99998 13.6554C11.567 13.6554 13.6554 11.567 13.6554 8.99995C13.6554 6.43294 11.567 4.34454 8.99998 4.34454ZM8.99998 11.8446C7.42892 11.8446 6.15534 10.571 6.15534 8.99998C6.15534 7.42892 7.42895 6.15534 8.99998 6.15534C10.571 6.15534 11.8446 7.42892 11.8446 8.99998C11.8446 10.571 10.571 11.8446 8.99998 11.8446ZM14.78 4.37947C14.78 4.99556 14.2805 5.49501 13.6645 5.49501C13.0484 5.49501 12.5489 4.99556 12.5489 4.37947C12.5489 3.76337 13.0484 3.26393 13.6645 3.26393C14.2805 3.26393 14.78 3.76337 14.78 4.37947Z" fill="url(#paint0_linear)"/>
                                <defs>
                                <linearGradient id="paint0_linear" x1="13.6645" y1="17.9476" x2="13.6645" y2="0.139811" gradientUnits="userSpaceOnUse">
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
                        <a href="https://twitter.com/">
                            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 1.73137C17.3306 2.025 16.6174 2.21962 15.8737 2.31412C16.6388 1.85737 17.2226 1.13962 17.4971 0.2745C16.7839 0.69975 15.9964 1.00013 15.1571 1.16775C14.4799 0.446625 13.5146 0 12.4616 0C10.4186 0 8.77387 1.65825 8.77387 3.69113C8.77387 3.98363 8.79862 4.26487 8.85938 4.53262C5.7915 4.383 3.07687 2.91263 1.25325 0.67275C0.934875 1.22513 0.748125 1.85738 0.748125 2.538C0.748125 3.816 1.40625 4.94887 2.38725 5.60475C1.79437 5.5935 1.21275 5.42138 0.72 5.15025C0.72 5.1615 0.72 5.17613 0.72 5.19075C0.72 6.984 1.99912 8.4735 3.6765 8.81662C3.37612 8.89875 3.04875 8.93812 2.709 8.93812C2.47275 8.93812 2.23425 8.92463 2.01038 8.87512C2.4885 10.3365 3.84525 11.4109 5.4585 11.4457C4.203 12.4279 2.60888 13.0196 0.883125 13.0196C0.5805 13.0196 0.29025 13.0061 0 12.969C1.63462 14.0231 3.57188 14.625 5.661 14.625C12.4515 14.625 16.164 9 16.164 4.12425C16.164 3.96112 16.1584 3.80363 16.1505 3.64725C16.8829 3.1275 17.4982 2.47837 18 1.73137Z" fill="#00ACEE"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://facebook.com/">
                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5818 2.2C19.3523 1.33409 18.6739 0.652273 17.8136 0.420455C16.2545 0 10 0 10 0C10 0 3.74545 0 2.18636 0.420455C1.32614 0.652273 0.647727 1.33409 0.418182 2.2C0 3.77045 0 7.04545 0 7.04545C0 7.04545 0 10.3205 0.418182 11.8909C0.647727 12.7568 1.32614 13.4386 2.18636 13.6705C3.74545 14.0909 10 14.0909 10 14.0909C10 14.0909 16.2545 14.0909 17.8136 13.6705C18.6739 13.4386 19.3523 12.7568 19.5818 11.8909C20 10.3205 20 7.04545 20 7.04545C20 7.04545 20 3.77045 19.5818 2.2ZM7.95455 10.0193V4.07159L13.1818 7.04545L7.95455 10.0193Z" fill="#FF0000"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <nav class="flex items-center space-x-5">
                    <ul class="flex items-center space-x-5">
                        <li class="hidden lg:inline-block">
                            <a href="#">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.6702 4.44321C18.4051 2.07883 15.2709 0.744484 11.9965 0.750509C5.37939 0.742174 0.00832855 6.09968 -5.75915e-06 12.7169C-0.00412271 15.9888 1.33007 19.1201 3.6927 21.3837C3.69957 21.3905 3.70214 21.4008 3.70896 21.4068C3.77835 21.4737 3.85376 21.5303 3.92405 21.5945C4.11684 21.7659 4.30964 21.9433 4.51272 22.1086C4.62152 22.1943 4.73464 22.28 4.84604 22.3588C5.03798 22.5019 5.22992 22.645 5.4304 22.777C5.56666 22.8627 5.70719 22.9483 5.84681 23.034C6.03188 23.1455 6.21613 23.2577 6.40722 23.3596C6.56919 23.4453 6.73452 23.519 6.89904 23.597C7.07899 23.6827 7.25637 23.7683 7.44058 23.8454C7.62478 23.9226 7.8099 23.9825 7.99666 24.0494C8.18343 24.1162 8.34455 24.1779 8.52363 24.2327C8.72587 24.2936 8.93322 24.3407 9.13887 24.3912C9.31022 24.4332 9.47646 24.4812 9.65298 24.5155C9.88946 24.5626 10.1294 24.5926 10.3693 24.6252C10.5176 24.6458 10.6624 24.6749 10.8123 24.6895C11.2048 24.728 11.6006 24.7495 11.9999 24.7495C12.3992 24.7495 12.7951 24.728 13.1875 24.6895C13.3375 24.6749 13.4822 24.6458 13.6305 24.6252C13.8704 24.5926 14.1103 24.5626 14.3468 24.5155C14.5182 24.4812 14.6896 24.4298 14.8609 24.3912C15.0666 24.3407 15.2739 24.2935 15.4762 24.2327C15.6552 24.1779 15.8283 24.1111 16.0031 24.0494C16.1779 23.9877 16.3767 23.9208 16.5592 23.8454C16.7417 23.77 16.9208 23.6818 17.1007 23.597C17.2653 23.519 17.4307 23.4453 17.5926 23.3596C17.7837 23.2577 17.9679 23.1454 18.153 23.034C18.2927 22.9483 18.4332 22.8704 18.5694 22.777C18.7699 22.645 18.9619 22.502 19.1537 22.3588C19.2652 22.2731 19.3782 22.196 19.4871 22.1086C19.6902 21.9458 19.8829 21.7727 20.0757 21.5945C20.146 21.5303 20.2214 21.4737 20.2908 21.4068C20.2977 21.4009 20.3003 21.3906 20.3071 21.3837C25.0855 16.806 25.248 9.22143 20.6702 4.44321ZM18.7444 20.4866C18.5884 20.6237 18.4273 20.7539 18.2645 20.8799C18.1686 20.9536 18.0726 21.0264 17.974 21.0967C17.819 21.2089 17.6613 21.3152 17.501 21.4171C17.3845 21.4917 17.2654 21.5636 17.1454 21.6339C16.9946 21.7196 16.8412 21.8053 16.6861 21.891C16.549 21.9612 16.4093 22.0272 16.2689 22.0924C16.1284 22.1575 15.9733 22.2269 15.8216 22.2877C15.6699 22.3486 15.5088 22.406 15.3503 22.4591C15.2055 22.5088 15.0607 22.5602 14.9141 22.6039C14.7428 22.6553 14.5637 22.6973 14.3863 22.7401C14.2475 22.7727 14.1104 22.8095 13.9699 22.837C13.7668 22.8764 13.5595 22.9038 13.3513 22.9321C13.233 22.9475 13.1156 22.9689 12.9965 22.9809C12.6674 23.0126 12.3341 23.0315 11.9974 23.0315C11.6606 23.0315 11.3273 23.0127 10.9983 22.9809C10.8792 22.9689 10.7618 22.9475 10.6435 22.9321C10.4353 22.9038 10.2279 22.8764 10.0249 22.837C9.88433 22.8096 9.74722 22.7727 9.60845 22.7401C9.43107 22.6973 9.25454 22.6544 9.08063 22.6039C8.93412 22.5602 8.78928 22.5088 8.64448 22.4591C8.48598 22.4042 8.32743 22.3485 8.17319 22.2877C8.01896 22.2269 7.87331 22.16 7.7259 22.0924C7.57849 22.0247 7.4457 21.9613 7.30863 21.891C7.15354 21.8105 7.00016 21.7256 6.84934 21.6339C6.7294 21.5637 6.61026 21.4917 6.49373 21.4171C6.33352 21.3152 6.17582 21.2089 6.02073 21.0967C5.92217 21.0264 5.82623 20.9536 5.73023 20.8799C5.56741 20.7539 5.40635 20.6228 5.25041 20.4866C5.2127 20.4583 5.17841 20.4223 5.14161 20.3897C5.17992 17.4749 7.05248 14.9011 9.8141 13.9675C11.1949 14.6244 12.7981 14.6244 14.179 13.9675C16.9405 14.9011 18.8131 17.4748 18.8514 20.3897C18.8155 20.4223 18.7812 20.4549 18.7444 20.4866ZM9.00858 7.62069C9.93635 5.9707 12.026 5.38524 13.676 6.31301C15.326 7.24078 15.9114 9.33043 14.9837 10.9804C14.6759 11.5279 14.2235 11.9802 13.676 12.2881C13.6717 12.2881 13.6666 12.2881 13.6614 12.2932C13.4342 12.4197 13.1941 12.5214 12.9451 12.5966C12.9006 12.6094 12.8594 12.6265 12.8123 12.6377C12.7266 12.66 12.6366 12.6754 12.5484 12.6908C12.3822 12.7199 12.214 12.7368 12.0454 12.7414H11.9477C11.779 12.7368 11.6109 12.7199 11.4447 12.6908C11.359 12.6754 11.2682 12.66 11.1808 12.6377C11.1354 12.6265 11.0951 12.6094 11.048 12.5966C10.7991 12.5214 10.5589 12.4197 10.3317 12.2932L10.3163 12.2881C8.66627 11.3603 8.08081 9.27068 9.00858 7.62069ZM20.3715 18.6906C19.8216 16.1259 18.1328 13.9516 15.7839 12.7843C17.704 10.6926 17.565 7.4404 15.4733 5.52024C13.3816 3.60009 10.1294 3.73916 8.20924 5.83082C6.40411 7.79722 6.40411 10.818 8.20924 12.7843C5.86032 13.9517 4.17147 16.1259 3.6216 18.6906C0.335877 14.0624 1.42416 7.6469 6.05236 4.36117C10.6806 1.07545 17.0961 2.16373 20.3818 6.79193C21.6169 8.53174 22.28 10.6129 22.2789 12.7465C22.2789 14.8784 21.612 16.9568 20.3715 18.6906Z" fill="#656565"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.0026 17.7476C17.3525 17.7476 16.0101 19.09 16.0101 20.7401C16.0101 22.3901 17.3526 23.7326 19.0026 23.7326C20.6527 23.7326 21.9951 22.3901 21.9951 20.7401C21.9951 19.09 20.6527 17.7476 19.0026 17.7476ZM19.0026 21.9371C18.3425 21.9371 17.8056 21.4002 17.8056 20.7401C17.8056 20.0799 18.3425 19.5431 19.0026 19.5431C19.6628 19.5431 20.1996 20.0799 20.1996 20.7401C20.1996 21.4002 19.6628 21.9371 19.0026 21.9371Z" fill="#656565"/>
                                    <path d="M23.8092 6.1817C23.6392 5.96415 23.3786 5.83726 23.1024 5.83726H5.54159L4.73361 2.45662C4.63695 2.05265 4.27573 1.76746 3.86037 1.76746H0.897755C0.401909 1.76741 0 2.16932 0 2.66516C0 3.16101 0.401909 3.56292 0.897755 3.56292H3.15175L6.06946 15.7713C6.16611 16.1756 6.52733 16.4604 6.9427 16.4604H20.9179C21.3305 16.4604 21.6902 16.1791 21.7893 15.7787L23.9738 6.95074C24.0399 6.68266 23.9792 6.39925 23.8092 6.1817ZM20.2155 14.665H7.65131L5.97069 7.63277H21.9553L20.2155 14.665Z" fill="#656565"/>
                                    <path d="M8.1397 17.7476C6.4896 17.7476 5.14719 19.09 5.14719 20.7401C5.14719 22.3901 6.48965 23.7326 8.1397 23.7326C9.78976 23.7326 11.1322 22.3901 11.1322 20.7401C11.1322 19.09 9.78976 17.7476 8.1397 17.7476ZM8.1397 21.9371C7.47956 21.9371 6.9427 21.4002 6.9427 20.7401C6.9427 20.0799 7.47956 19.5431 8.1397 19.5431C8.79985 19.5431 9.33671 20.0799 9.33671 20.7401C9.33671 21.4002 8.79985 21.9371 8.1397 21.9371Z" fill="#656565"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <ul class="hidden lg:flex items-center diamond-detail-language divide-x divide-opacity-20 space-x-3 font-lato">
                        <li>
                            <a class="pl-3" href="#">
                                <span>繁</span>
                            </a>
                        </li>
                        <li>
                            <a class="pl-3" href="#">
                                <span>简</span>
                            </a>
                        </li>
                        <li>
                            <a class="pl-3 active" href="#">
                                <span>Eng</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="relative order-1 lg:order-2 flex items-center px-5">
                <button class="inline-block lg:hidden">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.75 15.5H23.25V13H0.75V15.5ZM0.75 9.25H23.25V6.75H0.75V9.25ZM0.75 0.5V3H23.25V0.5H0.75Z" fill="#656565"/>
                    </svg>                
                </button>
                <a class="lg:mr-10" href="#">
                    <img src="/assets/images/Logo.svg" alt="">
                </a>
                <ul class="hidden lg:flex flex-col w-52 space-y-3 lg:space-y-0 lg:w-auto lg:flex-row lg:items-center lg:space-x-10 diamond-details navbar font-suranna">
                    <li x-data="{diamondDropdown : false}" class="">
                        <a @mouseover="diamondDropdown = true" :class="{'active' : diamondDropdown}" href="#">
                            <span>Diamond</span>
                        </a> 
                        <div x-show="diamondDropdown" @mouseleave="diamondDropdown = false" class="flex flex-col absolute top-16 left-2">
                            <div class="div h-16 opacity-0"></div>
                            <div class="flex space-x-10 w-full bg-white border-t py-5 px-8 font-lato">
                                <div class="flex flex-col space-y-2">
                                    <p class="font-lato font-bold text-brown">Design Your Engagement Rings</p>
                                    <a href="#" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.3681 4.19995C21.6044 4.19995 8.47504 4.19995 7.63321 4.19995L3 10.5179L15.0498 26.3994L27 10.5161L22.3681 4.19995ZM9.58739 11.212L12.9823 21.3544L5.28697 11.212H9.58739ZM11.0663 11.212H18.9391L15.0298 23.053L11.0663 11.212ZM20.4161 11.212H24.7214L17.0495 21.4089L20.4161 11.212ZM21.6573 5.60237L24.7427 9.80962H20.417L19.0365 5.60237H21.6573ZM17.5605 5.60237L18.941 9.80962H11.0603L12.4408 5.60237H17.5605ZM8.34387 5.60237H10.9647L9.58421 9.80962H5.25855L8.34387 5.60237Z" fill="#666666"/>
                                        </svg>                                    
                                        <span class="font-lato group-hover:border-b border-brown text-brown">Start with a Diamond</span>
                                    </a>
                                    <a href="#" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 27C8.39255 27 3 21.6071 3 15C3 8.39255 8.39292 3 15 3C21.6075 3 27 8.39292 27 15C27 21.6075 21.6071 27 15 27ZM15 4.40625C9.15858 4.40625 4.40625 9.15858 4.40625 15C4.40625 20.8414 9.15858 25.5938 15 25.5938C20.8414 25.5938 25.5938 20.8414 25.5938 15C25.5938 9.15858 20.8414 4.40625 15 4.40625Z" fill="#666666"/>
                                            <path d="M15 24.1875C9.95377 24.1875 5.8125 20.0453 5.8125 15C5.8125 9.95377 9.95475 5.8125 15 5.8125C20.0462 5.8125 24.1875 9.9547 24.1875 15C24.1875 20.0462 20.0452 24.1875 15 24.1875ZM15 7.21875C10.7094 7.21875 7.21875 10.7094 7.21875 15C7.21875 19.2906 10.7094 22.7812 15 22.7812C19.2906 22.7812 22.7812 19.2906 22.7812 15C22.7812 10.7094 19.2906 7.21875 15 7.21875Z" fill="#666666"/>
                                        </svg>                                                                      
                                        <span class="font-lato">Start with a Setting</span>
                                    </a>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <p class="font-lato font-bold text-brown">Loose Diamond</p>
                                    <a href="#" class="dd-link group flex space-x-2 items-center max-w-max">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect width="24" height="24" fill="url(#pattern0)"/>
                                            <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0" transform="scale(0.0133333)"/>
                                            </pattern>
                                            <image id="image0" width="75" height="75" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAHh0lEQVR4AeWa247kZAyE5/1fA8QtgtuFe+ClFn2hK6p22/6d9GmGRQr/wa5yueKMVqP5+Hjzf3/9/c93nm9//Lk9v/72+3c9ulPOm6W+vjwGuBkY4Sp++vmXzTRWv5ehjvX4/2avBqMxsUHylMPKOeb4WTmO8/iX2TNBTIeaXwmnYTCepyn0u2pPHU1llfPp7r3B1WRIfGaUYs6nu2pVvY6vwr70vmpKDVRiKpznT5rP6kxwXucl++5zy5qQqIlRyl01XtXR5ymet62TZhFLXhR5ponqpcAPX6zh55XZnvvwPcVXAlWUJrXXmt0p1q2ZYVMu9FYT2NW8KzYVpyLxzR/Fi0er4zEgm1zlZuvLDHOhmZDqTgLP4iOveMQb46uz8Ku803EKIK56eMP+8Nb1gHm0QOlRDU2ZNFQ6df9oPbuxErZfNJtMvMw6+slUZeCRJpnjdSuc30uT39291xuA/CyZsDSkJs9wqUF4wIv3LBc49XeG4wrjYnx/lTQ4ROxR08DTlExSycir+8nqWN9PsDc5jLeLO0sYebzQyjRqZiaJA/xZXY6DB53iPbw6GeB4nhJOxxx+CWbl7C+rqjflj/jYTzzH/PKcCThLNsVpyqjNMzGKBuCf5nrDma6sb8fc7KvPJiO/AYeLCYZ6iNRUiaK6V1wrRk3qKF9rhoEr6lB+umYkJFb3KcnlsntT8E0miAbI6+p3dSp9FV91f8PTudrFbog+Pj6ytzRpPOPSnQyOWjjDrbzVmmlzTOT32L7vXD0qCC41UDW5Fz64QYtPG3U67ZF+ZdaSa+XmUbNoRg3JtCj63rNMUq0p38oseFo/1FhVkAKrpl388u1UhU7ea3pZJzo7M8RVSlEBJeosAOeqgDCKY7xwr1ypK516+bEP9KAz3nOmDx5xpNpJiAEIKSgDIoHiInd8xufxZ+1jXRngfVDbzVIf6tO1Rb4tll5eUCpIjj/cO7H25FQx5TxrldaMXzHvYaWV+A3XpDneDs8NOFxMcgLkocdJ/WkvN75k4xfVS4CPb8zhDPmEL8M+6o76nQbXqL662ldc6agZOhLGs6U+7ndDTnpif0QjuTcTZDWv/Lk6WBIEWVHyK/KKy2hfsq00ojvT2Bl2lX81ZpdWuMuMUqdZ7IpUiW9aO1MqSfRUebFhII1TAmDVOPGIywyshL3iPvZQGehawETD9j73zQVBciziZL53cygQuTz3HXs0eeOut9MTPaCvrTcny1xdkSo+FaL8V63SRbPTIUAbvnj+5pPMOmqUmgWHEPHo/rOs6DpqlLSDveqPA+5vY6asAyuEensHYC9NRd/Zl4kv4PFp++3nWSJ1/BXMOjsM9KgJ28yi2bNkP9RkaaoYM+01MZP16pueAF6cQ08822d0sLZwDNLmzfa/C8lRw1zAZ/0UpYuGXe/KNxmlvM2n+PlBOCWVEAghi1wq9K51n4iLANfbaYoewLP1tm8MHV210L6FcCPYbx74BxbGec82moPe1SAQ36bICl95FIPkcReLGT797cJKiOOfva+MWfVUebHrrZqkYEZOPrGdwDYVl6W8ZFtp7Ewc9dQ1mBmWGSgHuphyXrF2OmKMc2UUWq/8yUYvNqQC5HbExCZ8kf+RZ+p3Glyj+urq33B1BogI4gn5JEecz1gn9ae9pL5cjVroAADx+KREd/wJUCh76iitGVixaR9wpL5kl4wfb0BjSDHtRUQ8w2Z3WQOPvot1ZVDUSR/EqB/7dE2Rb48JTALkOiuBs5ule1ZhFAfv8VftpVsGoCv2gRbi8Z4z+cKol1R7dD8mQRYLZDkyjjXGn3n2uhOdnRniKvV2YEDZ2yjJLn8yrRewEt/xdDF41diRaQY36bernf9AuyCOmkUTMkkNrQS24iwIj14E1zLNUtrtyiz0tgQEu2a6WEacCeLOm8xw3V1lOtrg7rAey7Qp3sWUs6+Vq0fNgrD7NNT4qkni5PJUuV2dvbGwqfqs7gP8v2P1lg6RXJgnGOrRbHwZ1X0ULTPj/eqcaYMr6ljxpBORkS+Jqn/YJUCEYpqeaooiFF3TXMdm/ZyZ0I0zksWzF+72UwHw81b1dqf1pvxRY+SP55jfniVcSWfJIo/4WDVNFTf3mFFNDvcV1utke8fpBWV54zsn9P2Y4JIYsSuTIj/4zLTIG3Hd2bG+7zDLmMb8HkJhj5oUxcHjpok35k3Owqq/CWaUA6HIJwBM0WjzGapJ9hP8KgceaWLPo5qsKzxxaZrkHs6ROIpUj4RH8c8QJj0yyWuzrzTqHvxhE44AzhZAIHXO4qNG8Yg3xldn4Vd5d8ePCtSUqfC9Qh2vT13ck/Wo/glnm0PB6c8Gbw5ScPGuLWZBcLHulAvcy42Sdv1c0DlbEUhejJ0xLDMK3ji5sRZnTMp0ZLlPvauakMiq+MRsYVfNVhNz5qWo5tPWqvGqCQmpcIqzroxSjmN09ymmKQrT2ZtfGSVMZ4bzKb9aVa/jq7BvvafJ7vOM4rIGjxilzw1M5P4yZ5rACB72nXDPEa7LV47juvwvF9O00CD7aCDTyD2rN0dexHr8h9hjgoxwM2SmDI2mvsOcfwGLBDap4mnhPgAAAABJRU5ErkJggg=="/>
                                            </defs>
                                        </svg>              
                                        <span class="font-lato">Round</span>
                                    </a>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <p class="font-lato font-bold text-brown">Fancy Cut Diamond</p>
                                    <div class="flex space-x-7">
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-1.png" alt="">                                                                                                
                                                <span class="font-lato">Pear</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-2.png" alt="">                                                                                                
                                                <span class="font-lato">Marquise</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-3.png" alt="">                                                                                                
                                                <span class="font-lato">Oval</span>
                                            </a>
                                        </div>
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-4.png" alt="">                                                                                                
                                                <span class="font-lato">Emerald</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-5.png" alt="">                                                                                                
                                                <span class="font-lato">Cushion</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-6.png" alt="">                                                                                                
                                                <span class="font-lato">Heart</span>
                                            </a>
                                        </div>
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-7.png" alt="">                                                                                                
                                                <span class="font-lato">Emerald</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-8.png" alt="">                                                                                                
                                                <span class="font-lato">Cushion</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/dd-9.png" alt="">                                                                                                
                                                <span class="font-lato">Heart</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <p class="font-lato font-bold text-brown">Fancy Color Diamond</p>
                                    <div class="flex space-x-7">
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-yellow.png" alt="">                                                                                                
                                                <span class="font-lato">Yellow</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-purple.png" alt="">                                                                                                
                                                <span class="font-lato">Purple</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-grey.png" alt="">                                                                                                
                                                <span class="font-lato">Grey</span>
                                            </a>
                                        </div>
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-pink.png" alt="">                                                                                                
                                                <span class="font-lato">Pink</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-brown.png" alt="">                                                                                                
                                                <span class="font-lato">Brown</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-blue.png" alt="">                                                                                                
                                                <span class="font-lato">Blue</span>
                                            </a>
                                        </div>
                                        <div class="flex flex-col space-y-2">
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-orange.png" alt="">                                                                                                
                                                <span class="font-lato">Orange</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-green.png" alt="">                                                                                                
                                                <span class="font-lato">Green</span>
                                            </a>
                                            <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                <img src="/assets/images/diamond-black.png" alt="">                                                                                                
                                                <span class="font-lato">Black</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li x-data="{ERDropdown : false}" class="">
                        <a @mouseover="ERDropdown = true" :class="{'active' : ERDropdown}" href="#">
                            <span>Engagement Rings</span>
                        </a> 
                        <div x-show="ERDropdown" @mouseleave="ERDropdown = false" class="flex flex-col w-full z-20 absolute top-16 left-2">
                            <div class="div h-16 opacity-0"></div>
                            <div class="flex justify-between bg-white border-t py-5 px-8 font-lato w-full">
                                <div class="flex space-x-10">
                                    <div class="flex flex-col space-y-2">
                                        <p class="font-lato font-bold text-brown">Design Your Engagement Rings</p>
                                        <a href="#" class="dd-link group flex space-x-2 items-center max-w-max">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 27C8.39255 27 3 21.6071 3 15C3 8.39255 8.39292 3 15 3C21.6075 3 27 8.39292 27 15C27 21.6075 21.6071 27 15 27ZM15 4.40625C9.15858 4.40625 4.40625 9.15858 4.40625 15C4.40625 20.8414 9.15858 25.5938 15 25.5938C20.8414 25.5938 25.5938 20.8414 25.5938 15C25.5938 9.15858 20.8414 4.40625 15 4.40625Z" fill="#666666"/>
                                                <path d="M15 24.1875C9.95377 24.1875 5.8125 20.0453 5.8125 15C5.8125 9.95377 9.95475 5.8125 15 5.8125C20.0462 5.8125 24.1875 9.9547 24.1875 15C24.1875 20.0462 20.0452 24.1875 15 24.1875ZM15 7.21875C10.7094 7.21875 7.21875 10.7094 7.21875 15C7.21875 19.2906 10.7094 22.7812 15 22.7812C19.2906 22.7812 22.7812 19.2906 22.7812 15C22.7812 10.7094 19.2906 7.21875 15 7.21875Z" fill="#666666"/>
                                            </svg>                                                                      
                                            <span class="font-lato">Start with a Setting</span>
                                        </a>
                                        <a href="#" class="dd-link group flex space-x-2 items-center max-w-max">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.3681 4.19995C21.6044 4.19995 8.47504 4.19995 7.63321 4.19995L3 10.5179L15.0498 26.3994L27 10.5161L22.3681 4.19995ZM9.58739 11.212L12.9823 21.3544L5.28697 11.212H9.58739ZM11.0663 11.212H18.9391L15.0298 23.053L11.0663 11.212ZM20.4161 11.212H24.7214L17.0495 21.4089L20.4161 11.212ZM21.6573 5.60237L24.7427 9.80962H20.417L19.0365 5.60237H21.6573ZM17.5605 5.60237L18.941 9.80962H11.0603L12.4408 5.60237H17.5605ZM8.34387 5.60237H10.9647L9.58421 9.80962H5.25855L8.34387 5.60237Z" fill="#666666"/>
                                            </svg>                                    
                                            <span class="font-lato">Start with a Diamond</span>
                                        </a>
                                    </div>
                                    <div class="flex flex-col space-y-2">
                                        <p class="font-lato font-bold text-brown">Engagement Rings Style</p>
                                        <div class="flex space-x-7">
                                            <div class="flex flex-col space-y-2">
                                                <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-1.png" alt="">                                                                                                
                                                    <span class="font-lato">Solitare</span>
                                                </a>
                                                <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-2.png" alt="">                                                                                                
                                                    <span class="font-lato">Side-Stone</span>
                                                </a>
                                                <a href="#" class="dd-link group flex space-x-3 items-center max-w-max">
                                                    <img class="h-6" src="/assets/images/ring-design-3.png" alt="">                                                                                                
                                                    <span class="font-lato">Halo</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex">
                                    <img src="/assets/images/e-ring-display.png" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <span>Wedding Rings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Jewellery</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Education</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Custom Jewellery</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>About Us</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div x-data="{ sidebarOpen : false, cartOpen : false}" class="flex flex-col lg:hidden">
            <div class="flex justify-between items-center lg:hidden">
                <button @click="sidebarOpen = true" class="inline-block lg:hidden focus:outline-none">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.75 15.5H23.25V13H0.75V15.5ZM0.75 9.25H23.25V6.75H0.75V9.25ZM0.75 0.5V3H23.25V0.5H0.75Z" fill="#656565"/>
                    </svg>                
                </button>
                <a  class="w-11 h-12" href="#">
                    <img src="/assets/images/Logo-mobile.png" alt="">
                </a>
                <button @click="cartOpen = true">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0026 17.7476C17.3525 17.7476 16.0101 19.09 16.0101 20.7401C16.0101 22.3901 17.3526 23.7326 19.0026 23.7326C20.6527 23.7326 21.9951 22.3901 21.9951 20.7401C21.9951 19.09 20.6527 17.7476 19.0026 17.7476ZM19.0026 21.9371C18.3425 21.9371 17.8056 21.4002 17.8056 20.7401C17.8056 20.0799 18.3425 19.5431 19.0026 19.5431C19.6628 19.5431 20.1996 20.0799 20.1996 20.7401C20.1996 21.4002 19.6628 21.9371 19.0026 21.9371Z" fill="#656565"/>
                        <path d="M23.8092 6.1817C23.6392 5.96415 23.3786 5.83726 23.1024 5.83726H5.54159L4.73361 2.45662C4.63695 2.05265 4.27573 1.76746 3.86037 1.76746H0.897755C0.401909 1.76741 0 2.16932 0 2.66516C0 3.16101 0.401909 3.56292 0.897755 3.56292H3.15175L6.06946 15.7713C6.16611 16.1756 6.52733 16.4604 6.9427 16.4604H20.9179C21.3305 16.4604 21.6902 16.1791 21.7893 15.7787L23.9738 6.95074C24.0399 6.68266 23.9792 6.39925 23.8092 6.1817ZM20.2155 14.665H7.65131L5.97069 7.63277H21.9553L20.2155 14.665Z" fill="#656565"/>
                        <path d="M8.1397 17.7476C6.4896 17.7476 5.14719 19.09 5.14719 20.7401C5.14719 22.3901 6.48965 23.7326 8.1397 23.7326C9.78976 23.7326 11.1322 22.3901 11.1322 20.7401C11.1322 19.09 9.78976 17.7476 8.1397 17.7476ZM8.1397 21.9371C7.47956 21.9371 6.9427 21.4002 6.9427 20.7401C6.9427 20.0799 7.47956 19.5431 8.1397 19.5431C8.79985 19.5431 9.33671 20.0799 9.33671 20.7401C9.33671 21.4002 8.79985 21.9371 8.1397 21.9371Z" fill="#656565"/>
                    </svg>
                </button>
            </div>
            <div x-show="sidebarOpen" class="sidebar">
                <div @click.away="sidebarOpen = false" class="fixed inset-0 w-3/4 p-3 bg-white z-50 border-2 border-sgb-pink h-full overflow-y-scroll">
                    <div class="flex justify-end py-2">
                        <button class="focus:outline-none" @click="sidebarOpen = false" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <ul class="relative z-50 flex flex-col space-y-5 uppercase font-lato">
                        <li>
                            <a href="#">
                                <span>Diamond</span>
                            </a>
                        </li>
                        <li>
                            <a class="active" href="#">
                                <span>Engagement Rings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Wedding Rings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Jewellery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Education</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Custom Jewellery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>About Us</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="flex items-center justify-center divide-x divide-opacity-20 space-x-3 mt-5 font-lato">
                        <li>
                            <a class="pl-3" href="#">
                                <span>繁</span>
                            </a>
                        </li>
                        <li>
                            <a class="pl-3" href="#">
                                <span>简</span>
                            </a>
                        </li>
                        <li>
                            <a class="pl-3 active" href="#">
                                <span>Eng</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="sidebarOverlay inset-0 left-3/4 fixed h-full w-1/4 pointer-events-none">
                    <div class="absolute inset-0 bg-white opacity-50"></div>
                </div>
            </div>
            <div x-show="cartOpen" class="sidebar">
                <div @click.away="cartOpen = false" class="fixed top-0 right-0 w-3/4 p-3 bg-white z-50 border-2 border-sgb-pink h-full overflow-y-scroll">
                    <div class="flex py-2">
                        <button class="focus:outline-none" @click="cartOpen = false" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-center text-xl">Cart is Empty</p>
                    </div>
                </div>
                <div class="sidebarOverlay z-40 top-0 right-3/4 fixed h-full w-1/4 pointer-events-none">
                    <div class="absolute inset-0 bg-white opacity-50"></div>
                </div>
            </div>
        </div>
        <!-- <div x-data="{ cartOpen : false}" class="flex flex-col lg:hidden">
            <div x-show="cartOpen" class="sidebar">
                
            </div>
        </div> -->
    </header>
    <!-- Hero Section  -->
    <div class="diamond hero-image flex items-center justify-center w-full h-20 xl:h-36">
        <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
            DIamonD
        </h2>
    </div>
    <!-- Shop Section  -->
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">
        <!-- Breadcrumb  -->
        <ul class="flex flex-wrap items-center divide-x-2 divide-opacity-20 space-x-3 pt-3">
            <li>
                <a class="text-xs md:text-sm font-medium" href="#">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="pl-3 text-xs md:text-sm font-medium" href="#">
                    <span>Diamond</span>
                </a>
            </li>
            <li>
                <a class="pl-3 text-xs md:text-sm font-medium" href="#">
                    <span>Start with a Diamond</span>
                </a>
            </li>
        </ul>
        <!-- Steps  -->
        <div class="flex flex-col space-y-7 py-10 md:mb-16">
            <div class="flex md:items-center justify-between lg:justify-around px-5 md:px-0 font-suranna">
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="relative border-2 border-dashed rounded flex items-center justify-center h-20 w-20">
                        <img class="" src="/assets/images/Ring-details-main.png" alt="">
                        <button class="absolute top-1 left-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"/>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                    </div>
                    <span class="md:text-xl font-suranna text-center md:text-left">Select Setting <a class="block md:inline md:ml-3 text-brown underline" href="#">View</a></span>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="border-2 border-dashed rounded flex items-center justify-center h-20 w-20">
                        <svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M41.781 12.0392L35.5895 0.950954C35.2765 0.391036 34.6102 0 33.969 0H8.0312C7.3897 0 6.72323 0.391161 6.41055 0.951203L0.219043 12.0391C-0.11214 12.6319 -0.0637101 13.429 0.336764 13.9773L15.7194 35.0456C16.0709 35.5271 16.7074 35.8503 17.3034 35.8503H24.6964C25.2924 35.8503 25.929 35.5269 26.2804 35.0456L41.6632 13.9772C42.0638 13.4289 42.1121 12.6318 41.781 12.0392ZM38.7172 11.7813C36.9088 11.7813 33.3452 11.7813 31.4821 11.7813C31.2463 11.7813 31.3156 11.6459 31.3156 11.6459L34.1228 3.40359C34.1228 3.40359 34.2152 3.33008 34.2637 3.41601C35.4555 5.53039 38.3234 10.6829 38.8508 11.6303C38.9054 11.7284 38.8646 11.7813 38.7172 11.7813ZM27.0781 11.7813C23.9498 11.7813 17.7548 11.7813 14.5644 11.7813C14.3383 11.7813 14.4547 11.635 14.4547 11.635L20.2666 2.42209C20.2666 2.42209 20.2806 2.35913 20.3986 2.35913C20.6444 2.35913 21.0768 2.35913 21.303 2.35913C21.4012 2.35913 21.4235 2.4242 21.4235 2.4242L27.2465 11.6543C27.2465 11.6545 27.3534 11.7813 27.0781 11.7813ZM24.321 2.35926C26.08 2.35926 31.0673 2.35926 31.8753 2.35926C32.008 2.35926 31.9395 2.49709 31.9395 2.49709C31.9395 2.49709 30.0175 8.14284 29.3234 10.1787C29.28 10.3055 29.1315 10.2205 29.1315 10.2205L24.2303 2.4514C24.2302 2.45152 24.1537 2.35926 24.321 2.35926ZM12.4286 10.0604C11.7924 8.19202 9.88878 2.58104 9.88878 2.58104C9.88878 2.58104 9.78956 2.35926 10.0033 2.35926C11.6917 2.35926 16.4156 2.35926 17.3537 2.35926C17.5134 2.35926 17.4143 2.52193 17.4143 2.52193L12.6453 10.0815C12.6454 10.0815 12.4908 10.2433 12.4286 10.0604ZM27.893 14.1406C27.9779 14.1406 27.9552 14.1956 27.9552 14.1956L21.3986 33.4446C21.3986 33.4446 21.3817 33.4913 21.335 33.4913C21.1107 33.4913 20.6741 33.4913 20.4379 33.4913C20.3765 33.4913 20.3665 33.4373 20.3665 33.4373L13.8406 14.2191C13.8406 14.2191 13.8185 14.1405 13.9181 14.1405C17.4321 14.1406 24.3992 14.1406 27.893 14.1406ZM7.76881 3.67517C8.4169 5.53325 10.1483 10.6731 10.4697 11.6276C10.5032 11.7272 10.5145 11.7813 10.3276 11.7813C8.56815 11.7813 5.09725 11.7813 3.28934 11.7813C3.06321 11.7813 3.15299 11.6234 3.15299 11.6234L7.63309 3.60066C7.63309 3.60066 7.70486 3.49176 7.76881 3.67517ZM3.51559 14.1406C5.46742 14.1406 9.33445 14.1406 11.2457 14.1406C11.3491 14.1406 11.3559 14.2387 11.3559 14.2387L17.8656 33.409C17.8656 33.409 17.8945 33.4913 17.8257 33.4913C17.7649 33.4913 17.6602 33.4913 17.5825 33.4913C17.5039 33.4913 17.4498 33.4147 17.4498 33.4147L3.44829 14.2379C3.44817 14.2379 3.36062 14.1406 3.51559 14.1406ZM24.4413 33.4913C24.3159 33.4913 24.0786 33.4913 23.94 33.4913C23.8614 33.4913 23.8979 33.4242 23.8979 33.4242L30.4468 14.1968C30.4468 14.1968 30.4597 14.1406 30.547 14.1406C32.566 14.1406 36.5513 14.1406 38.5524 14.1406C38.6237 14.1406 38.5894 14.1866 38.5894 14.1866L24.5214 33.454C24.5213 33.454 24.5028 33.4913 24.4413 33.4913Z" fill="#CCCCCC"/>
                        </svg>                    
                    </div>
                    <span class="md:text-xl font-suranna text-center md:text-left">Select Diamond</span>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="border-2 border-dashed rounded flex items-center justify-center h-20 w-20">
                        <svg class="w-10" height="38" viewBox="0 0 50 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 0.669556C11.215 0.669556 0 7.59202 0 16.1012C0 22.4404 6.05918 28.0029 15.4708 30.3628C16.7913 34.5124 20.6453 37.3305 25 37.3305C29.3547 37.3305 33.2087 34.5124 34.5292 30.3628C43.9408 28.0029 50 22.4404 50 16.1012C50 7.59202 38.785 0.669556 25 0.669556ZM17.035 24.8828L20 25.8729V28.7995L17.035 29.7896C16.5417 28.1911 16.5417 26.4812 17.035 24.8828ZM25 9.83616C33.0691 9.83616 40.0983 12.392 42 15.9562C40.8167 18.2604 37.57 20.2753 33.0417 21.4154C31.165 18.8509 28.1778 17.3353 25 17.3353C21.8223 17.3353 18.835 18.8509 16.9583 21.4154C12.43 20.2753 9.1833 18.2604 8 15.9562C9.90166 12.392 16.9309 9.83616 25 9.83616ZM7.52832 13.7645C7.8333 9.3511 15.6967 5.66946 25 5.66946C34.3033 5.66946 42.1667 9.3511 42.4717 13.7645C39.4642 10.3961 32.75 8.16946 25 8.16946C17.25 8.16946 10.5358 10.3962 7.52832 13.7645ZM21.6675 29.0196V25.6604C21.686 25.6304 21.7024 25.5992 21.7166 25.567C21.7166 25.562 21.7166 25.5562 21.7166 25.5512L23.2166 24.0512C23.2225 24.0512 23.2274 24.0512 23.2324 24.0512C23.2612 24.0366 23.2891 24.0201 23.3157 24.0021H26.6857C26.7125 24.0201 26.7403 24.0366 26.769 24.0512C26.774 24.0512 26.779 24.0512 26.7849 24.0512L28.2849 25.5512C28.2849 25.5562 28.2849 25.562 28.2849 25.567C28.2991 25.5992 28.3155 25.6304 28.334 25.6604V29.0203C28.3159 29.0471 28.2994 29.0749 28.2849 29.1036C28.2849 29.1086 28.2849 29.1145 28.2849 29.1195L26.7849 30.6187C26.7799 30.6187 26.7749 30.6187 26.7698 30.6187C26.741 30.6333 26.7132 30.6497 26.6865 30.6678H23.3148C23.2881 30.6497 23.2603 30.6332 23.2315 30.6187C23.2266 30.6187 23.2216 30.6187 23.2165 30.6187L21.7165 29.1187C21.7165 29.1137 21.7165 29.1078 21.7165 29.1029C21.7021 29.0741 21.6856 29.0462 21.6675 29.0196ZM21.0061 20.0253L21.9767 22.9337L20.5958 24.3146L17.6866 23.3429C18.4554 21.944 19.6068 20.7932 21.0061 20.0253ZM22.5458 19.3729C24.1447 18.8795 25.8552 18.8795 27.4541 19.3729L26.4641 22.3363H23.5357L22.5458 19.3729ZM28.02 22.9337L28.9908 20.0245C30.3907 20.7924 31.5427 21.9436 32.3116 23.3429H32.31L29.4008 24.3146L28.02 22.9337ZM21.0075 34.6479C19.6082 33.8797 18.4568 32.7286 17.6884 31.3295L20.5976 30.3578L21.9784 31.7387L21.0075 34.6479ZM22.5458 35.2995L23.5358 32.3362H26.4642L27.4542 35.2995C25.8553 35.7929 24.1447 35.7929 22.5458 35.2995ZM28.9925 34.6479L28.0217 31.7387L29.4025 30.3578L32.3117 31.3295C31.5432 32.7286 30.3918 33.8797 28.9925 34.6479ZM32.9634 29.7895L30 28.7995V25.8729L32.9634 24.8828C33.4566 26.4812 33.4566 28.1911 32.9634 29.7895ZM34.9208 28.5362C35.1691 26.6035 34.8309 24.6408 33.95 22.9029C40.28 21.1929 44.1667 17.8462 44.1667 14.0229C44.1667 8.40452 35.75 4.00286 25 4.00286C14.25 4.00286 5.8333 8.40452 5.8333 14.0229C5.8333 17.8462 9.71992 21.1896 16.05 22.9029C15.1705 24.6413 14.8338 26.6039 15.0833 28.5362C7.00664 26.2854 1.6667 21.3912 1.6667 16.1012C1.6667 8.51116 12.1342 2.33616 25 2.33616C37.8658 2.33616 48.3333 8.51116 48.3333 16.1012C48.3333 21.3912 42.9934 26.2854 34.9208 28.5362Z" fill="#CCCCCC"/>
                        </svg>                    
                    </div>
                    <span class="md:text-xl font-suranna text-center md:text-left">Finish</span>
                </div>
            </div>
            <nav class="overflow-hidden" aria-label="Progress">
                <ol class="flex items-center py-2">
                    <li class="relative pl-12 md:pl-28 lg:pl-44 xl:pl-52 2xl:pl-64">
                        <!-- previous Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-1.5 md:h-3 w-full bg-gold"></div>
                        </div>
                        <a href="#" class="relative w-8 h-8 z-10 bg-gold border-2 border-white transform rotate-45 flex items-center justify-center">
                            <span class="text-xl font-suranna text-white transform -rotate-45">1</span>
                        </a>
                    </li>
                
                    <li class="relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131">
                        <!-- Current Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-1.5 md:h-3 w-full bg-gold"></div>
                        </div>
                        <a href="#" class="relative w-8 h-8 z-10 bg-gold border-2 border-white transform rotate-45 flex items-center justify-center">
                            <span class="text-xl font-suranna text-white transform -rotate-45">2</span>
                        </a>
                    </li>
                
                    <li class="relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131 pr-12 md:pr-20 lg:pr-36 2xl:pr-48">
                        <!-- Next Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-0.5 w-full bg-gold bg-opacity-80"></div>
                        </div>
                        <a href="#" class="relative w-8 h-8 z-10 bg-white border-2 border-gold transform rotate-45 flex items-center justify-center">
                            <span class="text-xl font-suranna text-gold transform -rotate-45">3</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Choose/Filter -->
        <div x-data="{ applyFilter : false }" class="flex flex-col space-y-3">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold font-lato">Customise Your Diamond</h2>
                <button @click="applyFilter = !applyFilter" class="lg:hidden focus:outline-none">
                    <svg  width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z" fill="#318ECE"/>
                    </svg>
                </button>
            </div>
            <form action="#">
                <div :class="{'hidden lg:grid' : !applyFilter, 'grid lg:hidden' : applyFilter,}" class="grid md:grid-cols-2 space-y-5 md:space-y-0 md:space-x-7">
                    <!-- Column 1  -->
                    <div  class="flex-col lg:flex-row space-y-7">
                        <div x-data="price()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                            <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:justify-between space-x-1">
                                <p class="flex items-center space-x-1">
                                    <span class="font-bold font-lato">Price</span>
                                </p>
                                <div class="flex max-w-max items-center justify-between md:justify-start space-x-3 md:space-x-5">
                                    <div>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-black opacity-50">
                                                    HK$
                                                </span>
                                            </div>
                                            <input type="text" name="min-price" id="min-price" value="1,000" class="focus:border-brown block w-36 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                        </div>
                                    </div>
                                    <span class="font-bold font-lato">-</span>
                                    <div>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-black opacity-50">
                                                    HK$
                                                </span>
                                            </div>
                                            <input type="text" name="max-price" id="max-price" value="50,000,000" class="focus:border-brown block w-36 py-1.5 pl-12 border border-gray-300" aria-describedby="max-price-currency">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <div class="relative max-w-xs md:max-w-2xl w-full px-2">
                            <div>
                                <input 
                                    type="range"
                                    step="100"
                                    x-bind:min="min" x-bind:max="max"
                                    x-on:input="mintrigger"
                                    x-model="minprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                >
                                <input 
                                    type="range" 
                                    step="100"
                                    x-bind:min="min" x-bind:max="max"
                                    x-on:input="maxtrigger"
                                    x-model="maxprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                >
                                <div class="relative z-10 h-2">
                                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                                </div>
                            </div>    
                            </div>
                        </div>
    
                        <div class="flex flex-col space-y-2">
                            <label class="flex items-center space-x-2">
                                <span class="font-bold font-lato">Shape</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                </svg>
                            </label>
                            <fieldset class="flex flex-wrap items-center gap-3">
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22.png" alt="shape image">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-1.png" alt="shape image-1">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-2.png" alt="shape image-2">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-3.png" alt="shape image-3">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-4.png" alt="shape image-4">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-5.png" alt="shape image-5">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-6.png" alt="shape image-6">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 22-7.png" alt="shape image-7">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 23.png" alt="shape image-8">
                                    </div>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-20 w-20 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="position" value="1" class="sr-only">
                                    <div>
                                        <img src="/assets/images/image 23-1.png" alt="shape image-9">
                                    </div>
                                </label>
                            </fieldset>
                        </div>
    
                        <div x-data="clarity()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                            <label class="flex items-center">
                                <p class="flex items-center space-x-2">
                                    <span class="font-bold font-lato">Clarity</span>
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                    </svg>
                                </p>
                            </label>
                            <div class="flex flex-wrap  md:justify-around items-center gap-3">
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">FL</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">IF</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">VVS1</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">VVS2</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">VS1</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">VS2</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">SI1</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">SI2</span>
                                </div>
                                <div class="px-1 md:px-2 text-center">
                                    <span class="font-lato">I1</span>
                                </div>
                            </div>
                            <div class="relative max-w-xs md:max-w-2xl w-full px-2">
                                <div>
                                    <input 
                                        type="range"
                                        step="100"
                                        x-bind:min="min" x-bind:max="max"
                                        x-on:input="mintrigger"
                                        x-model="minprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                    >
                                    <input 
                                        type="range" 
                                        step="100"
                                        x-bind:min="min" x-bind:max="max"
                                        x-on:input="maxtrigger"
                                        x-model="maxprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                    >
                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                                        <div class="flex items-center space-x-6 md:space-x-10 xl:space-x-16 absolute top-0 z-40 left-11 w-full h-2">
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            
                        </div>

                        <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center md:divide-x md:space-x-3">
                            <div class="relative flex items-center space-x-3">
                                <select id="Polish" name="Polish" class="block w-28 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                    <option>Polish</option>
                                    <option>Excellent</option>
                                    <option>Very Good</option>
                                    <option>Good</option>
                                </select>
                                <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                </svg>
                            </div>
                            <div class="relative flex items-center space-x-3 md:pl-3">
                                <select id="Symmetry" name="Symmetry" class="block w-28 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                    <option>Symmetry</option>
                                    <option>Excellent</option>
                                    <option>Very Good</option>
                                    <option>Good</option>
                                </select>
                                <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                </svg>
                            </div>
                            <div class="relative flex items-center space-x-3 md:pl-3">
                                <select id="Symmetry" name="Symmetry" class="block w-36 py-3 px-2 text-black border border-opacity-20 focus:outline-none">
                                    <option>Fluorescence</option>
                                    <option>None</option>
                                    <option>Faint</option>
                                    <option>Medium</option>
                                    <option>Strong</option>
                                    <option>Very Strong</option>
                                </select>
                                <svg class="text-grey-dark" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Column 2  -->
                    <div  class="flex-col lg:flex-row space-y-7">
                        <div x-data="caret()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                            <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:justify-between space-x-1">
                                <p class="flex items-center space-x-2">
                                    <span class="font-bold font-lato">Carat</span>
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                    </svg>
                                </p>
                                <div class="flex max-w-max items-center justify-between md:justify-start space-x-3 md:space-x-5">
                                    <div>
                                        <div class="relative">
                                            <input type="text" name="min-price" id="min-price" value="0.3" class="focus:border-brown block w-12 py-1.5 text-center border border-gray-300" aria-describedby="min-price-currency">
                                        </div>
                                    </div>
                                    <span class="font-bold font-lato">-</span>
                                    <div>
                                        <div class="relative">
                                            <input type="text" name="max-price" id="max-price" value="20" class="focus:border-brown block w-12 py-1.5 text-center border border-gray-300" aria-describedby="max-price-currency">
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <div class="relative max-w-xs md:max-w-2xl w-full px-2">
                            <div>
                                <input 
                                    type="range"
                                    step="100"
                                    x-bind:min="min" x-bind:max="max"
                                    x-on:input="mintrigger"
                                    x-model="minprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                >
                                <input 
                                    type="range" 
                                    step="100"
                                    x-bind:min="min" x-bind:max="max"
                                    x-on:input="maxtrigger"
                                    x-model="maxprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                >
                                <div class="relative z-10 h-2">
                                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                                    <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                                </div>
                            </div>    
                            </div>
                            <div class="flex flex-wrap items-center gap-3">
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">0.3 - 0.49</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">0.5 - 0.79</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">0.8 - 0.99</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">1.0-1.19</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">1.2 - 1.49</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">1.5 - 1.99</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">2.0 - 2.99</span>
                                </div>
                                <div class="bg-grey-01 py-2 px-5 text-center">
                                    <span class="font-lato">3.0 Up</span>
                                </div>
                            </div>
                        </div>

                        <div x-data="{tab : 'white'}" class="flex flex-col space-y-2">
                            <label class="flex items-center space-x-2">
                                <span :class="{'text-brown font-bold border-b-2 border-brown' : tab == 'white'}" @click="tab = 'white'" class="text-grey font-lato cursor-pointer">White</span>
                                <span :class="{'text-brown font-bold border-b-2 border-brown' : tab == 'fancy'}" @click="tab = 'fancy'" class="text-grey font-lato cursor-pointer">Fancy</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                </svg>
                            </label>
                            <fieldset x-show="tab == 'white'" class="flex flex-wrap items-center gap-3">
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>D</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>E</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>F</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>G</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>H</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>I</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>K</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>L</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>M</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>N</span>
                                </label>
                            </fieldset>
                            <fieldset x-show="tab == 'fancy'" class="flex flex-wrap items-center gap-3">
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>A</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>B</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>C</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>D</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>E</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>F</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>G</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>H</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>I</span>
                                </label>
                                <label class="relative border bg-white flex items-center justify-center h-10 w-10 cursor-pointer hover:border-brown focus-within:bg-brown-light focus-within:border-brown">
                                    <input type="checkbox" name="white" value="1" class="sr-only">
                                    <span>J</span>
                                </label>
                            </fieldset>
                        </div>

                        <div x-data="cut()" x-init="mintrigger(); maxtrigger()" class="flex flex-col space-y-5">
                            <label class="flex items-center mt-0.5 pt-4">
                                <p class="flex items-center space-x-2">
                                    <span class="font-bold font-lato">Cut</span>
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                                    </svg>
                                </p>
                            </label>
                            <div class="flex max-w-max md:max-w-full justify-around items-center gap-3">
                                <div class="px-5 text-center">
                                    <span class="font-lato">Very Good</span>
                                </div>
                                <div class="px-5 text-center">
                                    <span class="font-lato">Excellent</span>
                                </div>
                                <div class="px-5 text-center">
                                    <span class="font-lato">Good</span>
                                </div>
                            </div>
                            <div class="relative max-w-xs md:max-w-2xl w-full px-2">
                                <div>
                                    <input 
                                        type="range"
                                        step="100"
                                        x-bind:min="min" x-bind:max="max"
                                        x-on:input="mintrigger"
                                        x-model="minprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                    >
                                    <input 
                                        type="range" 
                                        step="100"
                                        x-bind:min="min" x-bind:max="max"
                                        x-on:input="maxtrigger"
                                        x-model="maxprice"
                                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                                    >
                                    <div class="relative z-10 h-2">
                                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                                        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-brown" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 left-0 bg-white border border-brown transform rotate-45 -mt-1 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
                                        <div class="range-slider-thumb absolute z-30 w-4 h-4 top-0 right-0 bg-white border border-brown transform rotate-45 -mt-1 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
                                        <div class="flex items-center justify-around absolute top-0 z-40 left-11 w-full h-2">
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white md:mr-20"></div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
            <div x-data="{advance : true}" class="pt-7">
                <button @click="advance = !advance" class="flex items-center gap-x-3 max-w-max focus:outline-none">
                    <svg x-show="!advance" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.9646C4.48 0.9646 0 5.4446 0 10.9646C0 16.4846 4.48 20.9646 10 20.9646C15.52 20.9646 20 16.4846 20 10.9646C20 5.4446 15.52 0.9646 10 0.9646ZM15 11.9646H11V15.9646H9V11.9646H5V9.9646H9V5.9646H11V9.9646H15V11.9646Z" fill="#9A7474"/>
                    </svg>    
                    <svg x-show="advance" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 0.869629C4.98 0.869629 0.5 5.34963 0.5 10.8696C0.5 16.3896 4.98 20.8696 10.5 20.8696C16.02 20.8696 20.5 16.3896 20.5 10.8696C20.5 5.34963 16.02 0.869629 10.5 0.869629ZM15.5 11.8696H11.5H9.5H5.5V9.86963H9.5H11.5H15.5V11.8696Z" fill="#9A7474"/>
                    </svg>                          
                    <span class="text-brown font-bold">Advanced Option</span>
                </button>
                <div x-show="advance" class="flex space-x-10 bg-grey-03 p-7 mt-7">
                    <div class="flex flex-col gap-3">
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-5">
                            <span class="font-bold font-lato">Crown Angle</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="30" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="60" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-4">
                            <span class="font-bold font-lato">Table Percent</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-4">
                            <span class="font-bold font-lato">Parvilion Angle</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-5">
                            <span class="font-bold font-lato">Depth Percent</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="flex flex-col gap-3">
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-4">
                            <span class="font-bold font-lato">Length</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-5">
                            <span class="font-bold font-lato">Depth</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center space-x-5">
                            <span class="font-bold font-lato">Width</span>
                            <div class="flex max-w-max items-center justify-between md:justify-start space-x-3">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Min
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-black opacity-50">
                                            Max
                                        </span>
                                    </div>
                                    <input type="text" name="min-price" id="min-price" value="0" class="focus:border-brown block w-28 py-1.5 pl-12 border border-gray-300" aria-describedby="min-price-currency">
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter Results  -->
        <div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
            <div class="flex w-full justify-between">
                <div class="flex flex-wrap items-center gap-3">
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Price: HKD$1,000-40,000</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Carat: 0.3-0.49</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Shape: Round, Pearl</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Color: D,E</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Clarity: IF, VVS1, VVS2, VS1, VS2</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Cut: Excellent, Very Good</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Polish: Excellent, Very Good</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Symmetry: Excellent, Very Good</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Fluorescence: None, Faint</span>
                    </div>
                    <div class="flex items-center jsutify-center space-x-2 bg-grey-02 py-3 px-5">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"></path>
                                <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>    
                        </button>
                        <span>Crown Angle: Min30 Max60</span>
                    </div>
                </div>
                <div class="flex flex-shrink-0">
                    <a class="text-brown underline" href="#">Clear</a>
                </div>
            </div>
            <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between pt-10">
                <span class="text-sm">Total: 179948 results</span>
                <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center md:space-x-16">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="Starred" id="Starred">
                        <label for="Starred" class="font-bold">
                            Starred
                        </label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="HK_Stock" id="HK_Stock">
                        <label for="HK_Stock" class="font-bold">
                            HK Stock
                        </label>
                    </div>
                    <div class="flex space-x-1 max-w-max border-b">
                        <label>
                            Sort By: 
                        </label>
                        <select id="Sort" name="Sort" class="block w-52 pb-1 text-black focus:outline-none">
                            <option>Best match</option>
                            <option>Price</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products -->
        <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond.png" alt="Diamond 1">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$3,600</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Round</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-dummy.png" alt="Diamond dummy">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$9,000</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-1.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Pear</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-1.png" alt="Diamond 1">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$10,300</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-2.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Emerald</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-2.png" alt="Diamond 2">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$9,300</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-3.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Princess</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-3.png" alt="Diamond 3">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$13,500</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-4.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Oval</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-4.png" alt="Diamond 4">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$9,000</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-5.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Cushion</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-5.png" alt="Diamond 5">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$10,900</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-6.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Asscher</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-dummy.png" alt="Diamond dummy">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$13,600</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-23-1.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Marquis</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-6.png" alt="Diamond 6">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$11,600</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-6.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Heart</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-7.png" alt="Diamond 7">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$9,000</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-7.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Radient</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-dummy.png" alt="Diamond dummy">
                    <div class="absolute top-1.5 left-4 tags flex flex-wrap items-center gap-1.5">
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            Starred
                        </p>
                        <p class="py-0.5 px-2 bg-grey-04 text-white font-medium text-xs font-lato rounded">
                            HK Stock
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$8,500</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Round</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card diamond font-lato p-0 md:p-3 2xl:p-4 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <div class="relative flex items-center justify-center mt-0 md:mt-3 2xl:mt-4">
                    <img class="" src="/assets/images/diamond-8.png" alt="Diamond 8">
                </div>
                <div class="flex flex-col items-center space-y-2 md:space-y-3 mt-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$12,900</span>
                    </p>
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4">
                            <img src="/assets/images/shape-22-4.png" alt="">
                        </div>
                        <span class="text-sm font-lato">Cushion</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="/assets/images/big-card.png" alt="">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Carat</p>
                        <p class="text-xs md:text-sm text-center">0.31</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Color</p>
                        <p class="text-xs md:text-sm text-center">J</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Clarity</p>
                        <p class="text-xs md:text-sm text-center">FL</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-1 py-1 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Cut</p>
                        <p class="text-xs md:text-sm text-center">Ex</p>
                    </div>
                </div>
                <div class="flex flex-col px-2 md:px-0">
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Polish</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Symmetry</p>
                        <p class="text-xs md:text-sm">Excellent</p>
                    </div>
                    <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                        <p class="text-xs md:text-sm text-black opacity-50">Fluorescence</p>
                        <p class="text-xs md:text-sm">None</p>
                    </div>
                </div>
            </div>
            <!-- More Products .... -->
        </div>
    </div>
    <!-- Jewelry Section  -->
    <div class="bg-grey-light">
        <div class="flex flex-col divide-y space-y-5 md:space-y-10 max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 py-5 md:py-20">
            <div class="flex flex-col space-y-5">
                <h2 class="text-xl font-medium text-brown font-suranna">Why Choose Us</h2>
                <div class="flex flex-wrap items-center gap-4 md:gap-0 md:space-x-10 font-lato">
                    <div class="flex space-x-4 md:space-x-5 items-center">
                        <img class="w-5 md:w-auto" src="/assets/images/notes.svg" alt="">
                        <span class="text-xs md:text-base">GIA certificate</span>
                    </div>
                    <div class="flex space-x-4 md:space-x-5 items-center">
                        <img class="w-7 md:w-auto" src="/assets/images/youtube.svg" alt="">
                        <span class="text-xs md:text-base">360 degree HD video</span>
                    </div>
                    <div class="flex space-x-4 md:space-x-5 items-center">
                        <img class="w-5 md:w-auto" src="/assets/images/ring.svg" alt="">
                        <span class="text-xs md:text-base">1000＋ finished product</span>
                    </div>
                    <div class="flex space-x-4 md:space-x-5 items-center">
                        <img class="w-7 md:w-auto" src="/assets/images/crown.svg" alt="">
                        <span class="text-xs md:text-base">Lifetime maintenance</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-5 pt-5 md:pt-10">
                <h2 class="text-xl font-medium text-brown font-suranna">Jewellery Knowledgment Education</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 md:items-center gap-y-5 md:gap-y-0 gap-x-2 md:gap-x-10 font-lato">
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="inline-block overflow-hidden">
                            <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j1.png" alt="Jewelry-1">
                        </a>
                        <span class="text-xs md:text-base">Diamond 4Cs knowledgment</span>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="inline-block overflow-hidden">
                            <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j2.png" alt="Jewelry-2">
                        </a>
                        <span class="text-xs md:text-base">Buying Procedure</span>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="inline-block overflow-hidden">
                            <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j3.png" alt="Jewelry-3">
                        </a>
                        <span class="text-xs md:text-base">Customer jewellery</span>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="inline-block overflow-hidden">
                            <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j4.png" alt="Jewelry-4">
                        </a>
                        <span class="text-xs md:text-base">About us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section  -->
    <footer class="bg-grey-dark" aria-labelledby="footerHeading">
        <div class="max-w-screen-2xl 2xl:mx-auto md:mx-10 xl:mx-20 pt-12 lg:pt-16 pb-5 lg:pb-7 px-4 lg:px-8 font-lato">
            <div class="grid lg:grid-cols-4 lg:gap-x-12 lg:divide-x divide-white divide-opacity-20">
                <div class="flex flex-col w-full space-y-10">
                    <div class="flex space-x-3 lg:space-x-7">
                        <a class="inline-block w-48" href="#">
                            <img src="/assets/images/Logo-white-mobile.png" alt="">
                        </a>
                        <div class="flex flex-col space-y-5 mt-1 lg:mt-0">
                            <p class="text-sm text-white">
                                Ting Diamond provides brilliant GIA, wholesale prices, for the best price.
                            </p>
                            <ul class="flex items0-center space-x-5">
                                <li>
                                    <a href="#">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 10C19 5.02943 14.9706 1 10 1C5.02943 1 1 5.02943 1 10C1 14.4921 4.29115 18.2155 8.59375 18.8907V12.6016H6.30859V10H8.59375V8.01719C8.59375 5.76156 9.93742 4.51562 11.9932 4.51562C12.9779 4.51562 14.0078 4.69141 14.0078 4.69141V6.90625H12.873C11.755 6.90625 11.4062 7.60006 11.4062 8.3118V10H13.9023L13.5033 12.6016H11.4062V18.8907C15.7088 18.2155 19 14.4921 19 10Z" fill="white"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6377 0H5.3623C2.40551 0 0 2.40551 0 5.3623V12.6377C0 15.5945 2.40551 18 5.3623 18H12.6377C15.5945 18 18 15.5945 18 12.6377V5.3623C18 2.40551 15.5945 0 12.6377 0ZM16.1892 12.6377C16.1892 14.5991 14.5991 16.1892 12.6377 16.1892H5.3623C3.40088 16.1892 1.8108 14.5991 1.8108 12.6377V5.3623C1.8108 3.40084 3.40088 1.8108 5.3623 1.8108H12.6377C14.5991 1.8108 16.1892 3.40084 16.1892 5.3623V12.6377ZM8.99998 4.34454C6.43297 4.34454 4.34454 6.43297 4.34454 8.99995C4.34454 11.5669 6.43297 13.6554 8.99998 13.6554C11.567 13.6554 13.6554 11.567 13.6554 8.99995C13.6554 6.43294 11.567 4.34454 8.99998 4.34454ZM8.99998 11.8446C7.42892 11.8446 6.15534 10.571 6.15534 8.99998C6.15534 7.42892 7.42895 6.15534 8.99998 6.15534C10.571 6.15534 11.8446 7.42892 11.8446 8.99998C11.8446 10.571 10.571 11.8446 8.99998 11.8446ZM14.78 4.37947C14.78 4.99556 14.2805 5.49501 13.6645 5.49501C13.0484 5.49501 12.5489 4.99556 12.5489 4.37947C12.5489 3.76337 13.0484 3.26393 13.6645 3.26393C14.2805 3.26393 14.78 3.76337 14.78 4.37947Z" fill="white"/>
                                        </svg>                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 1.73137C17.3306 2.025 16.6174 2.21962 15.8737 2.31412C16.6388 1.85737 17.2226 1.13962 17.4971 0.2745C16.7839 0.69975 15.9964 1.00013 15.1571 1.16775C14.4799 0.446625 13.5146 0 12.4616 0C10.4186 0 8.77387 1.65825 8.77387 3.69113C8.77387 3.98363 8.79862 4.26487 8.85938 4.53262C5.7915 4.383 3.07687 2.91263 1.25325 0.67275C0.934875 1.22513 0.748125 1.85738 0.748125 2.538C0.748125 3.816 1.40625 4.94887 2.38725 5.60475C1.79437 5.5935 1.21275 5.42138 0.72 5.15025C0.72 5.1615 0.72 5.17613 0.72 5.19075C0.72 6.984 1.99912 8.4735 3.6765 8.81662C3.37612 8.89875 3.04875 8.93812 2.709 8.93812C2.47275 8.93812 2.23425 8.92463 2.01038 8.87512C2.4885 10.3365 3.84525 11.4109 5.4585 11.4457C4.203 12.4279 2.60888 13.0196 0.883125 13.0196C0.5805 13.0196 0.29025 13.0061 0 12.969C1.63462 14.0231 3.57188 14.625 5.661 14.625C12.4515 14.625 16.164 9 16.164 4.12425C16.164 3.96112 16.1584 3.80363 16.1505 3.64725C16.8829 3.1275 17.4982 2.47837 18 1.73137Z" fill="white"/>
                                        </svg>                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.5818 2.2C19.3523 1.33409 18.6739 0.652273 17.8136 0.420455C16.2545 0 10 0 10 0C10 0 3.74545 0 2.18636 0.420455C1.32614 0.652273 0.647727 1.33409 0.418182 2.2C0 3.77045 0 7.04545 0 7.04545C0 7.04545 0 10.3205 0.418182 11.8909C0.647727 12.7568 1.32614 13.4386 2.18636 13.6705C3.74545 14.0909 10 14.0909 10 14.0909C10 14.0909 16.2545 14.0909 17.8136 13.6705C18.6739 13.4386 19.3523 12.7568 19.5818 11.8909C20 10.3205 20 7.04545 20 7.04545C20 7.04545 20 3.77045 19.5818 2.2ZM7.95455 10.0193V4.07159L13.1818 7.04545L7.95455 10.0193Z" fill="white"/>
                                        </svg>                                        
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden lg:flex w-full items-center space-x-5">
                        <div><img src="/assets/images/GIA.png" alt=""></div> 
                        <div><img src="/assets/images/IE.png" alt=""></div> 
                    </div>
                </div>
                <div class="flex flex-col space-y-3 lg:space-y-0 lg:space-x-2 divide-y lg:divide-none divide-white divide-opacity-20 lg:flex-row lg:justify-between lg:col-span-3 lg:pl-10 xl:pl-12">
                    <div x-data="{dd1 : false}" class="flex flex-col pt-3 lg:pt-0">
                        <p class="flex items-center justify-between text-sm font-medium text-white">
                            <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                                <span>Diamond Prices</span>
                                <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                            </span>
                            <button @click="dd1 = !dd1" class="lg:hidden focus:outline-none">
                                <svg :class="{'transform' : dd1}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                                </svg>
                            </button>
                        </p>
                        <ul :class="{'hidden lg:flex' : !dd1, 'flex lg:hidden' : dd1}" class="flex-col mt-4 space-y-3 font-libre">
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Round Cut Diamond
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Fancy Cut Diamond
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Fancy Color Diamond
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div x-data="{dd2 : false}" class="flex flex-col pt-3 lg:pt-0">
                        <p class="flex items-center justify-between text-sm font-medium text-white">
                            <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                                <span>Diamond Jewellery</span>
                                <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                            </span>
                            <button @click="dd2 = !dd2" class="lg:hidden focus:outline-none">
                                <svg :class="{'transform' : dd2}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                                </svg>
                            </button>
                        </p>
                        <ul :class="{'hidden lg:flex' : !dd2, 'flex lg:hidden' : dd2}" class="flex-col mt-4 space-y-3 font-libre">
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Setting
                                </a>
                                <span class="text-white text-sm"> | </span>
                                <a href="#" class="text-sm text-white">
                                    Solitaire Ring
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Setting
                                </a>
                                <span class="text-white text-sm"> | </span>
                                <a href="#" class="text-sm text-white">
                                    Side Stone Rring
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Setting
                                </a>
                                <span class="text-white text-sm"> | </span>
                                <a href="#" class="text-sm text-white">
                                    Halo Ring Women
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Classic Rings Men
                                </a>
                                <span class="text-white text-sm"> | </span>
                                <a href="#" class="text-sm text-white">
                                    Classic Rings
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div x-data="{dd3 : false}" class="flex flex-col pt-3 lg:pt-0">
                        <p class="flex items-center justify-between text-sm font-medium text-white">
                            <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                                <span>Diamond Education</span>
                                <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                            </span>
                            <button @click="dd3 = !dd3" class="lg:hidden focus:outline-none">
                                <svg :class="{'transform' : dd3}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                                </svg>
                            </button>
                        </p>
                        <ul :class="{'hidden lg:flex' : !dd3, 'flex lg:hidden' : dd3}" class="flex-col mt-4 space-y-3 font-libre">
                            <li>
                                <a href="#" class="text-sm text-white">
                                    How To Choose Diamond 4Cs？
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    What Is Diamond Fluorescence ?
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Is Diamond Proportion ?
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    What Is Diamond Proportion ?
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Fancy Color IntensIty
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div x-data="{dd4 : false}" class="flex flex-col pt-3 lg:pt-0">
                        <p class="flex items-center justify-between text-sm font-medium text-white">
                            <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                                <span>About Ting Diamond</span>
                                <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                            </span>
                            <button @click="dd4 = !dd4" class="lg:hidden focus:outline-none">
                                <svg :class="{'transform' : dd4}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                                </svg>
                            </button>
                        </p>
                        <ul :class="{'hidden lg:flex' : !dd4, 'flex lg:hidden' : dd4}" class="flex-col mt-4 space-y-3 font-libre">
                            <li>
                                <a href="#" class="text-sm text-white">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Custom Make Engagement Rings
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-white">
                                    Diamond Inlay
                                </a>
                                <span class="text-white text-sm"> | </span>
                                <a href="#" class="text-sm text-white">
                                    Engrave Customer Monents
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex items-end lg:items-center justify-between pt-10 lg:pt-7">
                <p class="hidden lg:inline-flex text-xs text-white">® 2021 Ting Diamond by Ting Diamond</p>
                <div class="flex lg:hidden w-2/4 lg:w-full items-center space-x-2 lg:space-x-5">
                    <div><img src="/assets/images/GIA.png" alt=""></div> 
                    <div><img src="/assets/images/IE.png" alt=""></div> 
                </div>
                <div class="flex justify-end lg:justify-start h-5 lg:h-auto space-x-1.5">
                    <img src="/assets/images/eps.png" alt="">
                    <img src="/assets/images/mc.png" alt="">
                    <img src="/assets/images/visa.png" alt="">
                    <img src="/assets/images/ae.png" alt="">
                    <img src="/assets/images/up.png" alt="">
                    <img src="/assets/images/wechat.png" alt="">
                </div>
            </div>
            <p class="lg:hidden text-xs text-white pt-4">® 2021 Ting Diamond by Ting Diamond</p>
        </div>
    </footer>

    <!-- Action Popup bar  -->
    <!-- <div class="fixed bottom-72 md:bottom-2/4 right-0 flex flex-col space-y-5">
        <button class="bg-gold rounded-tl-lg rounded-bl-lg w-10 md:w-16 py-5 flex flex-col items-center justify-center text-white hover:bg-opacity-90 focus:outline-none">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#ffffff"/>
            </svg>
            <p class="w-7">
                常見問題
            </p>
        </button>
    </div> -->
    <!-- Action Popup Buttons  -->
    <div class="fixed bottom-2 md:bottom-4 right-2 md:right-4 flex flex-col space-y-1 md:space-y-5">
        <button class="bg-brown rounded-full w-14 md:w-20 h-14 md:h-20 flex items-center justify-center text-white hover:bg-opacity-90 focus:outline-none">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.4978 0C7.85153 0 0 6.39171 0 14.2482C0 18.2277 1.99975 21.9598 5.53181 24.6445C4.40945 26.3892 2.85465 28.3115 0.949882 28.7839C0.347457 28.9339 -0.0549932 29.5039 0.00749907 30.1213C0.0674916 30.7412 0.577428 31.2186 1.19735 31.2461C1.22735 31.2461 1.33733 31.2511 1.51481 31.2511C2.81215 31.2511 7.79903 31.0437 13.4558 28.109C14.7457 28.3665 16.103 28.4965 17.4978 28.4965C27.1441 28.4965 34.9957 22.1048 34.9957 14.2482C34.9957 6.39171 27.1441 0 17.4978 0ZM17.4978 25.9968C16.123 25.9968 14.7957 25.8543 13.5483 25.5718C13.2559 25.5043 12.9459 25.5468 12.6784 25.6918C10.2587 26.9967 7.94152 27.7466 6.03675 28.1765C6.91914 27.1466 7.65655 25.9968 8.28397 24.9344C8.62393 24.3595 8.44895 23.6196 7.89152 23.2546C4.46445 21.0099 2.49969 17.7278 2.49969 14.2482C2.49969 7.76904 9.22636 2.49969 17.4978 2.49969C25.7693 2.49969 32.496 7.76904 32.496 14.2482C32.496 20.7249 25.7693 25.9968 17.4978 25.9968Z" fill="white"/>
                <path d="M39.0529 37.5103C37.623 37.1478 36.2407 35.9955 34.9384 34.0782C38.168 31.5785 39.9953 28.1364 39.9953 24.4719C39.9953 22.7346 39.5803 21.0223 38.7629 19.3875C38.4529 18.7676 37.6955 18.5251 37.0856 18.8301C36.4682 19.14 36.2182 19.89 36.5257 20.5074C37.1681 21.7922 37.4956 23.1246 37.4956 24.4719C37.4956 27.6415 35.6958 30.6411 32.5587 32.7009C31.9987 33.0658 31.8288 33.8082 32.1712 34.3832C32.7886 35.4255 33.4261 36.3229 34.091 37.0778C32.3937 36.7254 30.3614 36.0879 28.2392 34.9456C27.9767 34.8031 27.6668 34.7631 27.3768 34.8256C22.3524 35.9305 16.9406 34.6231 13.551 31.6335C13.0286 31.1736 12.2412 31.2261 11.7862 31.7435C11.3288 32.2609 11.3788 33.0508 11.8962 33.5083C15.7732 36.9228 21.79 38.4627 27.4618 37.3603C32.0112 39.7 36.0982 40 37.9005 40C38.4729 40 38.8129 39.97 38.8679 39.965C39.4728 39.9075 39.9503 39.4225 39.9953 38.8176C40.0402 38.2102 39.6428 37.6603 39.0529 37.5103Z" fill="white"/>
            </svg>
        </button>
        <a href="#" class="bg-white rounded-full w-14 md:w-20 h-14 md:h-20 flex items-center justify-center border border-brown hover:bg-brown-light focus:outline-none">
            <svg class="fill-current text-brown" width="30" height="19" viewBox="0 0 30 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.475 18.525L15 7.07496L3.525 18.525L0 15L15 -3.43323e-05L30 15L26.475 18.525Z"/>
            </svg>
        </a>
    </div>
    <script src="./js/alpine.js"></script>
    <script>
        function price() {
            return {
              minprice: 0, 
              maxprice: 10000,
              min: 100, 
              max: 10000,
              minthumb: 0,
              maxthumb: 0, 
              
              mintrigger() {   
                this.minprice = Math.min(this.minprice, this.maxprice - 500);      
                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
              },
               
              maxtrigger() {
                this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
              }, 
            }
        }
        function caret() {
            return {
              minprice: 0, 
              maxprice: 10000,
              min: 100, 
              max: 10000,
              minthumb: 0,
              maxthumb: 0, 
              
              mintrigger() {   
                this.minprice = Math.min(this.minprice, this.maxprice - 500);      
                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
              },
               
              maxtrigger() {
                this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
              }, 
            }
        }
        function cut() {
            return {
              minprice: 0, 
              maxprice: 10000,
              min: 100, 
              max: 10000,
              minthumb: 0,
              maxthumb: 0, 
              
              mintrigger() {   
                this.minprice = Math.min(this.minprice, this.maxprice - 500);      
                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
              },
               
              maxtrigger() {
                this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
              }, 
            }
        }
        function clarity() {
            return {
              minprice: 0, 
              maxprice: 10000,
              min: 100, 
              max: 10000,
              minthumb: 0,
              maxthumb: 0, 
              
              mintrigger() {   
                this.minprice = Math.min(this.minprice, this.maxprice - 500);      
                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
              },
               
              maxtrigger() {
                this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
              }, 
            }
        }
    </script>
</body>
</html>