<div id="diamondRingReview" class="md:col-span-3 flex flex-col space-y-3">
    <div class="flex flex-col space-y-3"  @click="setCarouselSource('engagementRings')">
        <p class="text-base font-bold"> {{__('engagementRing.Engagement Ring')}} ({{__('engagementRing.setting')}})</p>
        <div class="grid grid-cols-8 md:grid-cols-5 space-x-3">
            <div class="col-span-2 md:col-span-1">
                <img class="border" :class="{' border-gold-light' : selectingCarousel == 'engagementRings'}" 
                    src="{{config('global.cache.' . config('global.cache.live') ) . 'public/' .'images/'. $engagementRing->images->first()->image}}" alt="">
            </div>
            <div class="col-span-6 md:col-span-4 flex flex-col space-y-3">
                <p class="flex items-center space-x-0.5 md:space-x-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 24C5.39255 24 0 18.6071 0 12C0 5.39255 5.39292 0 12 0C18.6075 0 24 5.39292 24 12C24 18.6075 18.6071 24 12 24ZM12 1.40625C6.15858 1.40625 1.40625 6.15858 1.40625 12C1.40625 17.8414 6.15858 22.5938 12 22.5938C17.8414 22.5938 22.5938 17.8414 22.5938 12C22.5938 6.15858 17.8414 1.40625 12 1.40625Z" fill="#666666" />
                        <path d="M12 21.1875C6.95377 21.1875 2.8125 17.0453 2.8125 12C2.8125 6.95377 6.95475 2.8125 12 2.8125C17.0462 2.8125 21.1875 6.9547 21.1875 12C21.1875 17.0462 17.0452 21.1875 12 21.1875ZM12 4.21875C7.70939 4.21875 4.21875 7.70939 4.21875 12C4.21875 16.2906 7.70939 19.7812 12 19.7812C16.2906 19.7812 19.7812 16.2906 19.7812 12C19.7812 7.70939 16.2906 4.21875 12 4.21875Z" fill="#666666" />
                    </svg>
                    <span class="text-base md:text-lg font-bold" :class="{' text-brown' : selectingCarousel == 'engagementRings'}">{{__('engagementRing.'.$engagementRing->metal)}} {{__('engagementRing.Diamond Ring')}}</span>
                        <a class="cursor-pointer" :href="pairItemEngagementRing.url">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5127 4.49098L19.4926 5.47094C19.8198 5.79811 20 6.23339 20 6.69634C20 7.15929 19.8198 7.59458 19.4926 7.92161L18.2922 9.12201L14.8616 5.69138L16.062 4.49098C16.7162 3.83666 17.8577 3.83602 18.5127 4.49098ZM5.07744 15.4754L13.8809 6.67134L17.3116 10.1021L8.50743 18.9055C8.46314 18.9498 8.40769 18.9817 8.34665 18.9969L4.43009 19.9728C4.40243 19.9798 4.374 19.9832 4.34621 19.9832C4.25547 19.9832 4.16676 19.9472 4.10166 19.882C4.01562 19.796 3.98098 19.6706 4.01016 19.5527L4.98594 15.6362C5.00117 15.5759 5.03315 15.5198 5.07744 15.4754Z" fill="#9A7474" />
                            </svg>
                        </a>
                </p>
                <p class="flex flex-wrap max-w-md items-center text-black font-medium">
                   <span>{{__('engagementRing.Style')}}: {{__('engagementRing.'.$engagementRing->style)}} </span>
                    <span>{{__('engagementRing.Shoulder')}}: {{__('engagementRing.'.$engagementRing->shoulder)}} </span>
                    <span>{{__('engagementRing.Prong')}}: {{__('engagementRing.'.$engagementRing->prong)}} </span>
                </p>
                <div class="flex flex-col space-y-3 font-lato">
                    <div class="flex items-center space-x-2">
                        <label for="ring_size">
                            <span class="font-medium">{{__('shoppingCart.Ring Size')}}:</span>
                        </label>
                        <select id="ring_size" name="ring_size" class="block w-44 md:w-36 pb-1 text-black text-opacity-50 bg-white border-b border-opacity-20 focus:outline-none" v-model="pairItemEngagementRing.ringSize">
                            <option>{{__('shoppingCart.Please Select')}}</option>
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
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="engrave">
                            <span class="font-medium">{{__('shoppingCart.Engrave')}}:</span>
                        </label>
                        <input type="text" id="engrave" name="engrave" placeholder="{{__('shoppingCart.Please type your engrave')}}" class="block w-full md:w-56 pb-1 text-black text-opacity-50 border-b border-opacity-20 focus:outline-none" v-model="pairItemEngagementRing.engrave">
                    </div>
                </div>
                <p class="text-lg font-bold text-gold-light">HKD${{$engagementRing->unit_price}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-3 border-t pt-3" @click="setCarouselSource('diamonds')">
        <p class="text-base font-bold">{{__('diamondSearch.Diamond')}}</p>
        <div class="grid grid-cols-8 md:grid-cols-5 space-x-3">
            <div class="col-span-2 md:col-span-1" >
                @if($diamond->image_cache)
                    <img  class="border" :class="{' border-gold-light' : selectingCarousel == 'diamonds'}" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/diamond/' .'images/thm-' . $diamond->id . '.jpg'  }}" alt="">
                @else
                    <img src="/assets/images/diamond-dummy.png" alt="">
                @endif
            </div>
            <div class="col-span-6 md:col-span-4 flex flex-col space-y-3">
                <p class="flex items-center space-x-0.5 md:space-x-3">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.3681 4.2002C21.6044 4.2002 8.47504 4.2002 7.63321 4.2002L3 10.5182L15.0498 26.3996L27 10.5164L22.3681 4.2002ZM9.58739 11.2123L12.9823 21.3546L5.28697 11.2123H9.58739ZM11.0663 11.2123H18.9391L15.0298 23.0532L11.0663 11.2123ZM20.4161 11.2123H24.7214L17.0495 21.4091L20.4161 11.2123ZM21.6573 5.60261L24.7427 9.80987H20.417L19.0365 5.60261H21.6573ZM17.5605 5.60261L18.941 9.80987H11.0603L12.4408 5.60261H17.5605ZM8.34387 5.60261H10.9647L9.58421 9.80987H5.25855L8.34387 5.60261Z" fill="#666666" />
                    </svg>
                    <span class="text-base md:text-lg font-bold" :class="{' text-brown' : selectingCarousel == 'diamonds'}"> {{$diamond->weight}} {{__('diamondSearch.Carat')}} {{__('diamondSearch.'.$diamond->shape)}} {{__('diamondSearch.Diamond')}}</span>
                    <a class="cursor-pointer" :href="pairItemDiamond.url">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5127 4.49098L19.4926 5.47094C19.8198 5.79811 20 6.23339 20 6.69634C20 7.15929 19.8198 7.59458 19.4926 7.92161L18.2922 9.12201L14.8616 5.69138L16.062 4.49098C16.7162 3.83666 17.8577 3.83602 18.5127 4.49098ZM5.07744 15.4754L13.8809 6.67134L17.3116 10.1021L8.50743 18.9055C8.46314 18.9498 8.40769 18.9817 8.34665 18.9969L4.43009 19.9728C4.40243 19.9798 4.374 19.9832 4.34621 19.9832C4.25547 19.9832 4.16676 19.9472 4.10166 19.882C4.01562 19.796 3.98098 19.6706 4.01016 19.5527L4.98594 15.6362C5.00117 15.5759 5.03315 15.5198 5.07744 15.4754Z" fill="#9A7474" />
                        </svg>
                    </a>
                </p>
                <p class="flex flex-wrap max-w-md items-center text-black font-medium">
                    <span>{{__('diamondSearch.Carat')}}: {{$diamond->weight}}｜</span>
                    <span>{{__('diamondSearch.Color')}}: {{$diamond->color}}｜</span>
                    <span>{{__('diamondSearch.Clarity')}}: {{$diamond->clarity}}｜</span>
                    <span>{{__('diamondSearch.Cut')}}: {{$diamond->cut}}｜</span>
                    <span>{{__('diamondSearch.Polish')}}: {{$diamond->polish}}｜</span>
                    <span>{{__('diamondSearch.Symmetry')}}: {{$diamond->symmetry}}｜</span>
                    <span>{{__('diamondSearch.Fluorescence')}}: {{__('diamondSearch.'.$diamond->fluorescence)}}</span>
                </p>
                <p class="text-lg font-bold text-gold-light">HKD${{$diamond->price}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-3 border-t pt-3">
        <p class="text-base font-bold">{{__('shoppingCart.Mounting Fee')}}</p>
        <div class="grid grid-cols-8 md:grid-cols-5 space-x-3 items-center">
            <div class="col-span-2 md:col-span-1">
                    <img class="w-12"  src="/images/front-end/shoppingCart/mountingFee.png" alt="">
            </div>
            <div class="col-span-6 md:col-span-4 flex flex-col space-y-3">
                <p class="text-lg font-bold text-gold-light items-center">HKD$ @{{pairItemMounting.unit_price}}</p>
            </div>
        </div>
    </div>
    <p class="flex items-center space-x-5">
        <span class="text-lg font-bold">{{__('shoppingCart.Subtotal')}}: </span>
        <span class="text-gold-light text-3xl font-suranna">HKD$@{{subTotal}}</span>
    </p>
    <div class="pt-5">
        <button class="flex items-center justify-center space-x-3 md:max-w-max w-full md:w-auto py-3 px-10 group bg-brown hover:bg-white text-white hover:text-brown border border-brown transition ease-in-out duration-500">
            <svg width="23" height="23" class="text-white group-hover:text-brown fill-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2007 5.56545C18.0827 5.41437 17.9016 5.32625 17.7098 5.32625H5.51484L4.95373 2.97858C4.88661 2.69805 4.63576 2.5 4.34731 2.5H2.28995C1.94561 2.49997 1.6665 2.77907 1.6665 3.12341C1.6665 3.46775 1.94561 3.74685 2.28995 3.74685H3.85522L5.88141 12.2249C5.94853 12.5056 6.19938 12.7034 6.48782 12.7034H16.1928C16.4794 12.7034 16.7292 12.5081 16.7979 12.23L18.315 6.0995C18.3609 5.91333 18.3187 5.71652 18.2007 5.56545ZM15.705 11.4566H6.97992L5.81282 6.57314H16.9132L15.705 11.4566ZM14.8628 13.5973C13.7169 13.5973 12.7847 14.5296 12.7847 15.6754C12.7847 16.8213 13.7169 17.7536 14.8628 17.7536C16.0087 17.7536 16.9409 16.8213 16.9409 15.6754C16.9409 14.5296 16.0087 13.5973 14.8628 13.5973ZM14.8628 16.5067C14.4044 16.5067 14.0315 16.1339 14.0315 15.6754C14.0315 15.217 14.4044 14.8442 14.8628 14.8442C15.3212 14.8442 15.694 15.217 15.694 15.6754C15.694 16.1339 15.3212 16.5067 14.8628 16.5067ZM5.24096 15.6754C5.24096 14.5296 6.17319 13.5973 7.3191 13.5973C8.46497 13.5973 9.39723 14.5296 9.39723 15.6754C9.39723 16.8213 8.46497 17.7536 7.3191 17.7536C6.17322 17.7536 5.24096 16.8213 5.24096 15.6754ZM6.48784 15.6754C6.48784 16.1339 6.86066 16.5067 7.3191 16.5067C7.77753 16.5067 8.15035 16.1339 8.15035 15.6754C8.15035 15.217 7.77753 14.8442 7.3191 14.8442C6.86066 14.8442 6.48784 15.217 6.48784 15.6754Z" />
            </svg>
            <span class="text-white group-hover:text-brown font-bold font-lato tracking-widest uppercase" @click="addItemToCart()">{{__('shoppingCart.Add Cart')}}</span>
        </button>
    </div>
    <div class="flex justify-end">
        <div class="text-xs text-gray-700">
            <p class="sm:text-lg font-light">{{__('shoppingCart.Diamond Arrival')}}</p>
            <p class="font-light">{{__('shoppingCart.Today Order, Get Free shipment')}}
                <strong class="sm:text-lg font-semibold">{{__('shoppingCart.on')}} <a> @{{ extraWorkingDates( maxDeliveryDate ,'months') |transJs() }} @{{ extraWorkingDates( maxDeliveryDate ) }} @{{ 'day' |transJs() }},  @{{ extraWorkingDates( maxDeliveryDate ,'dates') |transJs() }}</a></strong> 
            </p>
        </div>
    </div>
</div>