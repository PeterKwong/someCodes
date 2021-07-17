<!-- Jewelry Section  -->
<div class="bg-grey-light">
    <div class="flex flex-col divide-y space-y-5 md:space-y-10 max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 py-5 md:py-20">
        <div class="flex flex-col space-y-5">
            <h2 class="text-xl font-medium text-brown font-suranna">{{trans('footer.Why Choose Us')}}</h2>
            <div class="flex flex-wrap items-center gap-4 md:gap-0 md:space-x-10 font-lato">
                <div class="flex space-x-4 md:space-x-5 items-center">
                    <img class="w-5 md:w-auto" src="/assets/images/notes.svg" alt="">
                    <span class="text-xs md:text-base">{{trans('footer.GIA certificate')}}</span>
                </div>
                <div class="flex space-x-4 md:space-x-5 items-center">
                    <img class="w-7 md:w-auto" src="/assets/images/youtube.svg" alt="">
                    <span class="text-xs md:text-base">{{trans('footer.360 degree HD video')}}</span>
                </div>
                <div class="flex space-x-4 md:space-x-5 items-center">
                    <img class="w-5 md:w-auto" src="/assets/images/ring.svg" alt="">
                    <span class="text-xs md:text-base">{{trans('footer.1000＋ finished product')}}</span>
                </div>
                <div class="flex space-x-4 md:space-x-5 items-center">
                    <img class="w-7 md:w-auto" src="/assets/images/crown.svg" alt="">
                    <span class="text-xs md:text-base">{{trans('footer.Lifetime maintenance')}}</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-5 pt-5 md:pt-10">
            <h2 class="text-xl font-medium text-brown font-suranna">{{trans('footer.Jewellery Knowledgment Education')}}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 md:items-center gap-y-5 md:gap-y-0 gap-x-2 md:gap-x-10 font-lato">
                <div class="flex flex-col space-y-3">
                    <a href="{{ $baseUrl }}/education-diamond-grading" class="inline-block overflow-hidden">
                        <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j1.png" alt="Jewelry-1">
                    </a>
                    <span class="text-xs md:text-base">{{trans('footer.Diamond 4Cs knowledgment')}}</span>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="{{ $baseUrl }}/buying-procedure" class="inline-block overflow-hidden">
                        <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j2.png" alt="Jewelry-2">
                    </a>
                    <span class="text-xs md:text-base">{{trans('footer.Buying Procedure')}}</span>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="{{ $baseUrl }}/customer-jewellery" class="inline-block overflow-hidden">
                        <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j3.png" alt="Jewelry-3">
                    </a>
                    <span class="text-xs md:text-base">{{trans('footer.Customer jewellery')}}</span>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="{{ $baseUrl }}/about-us" class="inline-block overflow-hidden">
                        <img class="w-full h-full transform hover:scale-110 transition duration-500" src="/assets/images/j4.png" alt="Jewelry-4">
                    </a>
                    <span class="text-xs md:text-base">{{trans('footer.About us')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>