@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 float-left">
      	<div class="jumbotron">
	        <div class="container">
	          <h1 class="display-3">{{ $company->name }}</h1>
	          <p>{{ $company->description }}</p>
	          {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> --}}
	        </div>
      	</div>

      	<div class="container">
      		<a href="/projects/create/{{ $company->id }}" class="float-right btn btn-secondary btn-sm">Agregar Proyecto</a>
	        <div class="row">
	        	@foreach($company->projects as $project)
		          <div class="col-md-4">
		            <h2>{{ $project->name }}</h2>
		            <p>{{ $project->description }}</p>
		            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">Ver Proyecto</a></p>
		          </div>
	          	@endforeach
	        </div>
        <hr>
      	</div>

</div>

<aside class="col-md-3 col-lg-3 col-sm-3 float-right">
          {{-- <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> --}}
			<div class="p-3">
	            <h4 class="font-italic">Acciones</h4>
	            <ol class="list-unstyled">
	              	<li><a href="/companies/{{ $company->id }}/edit">Editar Compañia</a></li>
	              	<li><a href="/projects/create/{{ $company->id }}">Agregar Proyecto</a></li>
	              	<li><a href="/companies">Mis Compañias</a></li>
	              	<li><a href="/company/create">Crear nueva compañia</a></li>
	              	<hr>
	              	<li><a href="#"
	              		onclick="
	              		var result = confirm('Estas seguro de que quieres eliminar este proyecto?');
	              			if (result) {
	              				event.preventDefault();
	              				document.getElementById('delete-form').submit();
	              			}"
	              		>Eliminar Compañia</a>
	              	
	              
						<form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}"
							method="POST" style="display: none;">
							
							<input type="hidden" name="_method" value="delete">
							@csrf
						</form>
					</li>

	              {{-- <li><a href="#">Agregar nuevo miembro</a></li> --}}
	            </ol>
          	</div>

    

          
</aside>
	
@endsection