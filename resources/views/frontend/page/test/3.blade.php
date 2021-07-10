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

    @include('frontend.page.test.layouts.header')


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
                <div :class="{'hidden lg:grid' : !applyFilter, 'grid lg:hidden' : applyFilter,}" class="grid md:grid-cols-2 space-y-5 md:space-y-0 md:space-x-16">
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
                            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
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
                            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
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
                                        <div class="flex items-center space-x-6 md:space-x-10 2xl:space-x-16 absolute top-0 z-40 left-11 w-full h-2">
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
                                            <div class="w-0.5 h-2 bg-white"></div>
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
                            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
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
                            <div class="relative max-w-xs md:max-w-2xl xl:max-w-full w-full px-2">
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
                <div x-show="advance" class="flex md:flex-wrap flex-col space-y-3 xl:space-y-0 md:flex-row lg:space-x-10 bg-grey-03 p-7 mt-7">
                    <div class="flex flex-col gap-3">
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-4">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
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
                        <label class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:items-center md:space-x-5">
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
        <div class="flex flex-col divide-y space-y-5 md:space-y-10 max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 py-5 md:py-20 md:pb-10">
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

    @include('frontend.page.test.layouts.footer')

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
    <div class="fixed bottom-2 md:bottom-4 right-2 md:right-4 flex flex-col space-y-1 md:space-y-2">
        <button class="bg-brown rounded-full w-11 md:w-14 h-11 md:h-14 flex items-center justify-center text-white hover:bg-opacity-90 focus:outline-none">
            <svg width="25" height="25" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.4978 0C7.85153 0 0 6.39171 0 14.2482C0 18.2277 1.99975 21.9598 5.53181 24.6445C4.40945 26.3892 2.85465 28.3115 0.949882 28.7839C0.347457 28.9339 -0.0549932 29.5039 0.00749907 30.1213C0.0674916 30.7412 0.577428 31.2186 1.19735 31.2461C1.22735 31.2461 1.33733 31.2511 1.51481 31.2511C2.81215 31.2511 7.79903 31.0437 13.4558 28.109C14.7457 28.3665 16.103 28.4965 17.4978 28.4965C27.1441 28.4965 34.9957 22.1048 34.9957 14.2482C34.9957 6.39171 27.1441 0 17.4978 0ZM17.4978 25.9968C16.123 25.9968 14.7957 25.8543 13.5483 25.5718C13.2559 25.5043 12.9459 25.5468 12.6784 25.6918C10.2587 26.9967 7.94152 27.7466 6.03675 28.1765C6.91914 27.1466 7.65655 25.9968 8.28397 24.9344C8.62393 24.3595 8.44895 23.6196 7.89152 23.2546C4.46445 21.0099 2.49969 17.7278 2.49969 14.2482C2.49969 7.76904 9.22636 2.49969 17.4978 2.49969C25.7693 2.49969 32.496 7.76904 32.496 14.2482C32.496 20.7249 25.7693 25.9968 17.4978 25.9968Z" fill="white"/>
                <path d="M39.0529 37.5103C37.623 37.1478 36.2407 35.9955 34.9384 34.0782C38.168 31.5785 39.9953 28.1364 39.9953 24.4719C39.9953 22.7346 39.5803 21.0223 38.7629 19.3875C38.4529 18.7676 37.6955 18.5251 37.0856 18.8301C36.4682 19.14 36.2182 19.89 36.5257 20.5074C37.1681 21.7922 37.4956 23.1246 37.4956 24.4719C37.4956 27.6415 35.6958 30.6411 32.5587 32.7009C31.9987 33.0658 31.8288 33.8082 32.1712 34.3832C32.7886 35.4255 33.4261 36.3229 34.091 37.0778C32.3937 36.7254 30.3614 36.0879 28.2392 34.9456C27.9767 34.8031 27.6668 34.7631 27.3768 34.8256C22.3524 35.9305 16.9406 34.6231 13.551 31.6335C13.0286 31.1736 12.2412 31.2261 11.7862 31.7435C11.3288 32.2609 11.3788 33.0508 11.8962 33.5083C15.7732 36.9228 21.79 38.4627 27.4618 37.3603C32.0112 39.7 36.0982 40 37.9005 40C38.4729 40 38.8129 39.97 38.8679 39.965C39.4728 39.9075 39.9503 39.4225 39.9953 38.8176C40.0402 38.2102 39.6428 37.6603 39.0529 37.5103Z" fill="white"/>
            </svg>
        </button>
        <a href="#" class="bg-white rounded-full w-11 md:w-14 h-11 md:h-14 flex items-center justify-center border border-brown hover:bg-brown-light focus:outline-none">
            <svg class="fill-current text-brown" width="20" height="19" viewBox="0 0 30 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.475 18.525L15 7.07496L3.525 18.525L0 15L15 -3.43323e-05L30 15L26.475 18.525Z"/>
            </svg>
        </a>
    </div>
    <!-- inquiry -->
    <div id="inquiry" class="fixed z-50 bottom-2 md:bottom-4 left-2 md:left-8">
        <div class="bg-grey-04 px-5 py-3 max-w-2xl flex md:items-center space-x-7 rounded-xl">
            <svg class="w-16 h-16" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32.2802 0.213135C31.0074 0.213135 9.12507 0.213135 7.72203 0.213135L0 10.7431L20.0829 37.2122L40 10.7401L32.2802 0.213135ZM10.979 11.9L16.6371 28.8038L3.81162 11.9H10.979ZM13.4439 11.9H26.5652L20.0496 31.6349L13.4439 11.9ZM29.0268 11.9H36.2023L23.4158 28.8947L29.0268 11.9ZM31.0956 2.5505L36.2378 9.56259H29.0283L26.7275 2.5505H31.0956ZM24.2675 2.5505L26.5683 9.56259H13.4338L15.7346 2.5505H24.2675ZM8.90645 2.5505H13.2745L10.9737 9.56259H3.76425L8.90645 2.5505Z" fill="white"/>
            </svg>            
            <p class="text-xs md:text-base font-lato text-white">
                If you could not find diamonds as your inquiry ,for the latest diamond Stock,
                <span class="font-semibold">Please Whatsapp ( Mandy : 52376008 )</span> <br>
                price below $80,000 diamond, pay by cash would have 1.7~2% discount
            </p>
        </div>
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