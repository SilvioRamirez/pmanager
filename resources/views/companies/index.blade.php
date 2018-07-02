@extends('layouts.app') {{-- Extiende de la palantilla principal y luego le decimos que este codigo va a ir luego de donde se nombra a a la seccion content --}}

@section('content')

<div class="col-md-8 offset-4">
	<div class="card border-primary mb-8" style="max-width: 20rem;">
		<div class="card-header text-white bg-primary">Compañias <a href="companies/create" class="float-right btn btn-info btn-sm"> Crear nueva</a></div>
	  		<div class="card-body">
				

	    		<div class="list-group">
	    			@foreach($companies as $company)
					  	<a href="/companies/{{ $company->id }}" class="list-group-item list-group-item-action"> {{ $company->name }} </a>
					@endforeach
				</div>
	  		</div>
	</div>
</div>

@endsection