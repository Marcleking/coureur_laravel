@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Messages</h3>
		
		<div class="panel">
			@if (isset($listMessage))
				{{-- <?=$listMessage?> --}}
			@endif
			
			@if (!isset($aucunMessage))
					Il n'y a pas de message!
			@endif
		</div>
	</div>
@stop