<div class="p-2">
    <a class="btn btn-primary mx-1" href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} "  role="button">
    	{{ __('diamondSearch.Appointment') }}
    	<i class="far fa-comments"></i>
    </a>
</div>
