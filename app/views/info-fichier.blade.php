@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Téléchargement du fichier {{ basename($fichier) }}</h3>

		<table>
			<tr>
				<th>Courriel</th>
				<th>Jour</th>
			</tr>
			@foreach ($info as $download)
			<tr>
				<td>{{ $download->courriel }}</td>
				<td>{{ $download->date }}</td>
			</tr>
			@endforeach
		</table>
		
		<a href="{{URL::previous()}}">Retour</a>

	</div>
@stop