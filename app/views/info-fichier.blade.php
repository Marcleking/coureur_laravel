@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Téléchargement du fichier {{ basename($fichier) }}</h3>

		<table width="100%">
			<thead>
				<tr>
					<th>Courriel</th>
					<th>Jour</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($info as $download)
				<tr>
					<td>{{ $download->courriel }}</td>
					<td>{{ $download->date }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		
		<a href="{{URL::previous()}}" class="button">Retour</a>

	</div>
@stop