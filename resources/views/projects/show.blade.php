@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 float-left">
      	<div class="card card-block bg-faded">
	        <div class="container">
	          <h1 class="display-3">{{ $project->name }}</h1>
	          <p>{{ $project->description }}</p>
	          {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> --}}
	        </div>
      	</div>

      	<div class="container-fluid bg-faded">
      		{{-- <a href="/projects/create" class="float-right btn btn-secondary btn-sm">Agregar Proyecto</a> --}}
      		
      		<hr>
      			@include('partials.comments')
      		
	        <form method="post" action="{{ route('comments.store') }}">
                @csrf

                <input type="hidden" name="_method" value="post">

				<input type="hidden" name="commentable_type" value="App\Project">
				<input type="hidden" name="commentable_id" value="{{ $project->id }}">

            	<div class="form-group">
                    <label for="company-content">Comentarios</label>
                    <textarea placeholder="Escriba un comentario"
                                style="resize: vertical"
                                id="comment-content"
                                name="body"
                                rows="5" spellcheck="false"
                                class="form-control autosize-target"
                                ></textarea>
                </div>

                <div class="form-group">
                    <label for="company-content">Trabajo realizado (Url/Fotos)</label>
                    <textarea placeholder="Ingrese la direccion de la Url o Captures"
                                style="resize: vertical"
                                id="url-content"
                                name="url"
                                rows="3" spellcheck="false"
                                class="form-control autosize-target"
                                ></textarea>
                </div>

                

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enviar"/>
                </div>

           	</form>
		</div>
<hr>
	

        
</div>

<aside class="col-md-3 col-lg-3 col-sm-3 float-right">
          {{-- <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> --}}
			<div class="p-3">
	            <h4 class="font-italic">Acciones</h4>
	            <ol class="list-unstyled">
	              	<li><a href="/projects/{{ $project->id }}/edit">Editar Proyecto</a></li>
	              	<li><a href="/projects">Mis Proyectos</a></li>
	              	<li><a href="/company/create">Crear nuevo proyecto</a></li>
	              	<hr>

	              	@if($project->user_id == Auth::user()->id) {{-- Accedemos a comparar si el usuario logueado es el mismo que la creo --}}
		              	<li><a href="#"
		              		onclick="
		              		var result = confirm('Estas seguro de que quieres eliminar este proyecto?');
		              			if (result) {
		              				event.preventDefault();
		              				document.getElementById('delete-form').submit();
		              			}"
		              		>Eliminar proyecto</a>
		              	
		              
							<form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}"
								method="POST" style="display: none;">
								
								<input type="hidden" name="_method" value="delete">
								@csrf
							</form>
						</li>
					@endif
	              {{-- <li><a href="#">Agregar nuevo miembro</a></li> --}}
	            </ol>

	            <hr>
	            <h4>Agregar usuario</h4>
	            <div class="row">
	            	<div class="col-md-12">
	            		<form id="add-user" action="{{ route('projects.adduser') }}"
	            						method="POST">
	            			@csrf		
	            			<div class="input-group">
	            				<input type="text" class="form-control" name="email" placeholder="Email">
	            				<input type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
	            				<span class="input-group-btn">
	            					<button class="btn btn-default" type="submit">Agregar</button>
	            				</span>
	            			</div>
	            				
	            		</form>
	            	</div>
	            </div>
				
				<br>
				<h4>Miembros del equipo</h4>
				<ol class="list-unstyled">
					@foreach($project->users as $user)
						<li><a href="#"></a>{{ $user->email }}</li>
					@endforeach
				</ol>
          	</div>

    

          
</aside>
	
@endsection