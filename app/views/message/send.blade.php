@extends('layout.master')

@section('content')
	<div class="panel medium-12 columns">

		@if (Session::has('errors'))
			<ul data-alert class="alert-box warning radius">
				@foreach (Session::get('errors')->all() as $message)
					<li>{{ $message }}</li>
				@endforeach
			</ul>
		@endif

		<a class="fa fa-question-circle fa-3x pull-right" href="../guide#envoyer" alt="Aide en ligne"></a>
		<h3>Envoyer un message</h3>
		{{ Form::open(['route' => 'message.send']) }}
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('titre', 'Titre') }}
					{{ Form::text('titre', null, ['class' => "sdf"]) }}
				</div>
			</div>			
			
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('message', 'Message') }}
					{{ Form::textarea('message', null, ['rows' => "30"]) }}
				</div>
			</div>
			
			{{ Form::submit('Envoyer', ['class' => 'button']) }}
		{{ Form::close() }}
	</div>
@stop