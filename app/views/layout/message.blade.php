@if (Session::has('success'))
	<div data-alert id="fade" class="alert-box success radius">
		 {{ Session::get('success') }}
		 <a href="#" class="close">&times;</a>
	</div>
@elseif (Session::has('fail'))
	<div data-alert id="fade" class="alert-box warning radius">
		{{ Session::get('fail') }}
		<a href="#" class="close">&times;</a>
	</div> 
@endif