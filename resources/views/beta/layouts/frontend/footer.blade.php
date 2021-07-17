@include('beta.layouts.frontend.footer-upper')

@include('beta.layouts.frontend.footer-scripts')

<footer class="bg-grey-dark" aria-labelledby="footerHeading">
    <div class="max-w-screen-2xl 2xl:mx-auto md:mx-10 xl:mx-20 pt-12 lg:pt-16 pb-5 lg:pb-7 px-4 lg:px-8 font-lato">
        <div class="grid lg:grid-cols-4 lg:gap-x-12 lg:divide-x divide-white divide-opacity-20">
            <div class="flex flex-col w-full space-y-10">
                <div class="flex space-x-3 lg:space-x-7">
                    <a class="inline-block w-48" href="/">
                        <img src="/assets/images/Logo-white-mobile.png" alt="">
                    </a>
                    <div class="flex flex-col space-y-3 mt-1 lg:mt-0">
                        <p class="text-sm text-white">
                           {{trans('footer.TING DIAMOND PROVIDES BRILLIANT GIA')}}
                        <span class="hidden md:flex bg-golden-white"></span>
                        <ul class="flex items0-center space-x-5">
                            <li>
                                <a href="/links/facebook">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 10C19 5.02943 14.9706 1 10 1C5.02943 1 1 5.02943 1 10C1 14.4921 4.29115 18.2155 8.59375 18.8907V12.6016H6.30859V10H8.59375V8.01719C8.59375 5.76156 9.93742 4.51562 11.9932 4.51562C12.9779 4.51562 14.0078 4.69141 14.0078 4.69141V6.90625H12.873C11.755 6.90625 11.4062 7.60006 11.4062 8.3118V10H13.9023L13.5033 12.6016H11.4062V18.8907C15.7088 18.2155 19 14.4921 19 10Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="/links/instagram">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6377 0H5.3623C2.40551 0 0 2.40551 0 5.3623V12.6377C0 15.5945 2.40551 18 5.3623 18H12.6377C15.5945 18 18 15.5945 18 12.6377V5.3623C18 2.40551 15.5945 0 12.6377 0ZM16.1892 12.6377C16.1892 14.5991 14.5991 16.1892 12.6377 16.1892H5.3623C3.40088 16.1892 1.8108 14.5991 1.8108 12.6377V5.3623C1.8108 3.40084 3.40088 1.8108 5.3623 1.8108H12.6377C14.5991 1.8108 16.1892 3.40084 16.1892 5.3623V12.6377ZM8.99998 4.34454C6.43297 4.34454 4.34454 6.43297 4.34454 8.99995C4.34454 11.5669 6.43297 13.6554 8.99998 13.6554C11.567 13.6554 13.6554 11.567 13.6554 8.99995C13.6554 6.43294 11.567 4.34454 8.99998 4.34454ZM8.99998 11.8446C7.42892 11.8446 6.15534 10.571 6.15534 8.99998C6.15534 7.42892 7.42895 6.15534 8.99998 6.15534C10.571 6.15534 11.8446 7.42892 11.8446 8.99998C11.8446 10.571 10.571 11.8446 8.99998 11.8446ZM14.78 4.37947C14.78 4.99556 14.2805 5.49501 13.6645 5.49501C13.0484 5.49501 12.5489 4.99556 12.5489 4.37947C12.5489 3.76337 13.0484 3.26393 13.6645 3.26393C14.2805 3.26393 14.78 3.76337 14.78 4.37947Z" fill="white"/>
                                    </svg>                                        
                                </a>
                            </li>
                            <li>
                                <a href="/links/twitter">
                                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 1.73137C17.3306 2.025 16.6174 2.21962 15.8737 2.31412C16.6388 1.85737 17.2226 1.13962 17.4971 0.2745C16.7839 0.69975 15.9964 1.00013 15.1571 1.16775C14.4799 0.446625 13.5146 0 12.4616 0C10.4186 0 8.77387 1.65825 8.77387 3.69113C8.77387 3.98363 8.79862 4.26487 8.85938 4.53262C5.7915 4.383 3.07687 2.91263 1.25325 0.67275C0.934875 1.22513 0.748125 1.85738 0.748125 2.538C0.748125 3.816 1.40625 4.94887 2.38725 5.60475C1.79437 5.5935 1.21275 5.42138 0.72 5.15025C0.72 5.1615 0.72 5.17613 0.72 5.19075C0.72 6.984 1.99912 8.4735 3.6765 8.81662C3.37612 8.89875 3.04875 8.93812 2.709 8.93812C2.47275 8.93812 2.23425 8.92463 2.01038 8.87512C2.4885 10.3365 3.84525 11.4109 5.4585 11.4457C4.203 12.4279 2.60888 13.0196 0.883125 13.0196C0.5805 13.0196 0.29025 13.0061 0 12.969C1.63462 14.0231 3.57188 14.625 5.661 14.625C12.4515 14.625 16.164 9 16.164 4.12425C16.164 3.96112 16.1584 3.80363 16.1505 3.64725C16.8829 3.1275 17.4982 2.47837 18 1.73137Z" fill="white"/>
                                    </svg>                                        
                                </a>
                            </li>
                            <li>
                                <a href="/links/youtube">
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
                <div x-data="{dd1 : false}" class="flex flex-col pt-3 lg:pt-0" @click="dd1 = !dd1">
                    <p class="flex items-center justify-between text-sm font-medium text-white">
                        <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                            <span>{{trans('footer.DIAMOND PRICES')}}</span>
                            <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                        </span>
                        <button class="lg:hidden focus:outline-none">
                            <svg :class="{'transform' : dd1}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                            </svg>
                        </button>
                    </p>
                    <ul :class="{'hidden lg:flex' : !dd1, 'flex lg:hidden' : dd1}" class="flex-col mt-4 space-y-3 font-libre">
                        <li>
                            <a  href="{{ $baseUrl }}/gia-loose-diamonds/round-cut" class="text-sm text-white">
                                {{trans('footer.Round Cut Diamond')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-cut-diamond" class="text-sm text-white">
                                {{trans('footer.Fancy Cut Diamond')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/gia-loose-diamonds/fancy-color" class="text-sm text-white">
                                {{trans('footer.Fancy Color Diamond')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div x-data="{dd2 : false}" class="flex flex-col pt-3 lg:pt-0" @click="dd2 = !dd2">
                    <p class="flex items-center justify-between text-sm font-medium text-white">
                        <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                            <span>{{trans('footer.DIAMOND JEWELLRY')}}</span>
                            <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                        </span>
                        <button class="lg:hidden focus:outline-none">
                            <svg :class="{'transform' : dd2}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                            </svg>
                        </button>
                    </p>
                    <ul :class="{'hidden lg:flex' : !dd2, 'flex lg:hidden' : dd2}" class="flex-col mt-4 space-y-3 font-libre">
                        <li>
                            <a href="{{ $baseUrl }}/engagement-rings" class="text-sm text-white">
                                {{trans('footer.Setting')}}
                            </a>
                            <span class="text-white text-sm"> | </span>
                            <a href="{{ $baseUrl }}/engagement-rings/solitaire-ring-setting" class="text-sm text-white">
                                {{trans('footer.Solitaire Ring')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/engagement-rings" class="text-sm text-white">
                                {{trans('footer.Setting')}}
                            </a>
                            <span class="text-white text-sm"> | </span>
                            <a href="{{ $baseUrl }}/engagement-rings/side-stones-setting" class="text-sm text-white">
                                {{trans('footer.Side Stone Ring')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/engagement-rings" class="text-sm text-white">
                                {{trans('footer.Setting')}}
                            </a>
                            <span class="text-white text-sm"> | </span>
                            <a href="{{ $baseUrl }}/engagement-rings/halo-setting" class="text-sm text-white">
                                {{trans('footer.Halo Ring')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/wedding-rings" class="text-sm text-white">
                                {{trans('footer.Wedding Rings')}}
                            </a>
                            <span class="text-white text-sm"> | </span>
                            <a href="{{ $baseUrl }}/wedding-rings/japanese" class="text-sm text-white">
                                {{trans('footer.Japanese')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/wedding-rings" class="text-sm text-white">
                                {{trans('footer.Wedding Rings')}}
                            </a>
                            <span class="text-white text-sm"> | </span>
                            <a href="{{ $baseUrl }}/wedding-rings/forge" class="text-sm text-white">
                                {{trans('footer.Forge')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div x-data="{dd3 : false}" class="flex flex-col pt-3 lg:pt-0" @click="dd3 = !dd3">
                    <p class="flex items-center justify-between text-sm font-medium text-white">
                        <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                            <span>{{trans('footer.DIAMOND EDUCATION')}}</span>
                            <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                        </span>
                        <button class="lg:hidden focus:outline-none">
                            <svg :class="{'transform' : dd3}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                            </svg>
                        </button>
                    </p>
                    <ul :class="{'hidden lg:flex' : !dd3, 'flex lg:hidden' : dd3}" class="flex-col mt-4 space-y-3 font-libre">
                        <li>
                            <a href="{{ $baseUrl }}/education-diamond-grading" class="text-sm text-white">
                                {{trans('footer.How To Choose Diamond 4Cs')}}？
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/fluorescence" class="text-sm text-white">
                                {{trans('footer.What Is Diamond Fluorescence')}} ?
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/symmetry" class="text-sm text-white">
                                {{trans('footer.What Is Diamond Symmetry')}} ?
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/education-diamond-grading/anatomy/proportion" class="text-sm text-white">
                                {{trans('footer.What Is Diamond Proportion')}} ?
                            </a>
                        </li>
                        <li>
                            <a href="{{ $baseUrl }}/education-diamond-grading" class="text-sm text-white">
                                {{trans('footer.Fancy Color Intensity')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div x-data="{dd4 : false}" class="flex flex-col pt-3 lg:pt-0" @click="dd4 = !dd4">
                    <p class="flex items-center justify-between text-sm font-medium text-white">
                        <span class="md:w-full text-sm md:text-base font-bold text-gold-light">
                            <span>{{trans('footer.ABOUT TING DIAMOND')}}</span>
                            <span class="md:mt-2 hidden md:flex bg-golden-white"></span>
                        </span>
                        <button class="lg:hidden focus:outline-none">
                            <svg :class="{'transform' : dd4}" class="rotate-180" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.41 0.589966L6 5.16997L10.59 0.589966L12 1.99997L6 7.99997L0 1.99997L1.41 0.589966Z" fill="white"/>
                            </svg>
                        </button>
                    </p>
                    <ul :class="{'hidden lg:flex' : !dd4, 'flex lg:hidden' : dd4}" class="flex-col mt-4 space-y-3 font-libre">
                        <li>
                            <a  href="{{ $baseUrl }}/about-us" class="text-sm text-white">
                                {{trans('footer.About Us')}}
                            </a>
                        </li>
                        <li>
                            <a  href="{{ $baseUrl }}/buying-procedure/custom-engagement-rings" class="text-sm text-white">
                                {{trans('footer.Custom Make Engagement Rings')}}
                            </a>
                        </li>
                        <li>
                            <a  href="{{ $baseUrl }}/buying-procedure/diamond-inlay-engrave" class="text-sm text-white">
                                {{trans('footer.Diamond Inlay')}} | {{trans('footer.Engrave')}}
                            </a>
                        </li>
                        <li>
                            <a  href="{{ $baseUrl }}/customer-jewellery" class="text-sm text-white">
                                {{trans('footer.Customer Monents')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex items-end lg:items-center justify-between pt-10 lg:pt-7">
            <p class="hidden lg:inline-flex text-xs text-white">® 2016 Ting Diamond by Ting Diamond</p>
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
        <p class="lg:hidden text-xs text-white pt-4">® 2016 Ting Diamond by Ting Diamond</p>
        @if(app()->getLocale() == 'cn')
            <a class="text-gray-500" href="https://beian.miit.gov.cn/"><small>粤ICP备19125751号-1</small></a> 
        @endif
    </div>
</footer>


<!-- Action Popup Buttons  -->
<div class="fixed bottom-2 md:bottom-4 right-2 md:right-4 flex flex-col space-y-1 md:space-y-2">
    <a href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} " class="bg-brown rounded-full w-11 md:w-14 h-11 md:h-14 flex items-center justify-center text-white hover:bg-opacity-90 focus:outline-none">
        <svg width="25" height="25" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.4978 0C7.85153 0 0 6.39171 0 14.2482C0 18.2277 1.99975 21.9598 5.53181 24.6445C4.40945 26.3892 2.85465 28.3115 0.949882 28.7839C0.347457 28.9339 -0.0549932 29.5039 0.00749907 30.1213C0.0674916 30.7412 0.577428 31.2186 1.19735 31.2461C1.22735 31.2461 1.33733 31.2511 1.51481 31.2511C2.81215 31.2511 7.79903 31.0437 13.4558 28.109C14.7457 28.3665 16.103 28.4965 17.4978 28.4965C27.1441 28.4965 34.9957 22.1048 34.9957 14.2482C34.9957 6.39171 27.1441 0 17.4978 0ZM17.4978 25.9968C16.123 25.9968 14.7957 25.8543 13.5483 25.5718C13.2559 25.5043 12.9459 25.5468 12.6784 25.6918C10.2587 26.9967 7.94152 27.7466 6.03675 28.1765C6.91914 27.1466 7.65655 25.9968 8.28397 24.9344C8.62393 24.3595 8.44895 23.6196 7.89152 23.2546C4.46445 21.0099 2.49969 17.7278 2.49969 14.2482C2.49969 7.76904 9.22636 2.49969 17.4978 2.49969C25.7693 2.49969 32.496 7.76904 32.496 14.2482C32.496 20.7249 25.7693 25.9968 17.4978 25.9968Z" fill="white"/>
            <path d="M39.0529 37.5103C37.623 37.1478 36.2407 35.9955 34.9384 34.0782C38.168 31.5785 39.9953 28.1364 39.9953 24.4719C39.9953 22.7346 39.5803 21.0223 38.7629 19.3875C38.4529 18.7676 37.6955 18.5251 37.0856 18.8301C36.4682 19.14 36.2182 19.89 36.5257 20.5074C37.1681 21.7922 37.4956 23.1246 37.4956 24.4719C37.4956 27.6415 35.6958 30.6411 32.5587 32.7009C31.9987 33.0658 31.8288 33.8082 32.1712 34.3832C32.7886 35.4255 33.4261 36.3229 34.091 37.0778C32.3937 36.7254 30.3614 36.0879 28.2392 34.9456C27.9767 34.8031 27.6668 34.7631 27.3768 34.8256C22.3524 35.9305 16.9406 34.6231 13.551 31.6335C13.0286 31.1736 12.2412 31.2261 11.7862 31.7435C11.3288 32.2609 11.3788 33.0508 11.8962 33.5083C15.7732 36.9228 21.79 38.4627 27.4618 37.3603C32.0112 39.7 36.0982 40 37.9005 40C38.4729 40 38.8129 39.97 38.8679 39.965C39.4728 39.9075 39.9503 39.4225 39.9953 38.8176C40.0402 38.2102 39.6428 37.6603 39.0529 37.5103Z" fill="white"/>
        </svg>
    </a href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} ">
    <a href="#" class="bg-white rounded-full w-11 md:w-14 h-11 md:h-14 flex items-center justify-center border border-brown hover:bg-brown-light focus:outline-none">
        <svg class="fill-current text-brown" width="20" height="19" viewBox="0 0 30 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.475 18.525L15 7.07496L3.525 18.525L0 15L15 -3.43323e-05L30 15L26.475 18.525Z"/>
        </svg>
    </a>
</div>