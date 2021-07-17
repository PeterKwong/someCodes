@extends('beta.layouts.section.frontend')

<!-- meta -->
@section('meta')

@endSection


<!-- content -->
@section('content')

    <!-- Hero Section  -->
    <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
        <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest">
            ENGAGEMENT RINGS
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
                    <span>Engagement Rings</span>
                </a>
            </li>
            <li>
                <a class="pl-3 text-xs md:text-sm font-medium" href="#">
                    <span>Start with a Setting</span>
                </a>
            </li>
            <li>
                <a class="pl-3 text-xs md:text-sm font-bold" href="#">
                    <span>18K White Diamond Ring</span>
                </a>
            </li>
        </ul>
        <!-- Steps  -->
        <div class="flex flex-col space-y-7 py-10 md:mb-16">
            <div class="flex items-center justify-between lg:justify-around px-5 md:px-0 font-suranna">
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="border-2 border-dashed rounded p-5">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 40C8.98758 40 0 31.0118 0 20C0 8.98758 8.9882 0 20 0C31.0124 0 40 8.9882 40 20C40 31.0124 31.0118 40 20 40ZM20 2.34375C10.2643 2.34375 2.34375 10.2643 2.34375 20C2.34375 29.7357 10.2643 37.6562 20 37.6562C29.7357 37.6562 37.6562 29.7357 37.6562 20C37.6562 10.2643 29.7357 2.34375 20 2.34375Z" fill="#CCCCCC"/>
                            <path d="M20 35.3125C11.5896 35.3125 4.6875 28.4088 4.6875 20C4.6875 11.5896 11.5912 4.6875 20 4.6875C28.4104 4.6875 35.3125 11.5912 35.3125 20C35.3125 28.4104 28.4088 35.3125 20 35.3125ZM20 7.03125C12.849 7.03125 7.03125 12.849 7.03125 20C7.03125 27.151 12.849 32.9688 20 32.9688C27.151 32.9688 32.9688 27.151 32.9688 20C32.9688 12.849 27.151 7.03125 20 7.03125Z" fill="#CCCCCC"/>
                        </svg>
                    </div>
                    <span class="text-lg">Select Setting</span>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="border-2 border-dashed rounded p-5">
                        <svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M41.781 12.0392L35.5895 0.950954C35.2765 0.391036 34.6102 0 33.969 0H8.0312C7.3897 0 6.72323 0.391161 6.41055 0.951203L0.219043 12.0391C-0.11214 12.6319 -0.0637101 13.429 0.336764 13.9773L15.7194 35.0456C16.0709 35.5271 16.7074 35.8503 17.3034 35.8503H24.6964C25.2924 35.8503 25.929 35.5269 26.2804 35.0456L41.6632 13.9772C42.0638 13.4289 42.1121 12.6318 41.781 12.0392ZM38.7172 11.7813C36.9088 11.7813 33.3452 11.7813 31.4821 11.7813C31.2463 11.7813 31.3156 11.6459 31.3156 11.6459L34.1228 3.40359C34.1228 3.40359 34.2152 3.33008 34.2637 3.41601C35.4555 5.53039 38.3234 10.6829 38.8508 11.6303C38.9054 11.7284 38.8646 11.7813 38.7172 11.7813ZM27.0781 11.7813C23.9498 11.7813 17.7548 11.7813 14.5644 11.7813C14.3383 11.7813 14.4547 11.635 14.4547 11.635L20.2666 2.42209C20.2666 2.42209 20.2806 2.35913 20.3986 2.35913C20.6444 2.35913 21.0768 2.35913 21.303 2.35913C21.4012 2.35913 21.4235 2.4242 21.4235 2.4242L27.2465 11.6543C27.2465 11.6545 27.3534 11.7813 27.0781 11.7813ZM24.321 2.35926C26.08 2.35926 31.0673 2.35926 31.8753 2.35926C32.008 2.35926 31.9395 2.49709 31.9395 2.49709C31.9395 2.49709 30.0175 8.14284 29.3234 10.1787C29.28 10.3055 29.1315 10.2205 29.1315 10.2205L24.2303 2.4514C24.2302 2.45152 24.1537 2.35926 24.321 2.35926ZM12.4286 10.0604C11.7924 8.19202 9.88878 2.58104 9.88878 2.58104C9.88878 2.58104 9.78956 2.35926 10.0033 2.35926C11.6917 2.35926 16.4156 2.35926 17.3537 2.35926C17.5134 2.35926 17.4143 2.52193 17.4143 2.52193L12.6453 10.0815C12.6454 10.0815 12.4908 10.2433 12.4286 10.0604ZM27.893 14.1406C27.9779 14.1406 27.9552 14.1956 27.9552 14.1956L21.3986 33.4446C21.3986 33.4446 21.3817 33.4913 21.335 33.4913C21.1107 33.4913 20.6741 33.4913 20.4379 33.4913C20.3765 33.4913 20.3665 33.4373 20.3665 33.4373L13.8406 14.2191C13.8406 14.2191 13.8185 14.1405 13.9181 14.1405C17.4321 14.1406 24.3992 14.1406 27.893 14.1406ZM7.76881 3.67517C8.4169 5.53325 10.1483 10.6731 10.4697 11.6276C10.5032 11.7272 10.5145 11.7813 10.3276 11.7813C8.56815 11.7813 5.09725 11.7813 3.28934 11.7813C3.06321 11.7813 3.15299 11.6234 3.15299 11.6234L7.63309 3.60066C7.63309 3.60066 7.70486 3.49176 7.76881 3.67517ZM3.51559 14.1406C5.46742 14.1406 9.33445 14.1406 11.2457 14.1406C11.3491 14.1406 11.3559 14.2387 11.3559 14.2387L17.8656 33.409C17.8656 33.409 17.8945 33.4913 17.8257 33.4913C17.7649 33.4913 17.6602 33.4913 17.5825 33.4913C17.5039 33.4913 17.4498 33.4147 17.4498 33.4147L3.44829 14.2379C3.44817 14.2379 3.36062 14.1406 3.51559 14.1406ZM24.4413 33.4913C24.3159 33.4913 24.0786 33.4913 23.94 33.4913C23.8614 33.4913 23.8979 33.4242 23.8979 33.4242L30.4468 14.1968C30.4468 14.1968 30.4597 14.1406 30.547 14.1406C32.566 14.1406 36.5513 14.1406 38.5524 14.1406C38.6237 14.1406 38.5894 14.1866 38.5894 14.1866L24.5214 33.454C24.5213 33.454 24.5028 33.4913 24.4413 33.4913Z" fill="#CCCCCC"/>
                        </svg>                    
                    </div>
                    <span class="text-lg">Select Diamond</span>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
                    <div class="border-2 border-dashed rounded p-5">
                        <svg class="w-10" height="38" viewBox="0 0 50 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 0.669556C11.215 0.669556 0 7.59202 0 16.1012C0 22.4404 6.05918 28.0029 15.4708 30.3628C16.7913 34.5124 20.6453 37.3305 25 37.3305C29.3547 37.3305 33.2087 34.5124 34.5292 30.3628C43.9408 28.0029 50 22.4404 50 16.1012C50 7.59202 38.785 0.669556 25 0.669556ZM17.035 24.8828L20 25.8729V28.7995L17.035 29.7896C16.5417 28.1911 16.5417 26.4812 17.035 24.8828ZM25 9.83616C33.0691 9.83616 40.0983 12.392 42 15.9562C40.8167 18.2604 37.57 20.2753 33.0417 21.4154C31.165 18.8509 28.1778 17.3353 25 17.3353C21.8223 17.3353 18.835 18.8509 16.9583 21.4154C12.43 20.2753 9.1833 18.2604 8 15.9562C9.90166 12.392 16.9309 9.83616 25 9.83616ZM7.52832 13.7645C7.8333 9.3511 15.6967 5.66946 25 5.66946C34.3033 5.66946 42.1667 9.3511 42.4717 13.7645C39.4642 10.3961 32.75 8.16946 25 8.16946C17.25 8.16946 10.5358 10.3962 7.52832 13.7645ZM21.6675 29.0196V25.6604C21.686 25.6304 21.7024 25.5992 21.7166 25.567C21.7166 25.562 21.7166 25.5562 21.7166 25.5512L23.2166 24.0512C23.2225 24.0512 23.2274 24.0512 23.2324 24.0512C23.2612 24.0366 23.2891 24.0201 23.3157 24.0021H26.6857C26.7125 24.0201 26.7403 24.0366 26.769 24.0512C26.774 24.0512 26.779 24.0512 26.7849 24.0512L28.2849 25.5512C28.2849 25.5562 28.2849 25.562 28.2849 25.567C28.2991 25.5992 28.3155 25.6304 28.334 25.6604V29.0203C28.3159 29.0471 28.2994 29.0749 28.2849 29.1036C28.2849 29.1086 28.2849 29.1145 28.2849 29.1195L26.7849 30.6187C26.7799 30.6187 26.7749 30.6187 26.7698 30.6187C26.741 30.6333 26.7132 30.6497 26.6865 30.6678H23.3148C23.2881 30.6497 23.2603 30.6332 23.2315 30.6187C23.2266 30.6187 23.2216 30.6187 23.2165 30.6187L21.7165 29.1187C21.7165 29.1137 21.7165 29.1078 21.7165 29.1029C21.7021 29.0741 21.6856 29.0462 21.6675 29.0196ZM21.0061 20.0253L21.9767 22.9337L20.5958 24.3146L17.6866 23.3429C18.4554 21.944 19.6068 20.7932 21.0061 20.0253ZM22.5458 19.3729C24.1447 18.8795 25.8552 18.8795 27.4541 19.3729L26.4641 22.3363H23.5357L22.5458 19.3729ZM28.02 22.9337L28.9908 20.0245C30.3907 20.7924 31.5427 21.9436 32.3116 23.3429H32.31L29.4008 24.3146L28.02 22.9337ZM21.0075 34.6479C19.6082 33.8797 18.4568 32.7286 17.6884 31.3295L20.5976 30.3578L21.9784 31.7387L21.0075 34.6479ZM22.5458 35.2995L23.5358 32.3362H26.4642L27.4542 35.2995C25.8553 35.7929 24.1447 35.7929 22.5458 35.2995ZM28.9925 34.6479L28.0217 31.7387L29.4025 30.3578L32.3117 31.3295C31.5432 32.7286 30.3918 33.8797 28.9925 34.6479ZM32.9634 29.7895L30 28.7995V25.8729L32.9634 24.8828C33.4566 26.4812 33.4566 28.1911 32.9634 29.7895ZM34.9208 28.5362C35.1691 26.6035 34.8309 24.6408 33.95 22.9029C40.28 21.1929 44.1667 17.8462 44.1667 14.0229C44.1667 8.40452 35.75 4.00286 25 4.00286C14.25 4.00286 5.8333 8.40452 5.8333 14.0229C5.8333 17.8462 9.71992 21.1896 16.05 22.9029C15.1705 24.6413 14.8338 26.6039 15.0833 28.5362C7.00664 26.2854 1.6667 21.3912 1.6667 16.1012C1.6667 8.51116 12.1342 2.33616 25 2.33616C37.8658 2.33616 48.3333 8.51116 48.3333 16.1012C48.3333 21.3912 42.9934 26.2854 34.9208 28.5362Z" fill="#CCCCCC"/>
                        </svg>                    
                    </div>
                    <span class="text-lg">Finish</span>
                </div>
            </div>
            <nav class="overflow-hidden" aria-label="Progress">
                <ol class="flex items-center py-2">
                    <li class="relative pl-12 md:pl-28 lg:pl-44 xl:pl-52 2xl:pl-64">
                        <!-- Current Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-1.5 md:h-3 w-full bg-gold"></div>
                        </div>
                        <a href="#" class="relative w-8 h-8 z-10 bg-gold border-2 border-white transform rotate-45 flex items-center justify-center">
                            <span class="text-xl font-suranna text-white transform -rotate-45">1</span>
                        </a>
                    </li>
                
                    <li class="relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131">
                        <!-- Next Step -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="h-0.5 w-full bg-gold bg-opacity-80"></div>
                        </div>
                        <a href="#" class="relative w-8 h-8 z-10 bg-white border-2 border-gold transform rotate-45 flex items-center justify-center">
                            <span class="text-xl font-suranna text-gold transform -rotate-45">2</span>
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
        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10">
            <!-- Column-1 - Ring Display  -->
            <div class="md:col-span-3 flex flex-col space-y-4">
                <!-- Row 1  -->
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="w-full md:w-1/4 flex flex-row space-x-3 md:space-x-0 md:flex-col items-center justify-between md:space-y-3">
                        <div x-data="{ video1 : false}" class="relative flex items-center justify-center border cursor-pointer">
                            <video @click="video1 = false" class="h-20 w-full" autoplay>
                                <source class="h-full" src="/assets/images/Placeholder.mp4" type="video/mp4">
                            </video>
                            <div x-show="video1 == false" class="absolute h-full w-full flex items-center justify-center">
                                <img class="h-full w-full" src="/assets/images/customer jewellery 3.png" alt="">
                                <svg @click="video1 = true" class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                    <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666"/>
                                </svg>
                            </div>
                        </div>
                        <div x-data="{ video2 : false}" class="relative flex items-center justify-center border cursor-pointer">
                            <video @click="video2 = false" class="h-20 w-full pr-0.5 md:pr-0" autoplay>
                                <source class="h-full" src="/assets/images/Placeholder.mp4" type="video/mp4">
                            </video>
                            <div x-show="video2 == false" class="absolute h-full w-full flex items-center justify-center">
                                <img class="h-full w-full" src="/assets/images/customer jewellery 3.png" alt="">
                                <svg @click="video2 = true" class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                    <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666"/>
                                </svg>
                            </div>
                        </div>
                        <div x-data="{ video3 : false}" class="relative flex items-center justify-center border cursor-pointer">
                            <video @click="video3 = false" class="h-20 w-full" autoplay>
                                <source class="h-full" src="/assets/images/Placeholder.mp4" type="video/mp4">
                            </video>
                            <div x-show="video3 == false" class="absolute h-full w-full flex items-center justify-center">
                                <img class="h-full w-full" src="/assets/images/customer jewellery 3.png" alt="">
                                <svg @click="video3 = true" class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                    <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-3/4 h-auto relative border">
                        <img class="w-full h-full" src="/assets/images/Ring-details-main.png" alt="">
                        <!-- zoom in/out  -->
                        <div class="absolute top-6 right-6 flex flex-col divide-y border">
                            <button class="w-7 h-7 flex items-center justify-center">
                                <svg class="" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.0975 9.5239H14.9512V6.59707H9.0975V0.743408H6.17067V6.59707H0.317017V9.5239H6.17067V15.3776H9.0975V9.5239Z" fill="#666666"/>
                                </svg> 
                            </button> 
                            <button class="w-7 h-7 flex items-center justify-center border-t-2">
                                <svg width="15" height="4" viewBox="0 0 15 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.0975 3.25557H14.9512V0.328735H9.0975H6.17067H0.317017V3.25557H6.17067H9.0975Z" fill="#666666"/>
                                </svg>  
                            </button>                                            
                        </div>
                        <!-- 360 view  -->
                        <div class="absolute bottom-3 w-full flex justify-end items-center px-4">
                            <div class="flex items-center">
                                <button class="flex items-center justify-center">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.8335 20C3.8335 11.0863 11.0864 3.83337 20.0002 3.83337C28.9139 3.83337 36.1668 11.0863 36.1668 20C36.1668 28.9138 28.9139 36.1667 20.0002 36.1667C11.0864 36.1667 3.8335 28.9138 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                        <path d="M19.5285 25.5725L11.6665 20L19.5285 14.4275V18.3055L24.9998 14.4275V25.5725L19.5285 21.6945V25.5725Z" fill="#666666"/>
                                    </svg>                                             
                                </button> 
                                <button class="flex items-center justify-center">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                        <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666"/>
                                    </svg>                                                                      
                                </button> 
                                <button class="flex items-center justify-center">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M36.1665 20C36.1665 11.0863 28.9136 3.83337 19.9998 3.83337C11.0861 3.83337 3.83317 11.0863 3.83317 20C3.83317 28.9138 11.0861 36.1667 19.9998 36.1667C28.9136 36.1667 36.1665 28.9138 36.1665 20Z" fill="white" stroke="#CCCCCC"/>
                                        <path d="M20.4715 25.5725L28.3335 20L20.4715 14.4275V18.3055L15.0002 14.4275V25.5725L20.4715 21.6945V25.5725Z" fill="#666666"/>
                                    </svg>                                    
                                </button>  
                            </div>                                          
                        </div>
                    </div>
                </div>
                <!-- Row 2  -->
                <div class="flex md:space-x-4">
                    <div class="hidden md:flex w-1/4 h-auto"></div>
                    <div class="w-full md:w-3/4 flex justify-between space-x-3 md:pl-3">
                        <div class="relative flex items-center justify-center border w-32 md:w-40 h-20 cursor-pointer">
                            <img class="opacity-50" src="/assets/images/Ring-details-1.png" alt="">
                            <div class="absolute bottom-1 w-full">
                                <p class="flex items-center space-x-1">
                                    <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" fill="#666666"></path>
                                    </svg>
                                    <span class="text-sm">360° view</span>
                                </p>                                           
                            </div>
                        </div>
                        <div x-data="{ video4 : false}" class="relative flex items-center justify-center border w-32 md:w-40 h-20 cursor-pointer">
                            <video @click="video4 = false" class="h-20 w-full pr-0.5 md:pr-0" autoplay>
                                <source class="h-full" src="/assets/images/Placeholder.mp4" type="video/mp4">
                            </video>
                            <div x-show="video4 == false" class="absolute h-full w-full flex items-center justify-center">
                                <img class="h-full w-full" src="/assets/images/Ring-details-3.png" alt="">
                                <svg @click="video4 = true" class="absolute" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC"/>
                                    <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center justify-center border w-32 md:w-40 h-20 cursor-pointer overflow-hidden">
                            <img class="h-20" src="/assets/images/Ring-details-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column-2 - Ring Detials  -->
            <div class="md:col-span-4 flex flex-col space-y-3">
                <div class="max-w-xl flex items-center justify-between">
                    <span class="text-xl font-suranna">18K White Diamond Ring</span>
                    <p class="flex items-center space-x-1 text-gold-light text-xl font-suranna">
                        <span>HKD</span>
                        <span class="text-3xl">$3,200</span>
                    </p>
                </div>
                <p class="text-base">Engagement ring setting</p>
                <div class="grid grid-cols-5 space-x-10">
                    <span class="col-span-2 md:col-span-1 flex items-center space-x-2">
                        <span class="font-medium">Style</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        Solitare
                    </span>
                </div>
                <div class="grid grid-cols-5 space-x-10">
                    <span class="col-span-2 md:col-span-1 flex items-center space-x-2">
                        <span class="font-medium">Shoulder</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        Twisted
                    </span>
                </div>
                <div class="grid grid-cols-5 space-x-10">
                    <span class="col-span-2 md:col-span-1 flex items-center space-x-2">
                        <span class="font-medium">Claw Prong</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        6-prong
                    </span>
                </div>
                <div class="grid grid-cols-5 space-x-10">
                    <span class="col-span-2 md:col-span-1 flex items-center space-x-2">
                        <span class="font-medium">Side Stone</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </span>
                    <span class="col-span-3 md:col-span-4">
                        Around 0 tct
                    </span>
                </div>
                <p class="font-lato text-grey-lighter text-sm border-t pt-6">Stock No. KF-DR-00494</p>
                <div class="flex flex-col space-y-5 font-lato">
                    <div class="flex items-center space-x-2">
                        <label for="ring_size">
                            <span class="font-medium">Ring Size:</span>
                        </label>
                        <select id="ring_size" name="ring_size" class="block w-44 md:w-36 pb-1 text-black text-opacity-50 bg-white border-b border-opacity-20 focus:outline-none">
                            <option>Please select</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="engrave">
                            <span class="font-medium">Engrave:</span>
                        </label>
                        <input type="text" id="engrave" name="engrave" placeholder="Please type your engrave" class="block w-full md:w-56 pb-1 text-black text-opacity-50 border-b border-opacity-20 focus:outline-none">
                    </div>
                </div>
                <div x-data="{ setting: false}" class="max-w-sm p-4 bg-brown hover:bg-white border border-brown transition ease-in-out duration-500" @mouseover="setting = true" @mouseleave="setting = false">
                    <div x-show="setting == false" class="flex items-center space-x-3 justify-center">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.3334 7.04643H7.33335V12.0464H5.66669V7.04643H0.666687V5.37976H5.66669V0.379761H7.33335V5.37976H12.3334V7.04643Z" fill="white"/>
                        </svg>
                        <span class="text-white font-bold font-lato tracking-widest uppercase">Add this Setting</span>
                    </div>
                    <div x-show="setting == true" class="flex flex-col md:flex-row space-y-1 md:space-y-0 items-center md:space-x-5 justify-center">
                        <button class="flex items-center space-x-2 justify-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8944 5.82879L13.8354 3.60338C13.8752 3.5578 13.9009 3.50173 13.9097 3.44188C13.9184 3.38203 13.9098 3.32093 13.8847 3.26587C13.8806 3.25669 13.8736 3.24949 13.8687 3.24085C13.868 3.23616 13.8664 3.23164 13.864 3.22753L12.6704 1.3463C12.642 1.30147 12.6027 1.26456 12.5562 1.23897C12.5097 1.21339 12.4574 1.19997 12.4044 1.19995H7.63026C7.57718 1.19997 7.52496 1.21339 7.47845 1.23897C7.43194 1.26456 7.39264 1.30147 7.36421 1.3463L6.17059 3.22753C6.16888 3.2309 6.16784 3.23457 6.16753 3.23833C6.16103 3.24717 6.15502 3.25637 6.14953 3.26587C6.12448 3.32093 6.11581 3.38203 6.12456 3.44188C6.13331 3.50173 6.1591 3.5578 6.19885 3.60338L8.14021 5.82879C6.55987 6.28141 5.1963 7.28983 4.30066 8.6683C3.40502 10.0468 3.03763 11.7024 3.26617 13.3304C3.4947 14.9583 4.30376 16.4488 5.54433 17.5274C6.7849 18.606 8.37343 19.1999 10.0173 19.1999C11.6612 19.1999 13.2497 18.606 14.4903 17.5274C15.7309 16.4488 16.5399 14.9583 16.7684 13.3304C16.997 11.7024 16.6296 10.0468 15.734 8.6683C14.8383 7.28983 13.4747 6.28141 11.8944 5.82879ZM10.7193 6.21868L11.4482 3.71138H12.9062L10.7193 6.21868ZM10.5901 1.82997H11.8321L11.2107 2.8083L10.5901 1.82997ZM10.638 3.08137H9.39593L10.0173 2.10304L10.638 3.08137ZM8.82387 2.8083L8.20303 1.82997H9.44507L8.82387 2.8083ZM10.7913 3.71138L10.0173 6.3733L9.24328 3.71138H10.7913ZM10.0173 7.81676C10.9205 7.81673 11.8033 8.08451 12.5543 8.58625C13.3053 9.08799 13.8906 9.80114 14.2362 10.6355C14.5819 11.4699 14.6723 12.3881 14.4961 13.2739C14.32 14.1597 13.8851 14.9733 13.2465 15.612C12.6079 16.2506 11.7942 16.6855 10.9084 16.8618C10.0226 17.038 9.10446 16.9475 8.27005 16.6019C7.43565 16.2563 6.72247 15.671 6.2207 14.9201C5.71893 14.1692 5.45111 13.2863 5.45111 12.3831C5.45264 11.1726 5.9342 10.012 6.79019 9.15597C7.64618 8.29994 8.80673 7.81834 10.0173 7.81676ZM13.025 3.08137H11.783L12.4036 2.10304L13.025 3.08137ZM7.63026 2.10304L8.25092 3.08137H7.00888L7.63026 2.10304ZM8.58735 3.71138L9.31619 6.21868L7.1293 3.71138H8.58735ZM10.0173 18.5705C8.49968 18.5703 7.03505 18.0123 5.90194 17.0028C4.76883 15.9932 4.04627 14.6024 3.87166 13.0948C3.69706 11.5873 4.08258 10.0682 4.95493 8.82631C5.82728 7.58446 7.1256 6.70652 8.60301 6.35944L9.36191 7.23013C8.05118 7.39678 6.85316 8.05649 6.01156 9.07506C5.16996 10.0936 4.74799 11.3946 4.83148 12.7132C4.91497 14.0318 5.49766 15.2691 6.46102 16.1734C7.42437 17.0777 8.69603 17.581 10.0173 17.581C11.3386 17.581 12.6102 17.0777 13.5736 16.1734C14.537 15.2691 15.1196 14.0318 15.2031 12.7132C15.2866 11.3946 14.8647 10.0936 14.0231 9.07506C13.1814 8.05649 11.9834 7.39678 10.6727 7.23013L11.4316 6.35998C12.9085 6.70753 14.2062 7.5856 15.0781 8.82729C15.95 10.069 16.3352 11.5877 16.1607 13.0949C15.9861 14.602 15.2639 15.9925 14.1312 17.002C12.9986 18.0115 11.5345 18.5697 10.0173 18.5705Z" fill="#9A7474"/>
                            </svg>                            
                            <span class="text-brown font-bold font-lato tracking-widest uppercase">Add to ring</span>
                        </button>
                        <span class="transform rotate-90 md:rotate-0 text-brown font-bold font-lato tracking-widest uppercase">|</span>
                        <button class="flex items-center space-x-2 justify-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2007 5.56545C18.0827 5.41437 17.9016 5.32625 17.7098 5.32625H5.51484L4.95373 2.97858C4.88661 2.69805 4.63576 2.5 4.34731 2.5H2.28995C1.94561 2.49997 1.6665 2.77907 1.6665 3.12341C1.6665 3.46775 1.94561 3.74685 2.28995 3.74685H3.85522L5.88141 12.2249C5.94853 12.5056 6.19938 12.7034 6.48782 12.7034H16.1928C16.4794 12.7034 16.7292 12.5081 16.7979 12.23L18.315 6.0995C18.3609 5.91333 18.3187 5.71652 18.2007 5.56545ZM15.705 11.4566H6.97992L5.81282 6.57314H16.9132L15.705 11.4566ZM14.8628 13.5973C13.7169 13.5973 12.7847 14.5296 12.7847 15.6754C12.7847 16.8213 13.7169 17.7536 14.8628 17.7536C16.0087 17.7536 16.9409 16.8213 16.9409 15.6754C16.9409 14.5296 16.0087 13.5973 14.8628 13.5973ZM14.8628 16.5067C14.4044 16.5067 14.0315 16.1339 14.0315 15.6754C14.0315 15.217 14.4044 14.8442 14.8628 14.8442C15.3212 14.8442 15.694 15.217 15.694 15.6754C15.694 16.1339 15.3212 16.5067 14.8628 16.5067ZM5.24096 15.6754C5.24096 14.5296 6.17319 13.5973 7.3191 13.5973C8.46497 13.5973 9.39723 14.5296 9.39723 15.6754C9.39723 16.8213 8.46497 17.7536 7.3191 17.7536C6.17322 17.7536 5.24096 16.8213 5.24096 15.6754ZM6.48784 15.6754C6.48784 16.1339 6.86066 16.5067 7.3191 16.5067C7.77753 16.5067 8.15035 16.1339 8.15035 15.6754C8.15035 15.217 7.77753 14.8442 7.3191 14.8442C6.86066 14.8442 6.48784 15.217 6.48784 15.6754Z" fill="#9A7474"/>
                            </svg>                            
                            <span class="text-brown font-bold font-lato tracking-widest uppercase">Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recommend Settings - Products -->
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 w-full gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
            <div class="col-span-2 md:col-span-2 lg:col-span-3 2xl:col-span-4 flex items-center justify-between">
                <h2 class="text-xl font-medium text-brown">Recommend Settings</h2>
                <div class="flex items-center space-x-2">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/Recommend-Settings-1.png" alt="Recommend-Settings-2">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$6,800</span>
                    </p>
                    <h1 class="text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                    </h1>
                    <p class="text-xs md:text-base">Engagement ring setting</p>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">52</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                        <p class="text-xs md:text-sm">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                        <p class="text-xs md:text-sm">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                        <p class="text-xs md:text-sm">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/Recommend-Settings-2.png" alt="Recommend-Settings-3">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$7,000</span>
                    </p>
                    <h1 class="text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                    </h1>
                    <p class="text-xs md:text-base">Engagement ring setting</p>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">20</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                        <p class="text-xs md:text-sm">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                        <p class="text-xs md:text-sm">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                        <p class="text-xs md:text-sm">6</p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/Recommend-Settings-3.png" alt="Recommend-Settings-1">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$6,500</span>
                    </p>
                    <h1 class="text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                    </h1>
                    <p class="text-xs md:text-base">Engagement ring setting</p>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">3</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                        <p class="text-xs md:text-sm">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                        <p class="text-xs md:text-sm">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                        <p class="text-xs md:text-sm">6</p>
                    </div>
                </div>
            </div>
            <div class="hidden 2xl:flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/Recommend-Settings-4.png" alt="Recommend-Settings-4">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$5,500</span>
                    </p>
                    <h1 class="text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                    </h1>
                    <p class="text-xs md:text-base">Engagement ring setting</p>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">52</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                        <p class="text-xs md:text-sm">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                        <p class="text-xs md:text-sm">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                        <p class="text-xs md:text-sm">6</p>
                    </div>
                </div>
            </div>
            <!-- More Products .... -->
        </div>
        <!-- Products -->
        <div class="grid md:grid-cols-2 w-full gap-3 md:gap-7 md:items-center pt-10 pb-20 2xl:py-20">
            <div class="md:col-span-2 flex items-center justify-between">
                <h2 class="text-xl font-medium text-brown">Customer Jewellery</h2>
                <div class="flex items-center space-x-2">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#666666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Product 1  -->
            <div class="col-span-1 grid grid-cols-2 space-x-2 md:space-x-3 relative product-card horizontal p-0 md:p-5 cursor-pointer">
                <img class="w-full h-full md:w-auto md:h-auto" src="/assets/images/customer jewellery 1.png" alt="customer jewellery 1">
                <div class="flex flex-col space-y-1 md:space-y-2">
                    <div class="flex flex-col mt-2 md:mt-0">
                        <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">18K White Diamond Ring</p>
                        <p class="text-sm font-lato">Engagement Ring Setting</p>
                    </div>
                    <div class="flex flex-col items-center justify-center divide-y divide-gold divide-opacity-50 mr-2 md:mr-0">
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                            <p class="text-xs md:text-sm">Solitare</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                            <p class="text-xs md:text-sm">Twisted</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                            <p class="text-xs md:text-sm text-right"> 6</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product 2  -->
            <div class="col-span-1 hidden md:grid grid-cols-2 space-x-2 md:space-x-3 relative product-card horizontal p-0 md:p-5 cursor-pointer">
                <img class="w-full h-full md:w-auto md:h-auto" src="/assets/images/customer jewellery 2.png" alt="customer jewellery 2">
                <div class="flex flex-col space-y-1 md:space-y-2">
                    <div class="flex flex-col mt-2 md:mt-0">
                        <p class="text-sm md:text-xl font-bold md:font-normal font-suranna">18K White Diamond Ring</p>
                        <p class="text-sm font-lato">Engagement Ring Setting</p>
                    </div>
                    <div class="flex flex-col items-center justify-center divide-y divide-gold divide-opacity-50 mr-2 md:mr-0">
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Style</p>
                            <p class="text-xs md:text-sm">Solitare</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Shoulder</p>
                            <p class="text-xs md:text-sm">Twisted</p>
                        </div>
                        <div class="relative flex flex-wrap w-full flex-row justify-between items-center py-2">
                            <p class="text-xs md:text-sm text-black opacity-50">Claw prong</p>
                            <p class="text-xs md:text-sm text-right"> 6</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More Products .... -->
        </div>
    </div>

@endsection