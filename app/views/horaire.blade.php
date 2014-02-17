@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
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
		<h3>Horaire</h3>
		<table id="horaire" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th></th>
					<th><p>8:00</p></th>
					<th><p>9:00</p></th>
					<th><p>10:00</p></th>
					<th><p>11:00</p></th>
					<th><p>12:00</p></th>
					<th><p>13:00</p></th>
					<th><p>14:00</p></th>
					<th><p>15:00</p></th>
					<th><p>16:00</p></th>
					<th><p>17:00</p></th>
					<th><p>18:00</p></th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				
				<tr>
					<th rowspan="4">Dimanche</th>
					<td class="emp1"></td>
					<td class="emp1"></td>
					<td class="emp1"></td>
					<td class="emp1"></td>
					<td class="emp1"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td class="emp3"></td>
					<td class="emp3"></td>
					<td class="emp3"></td>
					<td class="emp3"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
				</tr>
				
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				
				<tr>
					<th rowspan="2">Lundi</th>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td class="emp4"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
					<td class="emp2"></td>
				</tr>
				
				<tr>
					<th>Mardi</th>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
				</tr>
				
				<tr>
					<th>Mercredi</th>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
				</tr>
				
				<tr>
					<th>Jeudi</th>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
				</tr>
				
				<tr>
					<th>Vendredi</th>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
				</tr>
				
				<tr>
					<th>Samedi</th>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
					<td>
				</tr>
				
			</tbody>
		</table>
	</div>
@stop