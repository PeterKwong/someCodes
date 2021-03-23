<div>
    <a id="back-to-top" class="btn btn-primary btn-lg back-to-top sticker mx-1" href="{{ '/links/whatsapp/852' .  config('global.company.staffs.' . rand(0, count(config('global.company.staffs'))-1 ) . '.number') . '?text=' . urlencode( url()->current() ) }} "  role="button">
    	<i class="far fa-comments"></i>
    </a>
</div>