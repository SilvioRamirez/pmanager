@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 float-left">

    <div class="col-md-12 col-lg-12 col-sm-12 " style="background: white; margin:10px;">
        <h1>Crear nueva compañia</h1>
	       <form method="post" action="{{ route('companies.store') }}">
                @csrf

                <input type="hidden" name="_method" value="post">
            
                <div class="form-group">
                    <label for="company-name">Nombre <span class="required">*</span></label>
                    <input placeholder="Escribe un nombre"
                            id="company-name"
                            required
                            name="name"
                            spellcheck="false"
                            class="form-control"
                            value="" 
                    />
                </div>

                

                <div class="form-group">
                    <label for="company-content">Descripción</label>
                    <textarea placeholder="Escriba una descripción"
                                style="resize: vertical"
                                id="company-content"
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
                   <li><a href="/companies/">Lista de Compañias</a></li>
	            </ol>
          	</div>

</aside>
	
@endsection