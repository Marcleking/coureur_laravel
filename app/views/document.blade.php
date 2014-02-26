@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Documents</h3>



		<?php $nbFile = 0; ?>
			@foreach ($files as $file)
				@if ($nbFile == 0)
					<div class="row">
				@endif

				<div class="large-3 columns left">
					<div class="row">
						@if ($file['type'] == "folder")
							<a href="{{route('document', $file['location'])}}" class="medium-11 columns button secondary">
							<i class="fa fa-folder-o fa-5x"></i>
						@else
							<a href="" class="medium-11 columns button secondary">
							<i class="fa fa-file-o fa-5x"></i>
						@endif
						<br />
						{{ $file['name'] }}
						</a>
					</div>
				</div>

				<?php $nbFile++; ?>
				@if ($nbFile == 4)
					</div>
					<?php $nbFile = 0 ?>
				@endif
				
			@endforeach

	</div>

@stop