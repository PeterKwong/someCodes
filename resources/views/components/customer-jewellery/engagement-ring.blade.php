 <div class="flex flex-col space-y-3">
    <div class="max-w-xl flex items-center md:justify-between">
        <span class="text-xl font-suranna">{{__('engagementRing.'.$engagementRings->metal)}} {{__('engagementRing.Diamond Ring')}}</span>
        <p class="hidden md:flex items-center space-x-1 text-gold-light text-xl font-suranna">
            <span>HKD</span>
            <span class="text-3xl">${{$engagementRings->unit_price}}</span>
        </p>
    </div>
    <p class="relative md:static -top-3 md:top-0 text-sm md:text-base font-lato">{{__('engagementRing.Engagement Ring Setting')}}</p>   
    <div class="grid grid-cols-6 space-x-10">
        <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
            <span class="font-bold">{{__('engagementRing.Style')}}</span>
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
            </svg>
        </span>
        <a class="col-span-4 flex text-brown md:block justify-end md:col-span-4"target="_blanck" href="/{{app()->getLocale()}}/engagement-rings?style={{strtolower($engagementRings->style)}}">
                {{__('engagementRing.'.$engagementRings->style)}}
        </a>
    </div>
    <div class="grid grid-cols-6 space-x-10">
        <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
            <span class="font-bold">{{__('engagementRing.Shoulder')}}</span>
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
            </svg>
        </span>
        <a class="col-span-4 flex text-brown md:block justify-end md:col-span-4" target="_blanck" href="/{{app()->getLocale()}}/engagement-rings?shoulder={{strtolower($engagementRings->shoulder)}}">
                {{__('engagementRing.'.$engagementRings->shoulder)}}
        </a>
    </div>
    <div class="grid grid-cols-6 space-x-10">
        <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
            <span class="font-bold">{{__('engagementRing.Claw Prong')}}</span>
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
            </svg>
        </span>
        <a class="col-span-4 flex text-brown md:block justify-end md:col-span-4" target="_blanck" href="/{{app()->getLocale()}}/engagement-rings?prong={{strtolower($engagementRings->prong)}}">
                {{__('engagementRing.'.$engagementRings->prong)}}
        </a>
    </div>
    <div class="grid grid-cols-6 space-x-10">
        <span class="col-span-2 md:col-span-2 flex items-center space-x-2">
            <span class="font-bold">{{__('engagementRing.Side Stone')}}</span>
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.213135C4.47718 0.213135 0 4.69031 0 10.2131C0 15.736 4.47718 20.2131 10 20.2131C15.5228 20.2131 20 15.736 20 10.2131C20 4.69031 15.5229 0.213135 10 0.213135ZM10 18.4032C5.47679 18.4032 1.80999 14.7363 1.80999 10.2131C1.80999 5.68993 5.47679 2.02312 10 2.02312C14.5209 2.02861 18.1845 5.69218 18.19 10.2131C18.19 14.7364 14.5233 18.4032 10 18.4032ZM11 14.2132H9.00001V16.2132H11V14.2132ZM9.06855 4.30452C11.217 3.79012 13.3756 5.11471 13.89 7.26314C14.4015 9.38663 13.115 11.5277 11 12.0731V13.2131H9.00002V11.1031C9.00002 10.6116 9.39851 10.2131 9.89004 10.2131C10.9041 10.2486 11.7957 9.54708 12 8.55314C12.0939 7.44858 11.2746 6.47704 10.17 6.38315C9.06546 6.28926 8.09393 7.10859 8.00004 8.21316H6.00002C5.99139 6.35587 7.26232 4.73699 9.06855 4.30452Z" fill="#656565"></path>
            </svg>
        </span>
        <span class="col-span-4 flex md:block justify-end md:col-span-4">
            {{__('engagementRing.Around')}} {{$engagementRings->ct}} tct
        </span>
    </div>
</div>
<p class="font-lato text-grey-lighter text-sm border-b pb-3">{{__('engagementRing.Stock')}}. {{$engagementRings->stock}}</p>



