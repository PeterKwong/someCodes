<div class="flex p-2">
    
    @php($url='')

    @foreach(request()->segments() as $key => $flag)
        @if(  is_numeric($flag) != 1 )
            {{ is_numeric($flag) }}
            @php($url= $url . $flag )
            <div>
                <a href="/{{$url}}">
                    {{__('breadcrumb.'.$flag)}}
                </a> 
                <span class="p-1 text-gray-400">｜</span>
            </div>
            @php($url= $url .'/')
        @endif
    @endforeach
</div>