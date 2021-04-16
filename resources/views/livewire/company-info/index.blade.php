<div class="m-4">

	<form wire:submit.prevent="save">

		<div class="row">
			@foreach($companyInfo as $index => $value)
				@if($value->type == 'sales')
				<div class="col-sm-3 p-2 border">
					
					<p>{{ $value->key }}</p>
					<textarea wire:model.lazy="companyInfo.{{ $index }}.value" class="form-control"></textarea>
					
				</div>
				@endif
			@endforeach

		</div>

       @canany(['admin','purchase'])

		<p class="text-2xl py-2">Purchase</p>

		<div class="row">
			@foreach($companyInfo as $index => $value)
				@if($value->type == 'purchase')
				<div class="col-sm-3 p-2 border">
					
					<p>{{ $value->key }}</p>
					<textarea wire:model.lazy="companyInfo.{{ $index }}.value" class="form-control"></textarea>
					
				</div>
				@endif
			@endforeach

		</div>
		@endcanany

		<button type="submit" class="btn btn-primary">Save</button>
		
	</form>
	
</div>


