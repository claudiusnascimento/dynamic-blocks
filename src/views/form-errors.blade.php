

	@if($errors->{$error_bag_name}->any())
		<ul class="alert alert-danger">
			@foreach($errors->{$error_bag_name}->all() as $error)
				<li style="list-style-type: none;">{{ $error }}</li>
			@endforeach
		</ul>
	@endif