@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Lista de productos / servicios</a></li>
			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
		<a href="#" class="btn btn-success"><i class="fa fa-upload"></i> Exportar productos</a>
		<a href="#" class="btn btn-success"><i class="fa fa-download"></i> Importar productos</a>
		<a href="#">Descargar archivo de muestra</a>

		</div>
		<div class="col-md-6 text-right">
					
			<div class="btn-group">
			  <a href="{{ route('products.create') }}"  class="btn btn-danger crear_documento">
			    <i class="fa fa-plus"></i> Registrar Producto / Servicio
			  </a>			 
			</div>

		</div>
	</div>
	<div class="row">
		<hr class="dividor">

		<div class="col-md-6">

			{!! Form::open(['route' => 'products.index', 'method' => 'GET', 'class' => 'form-inline', 'style' => 'display:inline-block' ]) !!}

			
			  <div class="form-group">		    
			    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
			    
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			

			{!! Form::close() !!}
			|
			
           
            @include('partials.rows-form')          


			</div>

		<div class="col-md-6 text-right">

		  <!--	<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	   <form id="pog1" method="get" style="display:inline-block" >
	        <input id="pag_actual1" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form> 
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>      -->         


		</div>

	</div>


		<div class="box">
		
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							
							<th><a href="#"><i class="fa fa-sort"></i> Cod.</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Nombre</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Descripción</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Prc. Unitario (Sin IGV)</a></th>
							<th>Acciones</th>
							
							
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							
							<td>{{ $product->code }}</td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->description }}</td>
							<td>PEN {{ $product->price }}</td>
							<td><a href="{{ route('products.edit', $product) }}">Editar</a>
								<a href="#">Eliminar</a></td>
						</tr>
						@endforeach
						
						
					</tbody>
				</table>
			</div>
		</div>

		<!-- paginado inferior -->

	</div>
    <div class="col-md-6">
    	{!! $products->setPath('')->appends(['rows' => Input::get('rows')])->render() !!}
	    Mostrando 23 de 15201 resultados
	</div>
		<div class="col-md-6 text-right">
<!-- 
			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>  -->              


		</div>



</div>

@endsection