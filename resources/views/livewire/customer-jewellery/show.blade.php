<script type="text/javascript">
      document.addEventListener("DOMContentLoaded", () => {
            @if(isset($posts['weddingRings']))
                window.mutualVar.lw.customerJewellery.weddingRings = @json(isset($posts['weddingRings'])?$posts['weddingRings']:'')
            @endif
            @if(isset($posts['engagementRings']))
                window.mutualVar.lw.customerJewellery.engagementRings = @json(isset($posts['engagementRings'])?$posts['engagementRings']:'')
            @endif
            @if(isset($posts['jewelleries']))
                window.mutualVar.lw.customerJewellery.jewelleries = @json(isset($posts['jewelleries'])?$posts['jewelleries']:'')
            @endif
      });
</script>

<div id="customerJewelleryShow">
    <!-- Shop Section  -->
    <div class="relative z-10 flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">
       
        <!-- Product Details -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:grid md:grid-cols-7 md:space-x-10 pt-7">
            <!-- Column-1 - Ring Display  -->
            <div class="md:col-span-4 flex flex-col space-y-4">
                <!-- Row 1 -->
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4 overflow-hidden">
                    <div class="w-full h-auto relative border">
                        @if($videoSelecting == 'video360')
                            <video-360-exchange src="{{$meta->video}}" img="{{$meta->images[0]->image}}" :vid360="video360.src"/>
                        @else 
                            <div class="flex">
                                <div class="w-full h-full videoPlayer">  
                                    <video
                                    id="invoice-post-1"
                                    class="video-js vjs-fluid vjs-big-play-centered"
                                    controls
                                    preload="auto"
                                    poster="{{ config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $meta->images[0]->image}}"
                                    data-setup='{"fluid": true}'
                                    >
                                    <source src="{{ config('global.cache.' . config('global.cache.live') ) . 'public/videos/' . $meta->video}}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        @endif                       
                        <!-- zoom in/out  -->
                        <div class="absolute top-6 right-6 hidden lg:flex flex-col divide-y border">
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
                        <div class="absolute bottom-2 lg:bottom-3 w-full flex justify-end lg:justify-between items-center px-2 lg:px-4">
                            <p class="hidden lg:flex items-center space-x-1">
                                <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" fill="#666666"></path>
                                </svg>
                                <span class="text-sm">360° view</span>
                            </p>
                            <div class="flex items-center">
                                <button class="flex items-center justify-center">
                                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.31586 22.3407C4.31586 12.604 12.2383 4.68158 21.975 4.68158C31.7117 4.68158 39.6342 12.604 39.6342 22.3407C39.6342 32.0775 31.7117 39.9999 21.975 39.9999C12.2383 39.9999 4.31586 32.0775 4.31586 22.3407Z" fill="white" stroke="#CCCCCC" stroke-width="0.905157"></path>
                                        <path d="M15.1831 29.1326H19.711V15.5488H15.1831V29.1326Z" fill="#666666"></path>
                                        <path d="M24.239 29.1326H28.7669V15.5488H24.239V29.1326Z" fill="#666666"></path>
                                    </svg>                                                                                                       
                                </button>
                            </div>                                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column-2 - Wedding Ring Detials  -->
            <div class="md:col-span-3 flex flex-col space-y-3">
                @if($meta->postable_type == 'App\Models\EngagementRing')
                    @if( isset($posts['engagementRings']) )

                            <x-customer-jewellery.engagement-ring 
                            :engagementRings="$meta->invoice" :tags="$tags['engagementRings']"/>
                    @endif
                @endif

                @if($meta->postable_type == 'App\Models\WeddingRing')
                    @if( isset($posts['weddingRings']) )

                        <x-customer-jewellery.wedding-ring :weddingRings="$meta->invoice" :tags="$tags['weddingRings']"/>


                    @endif
                @endif

                @if($meta->postable_type == 'App\Models\Jewellery')
                    @if( isset($posts['jewelleries']) )

                        <x-customer-jewellery.jewellery :jewelleries="$meta->invoice" :tags="$tags['jewelleries']"/>

                    @endif
                @endif
                            
                @foreach($meta->invoice->invoiceDiamonds as $key => $diamond )
                <p class="text-sm md:text-base font-lato pt-1">{{$diamond->weight}} {{__('diamondSearch.carat')}} 
                    <a class="text-brown" href="/{{app()->getLocale() . '/gia-loose-diamonds?shape=' . strtolower($diamond['shape']) }}">
                     {{__('diamondSearch.'.$diamond->shape)}}
                     {{__('diamondSearch.diamond')}}
                     </a>
                 </p>
                <div class="grid grid-cols-5 space-y-3 md:space-y-0">
                    <div class="col-span-4 md:col-span-2 flex flex-col space-y-3">
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Carat')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                           <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds/round-cut{{$diamondUrl[$key]}}" >
                               {{$diamond->weight}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Color')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?color={{$diamond->color}}" >
                                {{$diamond->color}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Clarity')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?clarity={{$diamond->clarity}}">
                                {{$diamond->clarity}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Cut')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?cut={{$diamond->cut}}">
                                {{$diamond->cut}}
                            </a>
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-3 flex flex-col space-y-3">
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Polish')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?polish={{$diamond->polish}}">
                                {{$diamond->polish}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Symmetry')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?symmetry={{$diamond->symmetry}}">
                                {{$diamond->symmetry}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Fluorescence')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <a class="col-span-3 flex text-brown md:block justify-end md:col-span-3" target="_blanck" href="/{{app()->getLocale()}}/gia-loose-diamonds?fluorescence={{$diamond->fluorescence}}">
                               {{$diamond->fluorescence}}
                            </a>
                        </div>
                        <div class="grid grid-cols-5 space-x-3">
                            <span class="col-span-2 flex items-center space-x-2">
                                <span class="font-bold">{{__('diamondSearch.Certificate')}}</span>
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                                </svg>
                            </span>
                            <span class="flex items-center space-x-3 md:block col-span-3">
                                {{$diamond->lab}}:{{$diamond->certificate}} <a href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank" class="ml-2 text-brown font-bold underline">{{__('diamondSearch.Download')}}</a>
                            </span>
                        </div>
                    </div>
                </div>
                <p class="font-lato text-grey-lighter text-sm border-t"></p>
                <p class="flex items-center space-x-5">
                    <span class="text-xs text-grey-04">{{__('diamondSearch.For more detailed information, can reach GIA website query')}} : </span>
                    <img src="/assets/images/details-GIA.png" alt="">
                </p>

                @endforeach

                <div class="pt-5">
                   <x-appointment/>
                </div>
            </div>
        </div>
        @if(isset($diamond))
            <!-- GIA Certificate -->
            <div class="flex flex-col py-10 2xl:py-20 2xl:pb-10">
                <div class="flex items-center justify-between py-3 md:py-5">
                    <h2 class="text-xl font-suranna text-brown">{{$diamond->lab}} {{__('diamondSearch.Certificate')}}</h2>
                    <a href="https://www.gia.edu/report-check?reportno={{$diamond->certificate}}" target="_blank" class="text-brown font-lato font-bold underline">{{__('diamondSearch.Download')}}</a>
                </div>
                <div class="relative flex items-center w-full h-full border">
                     @foreach( $meta->images as $image )
                        @if($image['type'] == 'cert')
                        <img class="w-full h-full" src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image}} ">
                        @endif
                    @endforeach
                    <a @click.prevent="showModal = true" href="#" class="hidden lg:inline-block absolute top-3 right-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.2221 0V2.22224H16.2054L5.2832 13.1444L6.85544 14.7167L17.7776 3.79443V7.77776H19.9999V0H12.2221Z" fill="black"/>
                            <path d="M17.7778 17.7778H2.22224V2.22224H10V0H2.22224C0.994427 0 0 0.994427 0 2.22224V17.7778C0 19.0056 0.994427 20 2.22224 20H17.7778C19.0056 20 20 19.0056 20 17.7778V10H17.7778V17.7778Z" fill="black"/>
                        </svg>
                    </a>             
                </div>
            </div>
            <!-- Diamond Waist Number -->
            <div class="flex md:justify-end w-full">
                <div class="relative h-full">
                    <img src="/assets/images/diamond-zoom.jpg" alt="diamond-zoom" /> 
                    <div class="relative z-20 md:absolute -top-7 md:top-8 md:-left-52 py-4 lg:py-10 px-3 lg:px-6 tracking-card bg-white border-gold-solid border h-auto mx-auto w-72 md:w-96 flex flex-col space-y-1 lg:space-y-3">
                     @foreach( $meta->images as $image )
                        @if($image['type'] == 'gia_no')
                            <img src="{{config('global.cache.' . config('global.cache.live') ) . 'public/images/' . $image->image}} " alt="diamond-tracking-number" /> 
                        @endif
                    @endforeach
                        <h3 class="text-xl text-brown font-suranna">{{__('customerJewellery.Diamond Waist Number')}}</h3>
                        <p class="text-sm lg:text-base font-lato">
                            {{__('diamondSearch.Diamond waist number is like a person ID card, used to confirm the diamond 4Cs, what exactly those levels.')}}
                        </p>
                        <span class="absolute z-10 -top-3.5 lg:top-24 -ml-2 lg:ml-0 left-36 lg:left-auto lg:-right-2.5 bg-white border border-r-0 lg:border-l-0 lg:border-r border-b-0 border-gold-solid h-5 w-5 transform rotate-45"></span>  
                    </div>
                </div>
            </div>
        @endif

        <!-- Recommend Customer Jewellery -->

        <div class="pt-10 pb-20 2xl:py-20">

            @if( isset($engagementRing) )
                @livewire('customer-jewellery.post-fetch-row',
                [ 'draggableId'=>'draggableItem0' ,
                  'title'=>'',  
                  'type'=>'Engagement Ring', 
                  'upperType'=>'style', 
                  'query'=>$engagementRing->style ])

            @endif

            @if( isset($weddingRing) )
                @livewire('customer-jewellery.post-fetch-row',
                ['draggableId'=>'draggable0' , 
                'type'=>'Wedding Ring', 
                'upperType'=>'shape', 
                'query'=>$weddingRings->weddingRings[0]->shape ])

            @endif

            @if( isset($weddingRing) )
                @livewire('customer-jewellery.post-fetch-row',
                ['draggableId'=>'draggableItem0' , 
                'type'=>'Jewellery', 
                'upperType'=>'style', 
                'query'=> $jewellery->type ])
            @endif

        </div>

    </div>
</div>

