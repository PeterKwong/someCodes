<div class="max-w-xl flex items-center">
    <span class="text-xl font-suranna">{{__('weddingRing.'.$weddingRings->weddingRings[0]->metal)}} {{__('weddingRing.Wedding Rings')}}</span>
</div>
<p class="text-sm md:text-base font-lato"> {{__('weddingRing.Couple Rings')}} {{$weddingRings->weddingRings[0]->brand?'｜'.__('weddingRing.'.$weddingRings->weddingRings[0]->brand):''}} </p>
<div class="grid grid-cols-6 divide-y md:divide-y-0 space-y-5 md:space-y-0 md:divide-x">
    <div class="col-span-5 md:col-span-3 flex flex-col space-y-3 ">
        <div class="flex flex-row justify-between md:justify-start w-full md:w-auto md:flex-col space-y-0">
            <span class="text-grey-04 text-sm">{{__('weddingRing.'.$weddingRings->weddingRings[0]->gender)}}</span>
            <p class="flex items-center space-x-1 font-suranna text-gold-light">
                <span class="text-base md:text-xl">HKD</span>
                <span class="text-xl md:text-2xl">${{$weddingRings->weddingRings[0]->unit_price}}</span>
            </p>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Shape')}}</span>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                    </svg>
                </span>
            </span>
            <span class="col-span-3">
                <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?shape=' . $weddingRings->weddingRings[0]->shape . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[0]->shape)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Finish')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                 <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?finish=' . $weddingRings->weddingRings[0]->finish . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[0]->finish)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Metal')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?metal=' . $weddingRings->weddingRings[0]->metal . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[0]->metal)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Side Stone')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                {{__('engagementRing.Around')}} {{$weddingRings->weddingRings[0]->ct}}ct
            </span>
        </div>
        <p class="font-lato text-grey-lighter text-sm">{{__('weddingRing.Stock')}}. {{$weddingRings->weddingRings[0]->stock}}</p>
    </div>
    <div class="col-span-5 md:col-span-3 flex flex-col space-y-3 pt-5 md:pt-0 md:pl-16">
        <div class="flex flex-row justify-between md:justify-start w-full md:w-auto md:flex-col space-y-0">
            <span class="text-grey-04 text-sm">{{__('weddingRing.'.$weddingRings->weddingRings[1]->gender)}}</span>
            <p class="flex items-center space-x-1 font-suranna text-gold-light">
                <span class="text-base md:text-xl">HKD</span>
                <span class="text-xl md:text-2xl">${{$weddingRings->weddingRings[1]->unit_price}}</span>
            </p>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Shape')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?shape=' . $weddingRings->weddingRings[1]->shape . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[1]->shape)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Finish')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?finish=' . $weddingRings->weddingRings[0]->finish . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[1]->finish)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Metal')}}</span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                <a class="text-brown" target="_blank" href="/{{app()->getLocale() . '/customer-jewellery?metal=' . $weddingRings->weddingRings[0]->metal . '&jtype=wedding ring'}}">
                    {{__('weddingRing.'.$weddingRings->weddingRings[1]->metal)}}
                </a>
            </span>
        </div>
        <div class="grid grid-cols-5 space-x-3">
            <span class="col-span-2 flex items-center space-x-2">
                <span class="font-bold">{{__('weddingRing.Side Stone')}} </span>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
                </svg>
            </span>
            <span class="col-span-3">
                {{__('engagementRing.Around')}} {{$weddingRings->weddingRings[1]->ct}}ct
            </span>
        </div>
        <p class="font-lato text-grey-lighter text-sm">{{__('weddingRing.Stock')}}. {{$weddingRings->weddingRings[1]->stock}}</p>
    </div>
</div>


