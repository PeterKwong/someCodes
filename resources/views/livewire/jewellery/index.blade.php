
<div id="totalHeigh" class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">

    <!-- Choose/Filter -->
    <div x-data="{ applyFilter : false }" :class="{'absolute -top-0 left-0 z-50 w-full h-full bg-black bg-opacity-30 pt-5 md:pt-0 px-4 md:px-0' : applyFilter,}" class="flex flex-col space-y-3 pt-7">
        <div x-show="applyFilter == false" class="flex items-center justify-between">
            <button @click="applyFilter = !applyFilter" class="flex items-center space-x-3 text-brown lg:hidden focus:outline-none">
                <svg class="fill-current" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.2176 1.67592H7.30206C6.97447 0.702955 6.05418 0 4.97216 0C3.89014 0 2.96985 0.702955 2.64226 1.67592H0.782336C0.350278 1.67592 0 2.0262 0 2.45825C0 2.89031 0.350278 3.24059 0.782336 3.24059H2.64231C2.9699 4.21355 3.89019 4.91651 4.97221 4.91651C6.05423 4.91651 6.97452 4.21355 7.30211 3.24059H19.2177C19.6497 3.24059 20 2.89031 20 2.45825C20 2.0262 19.6497 1.67592 19.2176 1.67592ZM4.97216 3.35184C4.47944 3.35184 4.07858 2.95097 4.07858 2.45825C4.07858 1.96554 4.47944 1.56467 4.97216 1.56467C5.46487 1.56467 5.86574 1.96554 5.86574 2.45825C5.86574 2.95097 5.46487 3.35184 4.97216 3.35184ZM19.2176 8.37964H17.3576C17.03 7.40667 16.1097 6.70372 15.0277 6.70372C13.9458 6.70372 13.0255 7.40667 12.6979 8.37964H0.782336C0.350278 8.37964 0 8.72992 0 9.16197C0 9.59403 0.350278 9.94431 0.782336 9.94431H12.6979C13.0255 10.9173 13.9458 11.6202 15.0278 11.6202C16.1097 11.6202 17.0301 10.9173 17.3577 9.94431H19.2177C19.6497 9.94431 20 9.59403 20 9.16197C20 8.72992 19.6497 8.37964 19.2176 8.37964ZM15.0278 10.0556C14.5351 10.0556 14.1342 9.65469 14.1342 9.16197C14.1342 8.66926 14.5351 8.26839 15.0278 8.26839C15.5205 8.26839 15.9214 8.66926 15.9214 9.16197C15.9214 9.65469 15.5205 10.0556 15.0278 10.0556ZM10.6539 15.0833H19.2176C19.6497 15.0833 20 15.4336 20 15.8657C20 16.2977 19.6497 16.648 19.2177 16.648H10.6539C10.3264 17.621 9.40607 18.3239 8.32405 18.3239C7.24203 18.3239 6.32174 17.621 5.99415 16.648H0.782336C0.350278 16.648 0 16.2977 0 15.8657C0 15.4336 0.350278 15.0833 0.782336 15.0833H5.99415C6.32174 14.1104 7.24203 13.4074 8.32405 13.4074C9.40607 13.4074 10.3264 14.1104 10.6539 15.0833ZM7.43047 15.8657C7.43047 16.3584 7.83134 16.7593 8.32405 16.7593C8.81676 16.7593 9.21763 16.3584 9.21763 15.8657C9.21763 15.3729 8.81676 14.9721 8.32405 14.9721C7.83134 14.9721 7.43047 15.373 7.43047 15.8657Z"/>
                </svg>
                <span class="font-bold">Filter</span>    
            </button>
        </div>
        <form action="#" :class="{'hidden lg:flex' : !applyFilter, 'flex lg:hidden absolute -top-40 left-0 z-50 bg-white pt-5 md:pt-0 pb-10 md:pb-0 px-4 md:px-0' : applyFilter,}" class="flex-col space-y-7 font-lato">
            <div class="flex md:hidden items-center space-x-5 justify-between">
                <button @click="applyFilter = false" class="flex-shrink-0 focus:outline-none">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.30435 0.333374L8.5194 1.51255L3.72365 6.1667H14.1738V7.83338H3.72365L8.5194 12.4876L7.30435 13.6667L0.43492 7.00006L7.30435 0.333374Z" fill="#666666"/>
                    </svg>                                            
                </button>
                <span class="font-surana text-center">
                    JEWELLERY FILTER`
                </span>
                <a class="text-brown underline" href="#">Clear</a>
            </div>
            <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-10 font-lato">
                <div class="flex flex-col space-y-2">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">Type</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                        </svg>
                    </label>
                    <fieldset class="flex flex-wrap items-center gap-1.5 md:gap-0 md:space-x-5">
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="style" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-1.png" alt="">
                                <p id="server-size-1-label" class="text-sm md:text-base">Rings</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="style" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-2.png" alt="">
                                <p id="server-size-2-label" class="text-sm md:text-base">Necklaces</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="style" value="3" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0">
                                <img class="w-7 md:w-auto h-5 md:h-auto" src="/assets/images/j-3.png" alt="">
                                <p id="server-size-3-label" class="text-sm md:text-base">Bracelets</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="style" value="4" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2">
                                <img class="w-7 md:w-auto h-5 md:h-11" src="/assets/images/j-4.png" alt="">
                                <p id="server-size-4-label" class="text-sm md:text-base">Earrings</p>
                            </div>
                        </label>
                        <label class="wedding-ring-wrapper h-11 md:h-auto w-auto relative block rounded-none md:rounded border bg-white p-3 cursor-pointer hover:border-brown sm:flex sm:justify-between hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="style" value="4" class="sr-only">
                            <div class="flex flex-row md:flex-col items-center space-x-0.5 md:space-x-0 md:space-y-2">
                                <img class="w-7 md:w-auto h-5 md:h-11" src="/assets/images/j-5.png" alt="">
                                <p id="server-size-4-label" class="text-sm md:text-base">Pendants</p>
                            </div>
                        </label>
                    </fieldset>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-1">
                            <span class="font-bold">Metal</span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"/>
                            </svg>
                        </label>
                        <div class="flex flex-col space-y-3">
                            <div class="flex flex-wrap items-center gap-3 md:gap-0 md:space-x-5">
                                <div>
                                    <label class="inline-flex space-x-2 items-center">
                                        <input type="checkbox" class="h-4 w-4 form-checkbox">
                                        <img src="/assets/images/ellipse-silver.png" alt="">
                                        <span>18K White</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center">
                                        <input type="checkbox" class="h-4 w-4 form-checkbox">
                                        <img src="/assets/images/ellipse-rose-gold.png" alt="">
                                        <span>18K Rose Gold</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center">
                                        <input type="checkbox" class="h-4 w-4 form-checkbox">
                                        <img src="/assets/images/ellipse-yellow.png" alt="">
                                        <span>18K Yellow</span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center gap-3 md:gap-0 md:space-x-8">
                                <div>
                                    <label class="inline-flex space-x-2 items-center">
                                        <input type="checkbox" class="h-4 w-4 form-checkbox">
                                        <img src="/assets/images/ellipse-silver.png" alt="">
                                        <span>Platinum</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex space-x-2 items-center">
                                        <input type="checkbox" class="h-4 w-4 form-checkbox">
                                        <span>Mixed</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 md:space-x-10 font-lato">
                <div class="flex flex-col space-y-2">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">Gemstone</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </label>
                    <fieldset class="flex flex-wrap gap-1.5 md:gap-0 md:space-x-5">
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="gemstone" value="1" class="sr-only">
                                <p id="server-size-1-label">Diamond</p>
                        </label>
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="gemstone" value="1" class="sr-only">
                                <p id="server-size-1-label">Pearl</p>
                        </label>
                        <label class="relative block border bg-white px-4 md:px-0 md:w-40 py-3 cursor-pointer hover:border-brown sm:flex sm:justify-center sm:items-center hover:bg-brown-light focus-within:bg-brown-light focus-within:border-brown">
                            <input type="checkbox" name="gemstone" value="1" class="sr-only">
                                <p id="server-size-1-label">Fancy Diamond</p>
                        </label>
                    </fieldset>
                </div>
                <div x-data="{toggle: false}" class="flex flex-row justify-between md:flex-col md:space-y-5">
                    <label class="flex items-center space-x-1">
                        <span class="font-bold">Setting</span>
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                        </svg>
                    </label>
                    <button @click="toggle = !toggle" type="button" :class="{'bg-grey-05': !toggle,'bg-brown': toggle}" class="relative inline-flex flex-shrink-0 h-7 w-12 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown" role="switch" aria-checked="false">
                        <span class="sr-only">Use setting</span>
                        <span aria-hidden="true" :class="{'translate-x-0': !toggle,'translate-x-5': toggle}"  class="pointer-events-none inline-block mt-0.5 ml-0.5 h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                    </button>
                </div>
            </div>
            <button class="flex md:hidden items-center justify-center w-full py-2 bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500">
                <span class="text-white hover:text-brown font-bold font-lato tracking-widest uppercase">Apply</span>
            </button>
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
                    <span>Rings</span>
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
                    <span>Necklaces</span>
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
                    <span>18K White</span>
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
                    <span>18K Rose Gold</span>
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
                    <span>Daimond</span>
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
                    <span>Setting</span>
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
                    <option>Default</option>
                    <option>Price</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Products -->
    <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 w-full xl:grid-cols-4 gap-3 md:gap-7 md:items-center py-5 2xl:py-10 2xl:pb-10">
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="./jewellery-details.html"><img class="mt-5 md:mt-0" src="/assets/images/j-p-0.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$2,900</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K Rose Gold Ring</a>
                    <p class="text-xs md:text-sm font-lato">Diamond</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">12</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-1.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$4,800</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Ring</a>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">16</span>
            </div>
            <!-- if no catergory, add this p down here  -->
            <p class="opacity-0 text-xs md:text-sm font-lato">Diamond</p>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-2.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,800</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K Yellow Earring</a>
                    <p class="text-xs md:text-sm font-lato">Pearl</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">8</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-3.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,200</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Earring</a>
                    <p class="text-xs md:text-sm font-lato">Pearl</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">32</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-4.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,600</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Earring Setting</a>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">46</span>
            </div>
            <!-- if no catergory, add this p down here  -->
            <p class="opacity-0 text-xs md:text-sm font-lato">Diamond</p>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-5.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$2,100</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Pendants</a>
                    <p class="text-xs md:text-sm font-lato">Pearl</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">3</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-6.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,800</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K Yellow Necklace</a>
                    <p class="text-xs md:text-sm font-lato">Pearl</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">24</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-7.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$3,000</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Ring</a>
                    <p class="text-xs md:text-sm font-lato">Diamond</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">68</span>
            </div>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-8.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,300</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Pendant Setting</a>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">31</span>
            </div>
            <!-- if no catergory, add this p down here  -->
            <p class="opacity-0 text-xs md:text-sm font-lato">Diamond</p>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-9.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$1,800</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Pendant Setting</a>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">83</span>
            </div>
            <!-- if no catergory, add this p down here  -->
            <p class="opacity-0 text-xs md:text-sm font-lato">Diamond</p>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-10.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$900</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K White Pendant Setting</a>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">28</span>
            </div>
            <!-- if no catergory, add this p down here  -->
            <p class="opacity-0 text-xs md:text-sm font-lato">Diamond</p>
        </div>
        <div class="flex flex-col relative product-card rounded-none font-lato p-0 md:p-2 2xl:p-5 cursor-pointer transform hover:-translate-y-2 transition hover:border border-gold-light duration-500">
            <a class="flex justify-center" href="#"><img class="mt-5 md:mt-0" src="/assets/images/j-p-11.png" alt="p1"></a>
            <div class="flex flex-col items-center space-y-2 md:space-y-3">
                <p class="flex items-center space-x-1 font-suranna text-gold-light">
                    <span class="text-base">HKD</span>
                    <span class="text-xl md:text-3xl">$2,300</span>
                </p>
                <h1 class="text-center text-lg md:text-xl font-suranna">
                    <a href="#">18K Rose Gold Bracelet</a>
                    <p class="text-xs md:text-sm font-lato">Diamond</p>
                </h1>
            </div>
            <div class="flex items-center justify-center space-x-1 mt-1 mb-4">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.63604 0.5L11.0727 5.43763L16.5218 6.22964L12.5788 10.0728L13.5096 15.5L8.63604 12.9378L3.76224 15.5L4.69302 10.0728L0.75 6.22964L6.19914 5.43763L8.63604 0.5Z" fill="#EFCE4A"/>
                </svg>
                <span class="text-xs md:text-sm font-lato">53</span>
            </div>
        </div>
        <!-- More Products .... -->
  </div>
</div>

<div id="totalHeigh">
    <div class="hidden sm:block p-4">
	    <div class="grid grid-cols-12">
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Type')}}</div>
	            @foreach($search_conditions['type'] as  $key => $type)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['type'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
	                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach      
	        </div>
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Gemstone')}}</div>
	            @foreach($search_conditions['gemstone'] as  $key => $gemstone)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['gemstone'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach             
	        </div>
	    </div>
	    
	    <br>

	    <div class="grid grid-cols-12">
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Metal')}}</div>
	            @foreach($search_conditions['metal'] as  $key => $metal)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['metal'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach   
	            </button>
	        </div>
	        <div class="col-span-6">
	            <div>{{trans('jewellery.Setting')}}</div>
	            @foreach($search_conditions['setting'] as  $key => $setting)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['setting'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach 
	            
	        </div>
	    </div>

	</div>


	<div class="block sm:hidden" >
		<span x-data="mobileSearch()">
	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('type')">
	            <a class="px-2">{{trans('jewellery.Type')}}</a>
	            <a  x-on:click="selectDisplayColumn('type')">
	              @foreach($search_conditions['type'] as  $key => $type)
		             @if($type['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
		                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>
	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'type' ">
	            @foreach($search_conditions['type'] as  $key => $type)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['type'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('type', '{{$key}}' )">
	                    <img src="/images/front-end/jewellery/{{ucfirst($key)}}.png" class="w-8">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('gemstone')">
	            <a class="px-2">{{trans('jewellery.Gemstone')}}</a>
	            <a  x-on:click="selectDisplayColumn('gemstone')">
	              @foreach($search_conditions['gemstone'] as  $key => $gemstone)
		             @if($gemstone['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>
	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'gemstone' ">
	            @foreach($search_conditions['gemstone'] as  $key => $gemstone)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['gemstone'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('gemstone', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('metal')">
	            <a class="px-2">{{trans('jewellery.Metal')}}</a>
	            <a  x-on:click="selectDisplayColumn('metal')">
	              @foreach($search_conditions['metal'] as  $key => $metal)
		             @if($metal['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>

	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'metal' ">
	            @foreach($search_conditions['metal'] as  $key => $metal)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['metal'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('metal', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

	        <div class="flex box p-2 mx-1 text-center justify-center items-center" x-on:click="selectDisplayColumn('setting')">
	            <a class="px-2">{{trans('jewellery.Setting')}}</a>
	            <a  x-on:click="selectDisplayColumn('setting')">
	              @foreach($search_conditions['setting'] as  $key => $setting)
		             @if($setting['clicked'])
		              <button class="btn btn-outline inline-flex items-center"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
		                    {{__('jewellery.' . $key)}}
		              </button>
		              @endif
	              @endforeach
	            </a>

	            <i class="fas fa-chevron-down"></i>
	        </div>

	        <div class="flex justify-center"  x-show="displayColumn == 'setting' ">
	            @foreach($search_conditions['setting'] as  $key => $setting)
	              <button class="btn btn-outline inline-flex items-center {{$search_conditions['setting'][$key]['clicked']? 'btn-active':'' }}"  type="button" wire:click="toggleValue('setting', '{{$key}}' )">
	                    {{__('jewellery.' . $key)}}
	              </button>
	            @endforeach	 
	        </div>

		</span>    
	   
	</div>


	<div class="grid grid-cols-12">
		@foreach($model['data'] as $data)
			@if( count($data['images']) )
		    <div class="sm:col-span-3 col-span-6 hover:opacity-75 sm:p-8">
	            <a href="/{{app()->getLocale() . '/jewellery/' . $data['id'] }}" target="_blank">
	                <img src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $data['images'][0]['image']}}" width="100%">
	                    <center>

                        	<p  class="text-gray-600" >HK${{$data['unit_price']}}
                        		@if($data['invoices_count'] != 0)
	                        			(<i class="fas fa-star text-yellow-600"></i> 
	                        				<span class="text-yellow-700">
	                        				{{$data['invoices_count']}}
	                        			</span>)
	                        		@endif
                            </p>
	                            <p class="text-blue-600 text-sm p-1">
	                            	{{ $data['title'] }} 
	                            </p>	                			
	                        
	                    </center>
	            </a>
		    	</div>
		    @endif
	    @endforeach
	</div>
	                

	<div class="grid grid-cols-12 ">
	    <div class="col-span-12 flex justify-center {{ isset($model['total']) && $model['total'] == 0 ? ' hidden' : ''}}">
	           <button class="btn btn-primary" wire:click="addPage()">{{trans('engagementRing.More')}}</button>
	    </div>
	    <div class="col-span-12 flex justify-center {{ isset($model['total']) && $model['total'] == 0 ? '' : ' hidden'}}">
	    	 <button class="btn btn-primary" wire:click="resetAll">
		          {{ __('diamondSearch.No Result')}} ！ {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
		      </button>
	    </div>
	</div>

	<div id="loading" wire:loading.class="loading">
	</div>



<script >
  function mobileSearch(){
    return {
       displayColumn:'', 
       selectDisplayColumn(column){
          if (this.displayColumn != column) {
            this.displayColumn = column
            console.log(this.displayColumn)
          }else{
            this.displayColumn = ''  
          }
      },
    }
  }
</script>

@include('layouts.js.infinityAddPage')



</div>
