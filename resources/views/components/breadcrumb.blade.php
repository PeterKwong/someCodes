<div class="relative flex flex-col max-w-screen-2xl 2xl:mx-auto md:mx-10 lg:mx-20 px-5 md:px-0 font-lato">
    @php($url='')

    <ul class="flex flex-wrap items-center divide-x-2 divide-opacity-20 space-x-3 pt-3">
        @foreach(request()->segments() as $key => $flag)
            @if(  is_numeric($flag) != 1 )
                {{ is_numeric($flag) }}
                @php($url= $url . $flag )
                <li>
                    <a class="text-xs md:text-sm font-medium" href="/{{$url}}">
                        <span>{{__('breadcrumb.'.$flag)}}</span>
                    </a>
                </li>
                @php($url= $url .'/')
            @endif
        @endforeach
    </ul>
</div>

