@if(\Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	   {{\Session::get('mensaje')}}
	</div>
@endif