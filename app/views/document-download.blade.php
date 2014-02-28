@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<h3>Téléchargement</h3>

		@if (isset($download))
			<?php
				$file = "../app/storage/file".$download;
				if (file_exists($file)) {
				    header('Content-Description: File Transfer');
				    header('Content-Type: application/octet-stream');
				    header('Content-Disposition: attachment; filename='.basename($file));
				    header('Expires: 0');
				    header('Cache-Control: must-revalidate');
				    header('Pragma: public');
				    header('Content-Length: ' . filesize($file));
				    ob_clean();
				    flush();
				    readfile($file);
				    exit;
				}
			?>
		@endif
		
	</div>
@stop