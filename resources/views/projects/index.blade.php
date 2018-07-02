@extends('layouts.app') {{-- Extiende de la palantilla principal y luego le decimos que este codigo va a ir luego de donde se nombra a a la seccion content --}}

@section('content')

<div class="col-md-8 offset-4">
	<div class="card border-primary mb-8" style="max-width: 20rem;">
		<div class="card-header text-white bg-primary">Proyectos <a href="projects/create" class="float-right btn btn-info btn-sm"> Crear nuevo</a></div>

	  	<div class="card-body">
	    	<div class="list-group">
	    		@foreach($projects as $project)
					<a href="/projects/{{ $project->id }}" class="list-group-item list-group-item-action"> {{ $project->name }} </a>
				@endforeach
			</div>
	  	</div>
	</div>
</div>

@endsection