@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Documents</h3>
		<h4>Emplacement : {{ str_replace(["document/", "document"], "formation/", Request::path()) }}</h4>
		@include('layout.message')

		<?php $nbFile = 0; ?>
		@foreach ($files as $file)
			@if ($nbFile == 0)
				<div class="row">
			@endif

			<div class="large-3 columns left">
				<div class="row">
					@if ($file['type'] == "folder")
						<a href="{{route('document', $file['location'])}}" class="medium-11 columns button secondary">
							@if ($file['name'] == "..")
								<i class="fa fa-angle-up fa-5x"></i>
							@else
								<i class="fa fa-folder-o fa-5x"></i>
								<br />
								{{ $file['name'] }}
							@endif
						</a>
						@if ($file['name'] != ".." && Auth::User()->type == "Gestionnaire")
							<a href="{{route('delete.document', $file['location'])}}" class="button">Supprimer</a>
						@endif
					@else
						<a href="{{route('fichier', $file['location'])}}" class="medium-11 columns button secondary">
						<i class="fa fa-file-o fa-5x"></i>
							<br />
							{{ $file['name'] }}
						</a>
						@if ($file['name'] != ".." && Auth::User()->type == "Gestionnaire")
							<a href="{{route('delete.fichier', $file['location'])}}" class="button">Supprimer</a>
                            <a href="{{route('info.fichier', $file['location'])}}">{{ $file['nbDownload'] }} téléchargement </a>
						@endif
					@endif

				</div>
			</div>

			<?php $nbFile++; ?>
			@if ($nbFile == 4)
				</div>
				<?php $nbFile = 0 ?>
			@endif
			
		@endforeach

		
	</div>
	@if (Auth::User()->type == "Gestionnaire")
		{{ Form::open(['route' => 'document.create']) }}

			{{ Form::label('name', 'Créé un nouveau dossier') }}
			{{ Form::text('name') }}
			{{ Form::hidden('location', $location) }}
			{{ Form::submit('Créé le dossier', ['class' => 'button']) }}

		{{ Form::close() }}

		{{ Form::open(['route' => 'add.file', 'files' => true]) }}
			{{ Form::hidden('location', $location) }}

			{{ Form::label('fichier', 'Ajouter un fichier') }}
			{{ Form::file('fichier') }}
			{{ Form::submit('Ajouté le fichier', ['class' => 'button']) }}

		{{ Form::close() }}
	@endif
@stop