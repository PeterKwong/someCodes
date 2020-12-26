<div class="m-4">

	<form wire:submit.prevent="save">

		<div class="row">
			@foreach($cache as $key => $value)

				<div class="col-sm-3 p-2 border">
					
					<p>{{ $key }}</p>
					<textarea wire:model="cache.{{$key}}" class="form-control"></textarea>
					
				</div>
				

			@endforeach

		</div>


		<button type="submit" class="btn btn-primary">Save</button>
		
	</form>
	
</div>


