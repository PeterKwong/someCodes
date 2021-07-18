@extends('beta.layouts.section.frontend')

<!-- meta -->
@section('meta')

@endSection


<!-- content -->
@section('content')

    <!-- Hero Section  -->
    <div class="hero-image flex items-center justify-center w-full h-20 xl:h-36 mt-16 lg:mt-52">
        <h2 class="text-lg xl:text-2xl font-medium font-suranna tracking-widest uppercase">
            {{trans('engagementRing.ENGAGEMENT RINGS')}}
        </h2>
    </div>
    <!-- Shop Section  -->
    <div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

        <!-- Breadcrumb  -->
        <x-breadcrumb />

        <!-- Steps  -->
        <x-shopping-cart.progress-bar />
        
        <!-- Choose/Filter -->
        <div x-data="{ applyFilter : false }" class="flex flex-col space-y-3">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold font-lato">Customise Your Setting</h2>
                <button @click="applyFilter = !applyFilter" class="lg:hidden focus:outline-none">
                    <svg  width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z" fill="#318ECE"/>
                    </svg>
                </button>
            </div>
            <form action="#">
                <div :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden' : applyFilter,}" class="flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-10 font-lato">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-1">
                            <span class="font-bold">Style</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                            </svg>
                        </label>
                        <fieldset class="flex items-center space-x-5">
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="style" value="3" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-1.png" alt="">
                                    <p id="server-size-3-label" class="text-sm md:text-base">Solitare</p>
                                </div>
                            </label>
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="style" value="3" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-2.png" alt="">
                                    <p id="server-size-3-label" class="text-sm md:text-base">Side-Stone</p>
                                </div>
                            </label>
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="style" value="3" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-3.png" alt="">
                                    <p id="server-size-3-label" class="text-sm md:text-base">Halo</p>
                                </div>
                            </label>
                        </fieldset>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-1">
                            <span class="font-bold">Shoulder</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                            </svg>
                        </label>
                        <fieldset class="flex items-center space-x-5">
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="position" value="1" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-6.png" alt="">
                                    <p id="server-size-1-label" class="text-sm md:text-base">Tapering</p>
                                </div>
                            </label>
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="position" value="2" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-4.png" alt="">
                                    <p id="server-size-2-label" class="text-sm md:text-base">Parallel</p>
                                </div>
                            </label>
                            <label class="relative block rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="position" value="3" class="sr-only">
                                <div class="flex flex-col items-center space-y-2">
                                    <img src="/assets/images/ring-design-5.png" alt="">
                                    <p id="server-size-3-label" class="text-sm md:text-base">Twisted</p>
                                </div>
                            </label>
                        </fieldset>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-1">
                            <span class="font-bold">Claw Prong</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                            </svg>
                        </label>
                        <fieldset class="flex flex-row space-x-3 md:space-x-0 md:flex-col h-full md:justify-between">
                            <label class="relative block rounded border bg-white px-5 py-2.5 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="claws" value="1" class="sr-only">
                                    <p id="server-size-1-label">4-prong</p>
                            </label>
                            <label class="relative block rounded border bg-white px-5 py-2.5 cursor-pointer hover:border-brown sm:flex sm:justify-between focus-within:bg-brown-light focus-within:border-brown">
                                <input type="checkbox" name="claws" value="2" class="sr-only">
                                    <p id="server-size-2-label">6-prong</p>
                            </label>
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label>
                            <span class="font-bold">Other Styles</span>
                        </label>
                        <select id="other_styles" name="other_styles" class="block w-36 pb-1 text-black text-opacity-50 border-b border-opacity-20 focus:outline-none">
                            <option>Please select</option>
                            <option> 1</option>
                            <option> 2</option>
                            <option> 3</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <!-- Filter Results  -->
        <div class="flex flex-col space-y-5 items-center pb-0 md:pb-7 py-7 border-t mt-5">
            <div class="flex w-full md:items-center justify-between">
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
                        <span>Solitare</span>
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
                        <span>Side-stone</span>
                    </div>
                </div>
                <div class="flex flex-shrink-0">
                    <a class="text-brown underline" href="#">Clear</a>
                </div>
            </div>
            <div class="flex flex-col space-y-2 md:space-y-0 md:flex-row w-full md:items-center md:justify-between">
                <span class="text-sm">Total: 179948 results</span>
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
        <!-- Products -->
        <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-10 2xl:py-20 2xl:pb-10">
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p1.png" alt="p1">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$3,200</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">20</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
                <div class="absolute top-3 md:top-5 left-3 md:left-5">
                    <div class="relative flex items-center justify-center">
                        <img class="w-6 md:w-auto h-8 md:h-auto" src="/assets/images/badge-diamond-brown.png" alt="">
                        <span class="absolute top-1.5 md:top-3.5 h-full text-xs md:text-sm font-suranna text-white">New</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p2.png" alt="p2">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$3,800</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">3</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
                <div class="absolute top-3 md:top-5 left-3 md:left-5">
                    <div class="relative flex items-center justify-center">
                        <img class="w-6 md:w-auto h-8 md:h-auto" src="/assets/images/badge-diamond-brown.png" alt="">
                        <span class="absolute top-1.5 md:top-3.5 h-full text-xs md:text-sm font-suranna text-white">New</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p3.png" alt="p3">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$3,800</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">75</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p4.png" alt="p4">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$5,300</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">106</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p5.png" alt="p5">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$6,800</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">52</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p5.png" alt="p5">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$6,100</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">20</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p7.png" alt="p7">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$6,100</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">3</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p8.png" alt="p8">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$7,200</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">32</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p9.png" alt="p9">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$4,800</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">8</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p10.png" alt="p10">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$4,800</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">21</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p11.png" alt="p11">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$3,600</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">10</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col relative product-card font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition duration-500">
                <img class="mt-5 md:mt-0" src="/assets/images/p12.png" alt="p12">
                <div class="flex flex-col items-center space-y-2 md:space-y-3">
                    <p class="flex items-center space-x-1 font-suranna text-gold-light">
                        <span class="text-base md:text-xl">HKD</span>
                        <span class="text-xl md:text-4xl">$7,200</span>
                    </p>
                    <h1 class="text-center text-sm md:text-xl font-suranna">
                        <a href="#">18K White Diamond Ring</a>
                        <p class="text-xs md:text-base font-lato">Engagement ring setting</p>
                    </h1>
                </div>
                <div class="flex items-center justify-center space-x-1 mt-3">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                    </svg>
                    <span class="text-sm font-lato">26</span>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center divide-y md:divide-y-0 md:divide-x divide-gold divide-opacity-50 mx-3 md:mx-0 py-2 md:py-5">
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Style</p>
                        <p class="text-xs md:text-sm text-center">Solitare</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Shoulder</p>
                        <p class="text-xs md:text-sm text-center">Twisted</p>
                    </div>
                    <div class="relative flex w-full flex-row justify-between md:flex-col items-center md:space-y-3 py-2 md:px-3 2xl:px-4">
                        <p class="text-xs md:text-sm text-black opacity-50 text-center">Claw prong</p>
                        <p class="text-xs md:text-sm text-center">6</p>
                    </div>
                </div>
            </div>
            <!-- More Products .... -->
            <!-- current page count/number  -->
            <div class="absolute top-2.5 md:top-20 md:-left-16 flex items-center justify-center bg-orange h-5 md:h-10 w-5 md:w-10 rounded-full">
                <span class="text-xs md:text-lg font-medium md:font-bold text-white">2</span>
            </div>
            <!-- Pagination / More -->
            <div class="col-span-2 lg:col-span-3 xl:col-span-4 flex justify-center relative py-4 md:py-7 2xl:py-16">
                <nav class="px-4 flex items-center justify-between sm:px-0">
                    <div class="w-0 flex-1 flex">
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b -ml-5 mt-1 inline-flex items-center text-sm font-medium">
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.49984 10.8031L2.91984 6.21313L7.49984 1.62313L6.08984 0.213135L0.0898438 6.21313L6.08984 12.2131L7.49984 10.8031Z" fill="#666666"/>
                            </svg> 
                        </a>
                    </div>
                    <div class="flex font-lato">
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            1
                        </a>
                        <!-- Current: "border-brown text-brown", Default: "border-transparent text-black hover:text-brown hover:border-brown" -->
                        <a href="#" class="border-brown text-brown border-b mx-1 inline-flex items-center" aria-current="page">
                            2
                        </a>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            3
                        </a>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            4
                        </a>
                        <span class="border-transparent text-black border-b mx-1 inline-flex items-center">
                            ...
                        </span>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            17
                        </a>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            18
                        </a>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            19
                        </a>
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b mx-1 inline-flex items-center">
                            20
                        </a>
                    </div>
                    <div class="w-0 flex-1 flex">
                        <a href="#" class="border-transparent text-black hover:text-brown hover:border-brown border-b ml-4 mt-1 inline-flex items-center text-sm font-medium">
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.0900002 10.8031L4.67 6.21313L0.0900002 1.62313L1.5 0.213135L7.5 6.21313L1.5 12.2131L0.0900002 10.8031Z" fill="#666666"/>
                            </svg>                            
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endsection

