@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 float-left">

    <div class="col-md-12 col-lg-12 col-sm-12 " style="background: white; margin:10px;">
        <h1>Crear nuevo proyecto</h1>
	       <form method="post" action="{{ route('projects.store') }}">
                @csrf

                <input type="hidden" name="_method" value="post">
            
                <div class="form-group">
                    <label for="project-name">Nombre <span class="required">*</span></label>
                    <input placeholder="Escribe un nombre"
                            id="project-name"
                            required
                            name="name"
                            spellcheck="false"
                            class="form-control"
                            value="" 
                    />
                @if($companies == null)
                    <input type="hidden" 
                            value="{{ $company_id }}"
                            name="company_id"
                    />
                @endif
                </div>
                
                @if($companies != null)
                    <div class="form-group">
                        <label for="company-content">Selecionar compañia</label>
                        
                        <select name="company_id" id="" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                                
                        </select>

                    </div>
                @endif
                <div class="form-group">
                    <label for="project-content">Descripción</label>
                    <textarea placeholder="Escriba una descripción"
                                style="resize: vertical"
                                id="project-content"
                                name="description"
                                rows="5" spellcheck="false"
                                class="form-control autosize-target"
                                ></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enviar"/>
                </div>

           </form>


    </div>

</div>

<aside class="col-md-3 col-lg-3 col-sm-3 float-right">
         
			<div class="p-3">
	            <h4 class="font-italic">Acciones</h4>
	            <ol class="list-unstyled">
                   <li><a href="/companies/">Lista de Proyectos</a></li>
	            </ol>
          	</div>

</aside>
	
@endsection