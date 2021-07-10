<script type="text/javascript">
    (function(){

      var doc = document.documentElement;
      var w = window;

      var prevScroll = w.scrollY || doc.scrollTop;
      var curScroll;
      var direction = 0;
      var prevDirection = 0;

      var header = document.getElementById('td-header');
      var logo = document.getElementById('td-logo');
      var navUpper = document.getElementById('td-nav-upper');

      var checkScroll = function() {
      // console.log(window.pageYOffset)
        if ( window.pageYOffset > 100) { 
          
          //replace 52 with the height of your header in px

          header.classList.add('shorter');
          logo.classList.add('scale-75');
          navUpper.classList.add('hidden');
        }else{
          header.classList.remove('shorter');
          logo.classList.remove('scale-75');
          navUpper.classList.remove('hidden');

        }

        /*
        ** Find the direction of scroll
        ** 0 - initial, 1 - up, 2 - down
        */

        curScroll = w.scrollY || doc.scrollTop;
        if (curScroll > prevScroll) { 
          //scrolled up
          direction = 2;
        }
        else if (curScroll < prevScroll) { 
          //scrolled down
          direction = 1;
        }

        if (direction !== prevDirection) {
          toggleHeader(direction, curScroll);
        }
        
        prevScroll = curScroll;
      };

      var toggleHeader = function(direction, curScroll) {

        if (direction === 2 && curScroll > 190) { 
          
          //replace 52 with the height of your header in px

          header.classList.add('hide');
          prevDirection = direction;
        }
        else if (direction === 1) {
          header.classList.remove('hide');
          prevDirection = direction;
        }
      // console.log(curScroll)

      };
      window.addEventListener('scroll', checkScroll);

    })();
</script>

<footer class="bg-grey-dark" aria-labelledby="footerHeading">
    <div class="max-w-screen-2xl 2xl:mx-auto md:mx-10 xl:mx-20 pt-12 lg:pt-16 pb-5 lg:pb-7 px-4 lg:px-8 font-lato">
        <div class="grid lg:grid-cols-4 lg:gap-x-12 lg:divide-x divide-white divide-opacity-20">
            <div class="flex flex-col w-full space-y-10">
                <div class="flex space-x-3 lg:space-x-7">
                    <a class="inline-block w-48" href="#">
                        <img src="/assets/images/Logo-white-mobile.png" alt="">
                    </a>
                    <div class="flex flex-col space-y-3 mt-1 lg:mt-0">
                        <p class="text-sm text-white">
                            Ting Diamond provides brilliant GIA, wholesale prices, for the best price.
                        </p>
                        <span class="hidden md:flex bg-golden-white"></span>
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
