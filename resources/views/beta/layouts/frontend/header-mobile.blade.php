<div x-data="{ sidebarOpen : false, cartOpen : false}" class="flex flex-col lg:hidden mx-5">
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