@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Gastos</a></li>
			
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
	


		
	
<div class="row">
	<div class="col-xs-12">
		
		


 		<div class="row">
			<div class="col-md-9">
			<ul class="nav nav-pills" role="tablist">
		  <li role="presentation" class="active"><a href="#">Todos <span class="badge">42</span></a></li>
		  <li role="presentation"><a href="#">Facturas <span class="badge">30</span></a></li>
		  <li role="presentation"><a href="#">Boletas <span class="badge">30</span></a></li>
		  <li role="presentation"><a href="#">Tick. Fact.<span class="badge">12</span></a></li>
		  <li role="presentation"><a href="#">Tick. Bole.<span class="badge">12</span></a></li>
		  <li role="presentation"><a href="#">Reci. Servic.<span class="badge">12</span></a></li>
		  <li role="presentation"><a href="#">Otros<span class="badge">12</span></a></li>
		</ul>

		</div>
		<div class="col-md-3 text-right">
<a href="paginas/gasto-crear.html"  class="btn btn-danger crear_documento">
						<i class="fa fa-plus"></i> Nuevo Gasto
					</a>

			<!-- <div class="btn-group">
			  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			    <i class="fa fa-plus"></i> Registrar Venta <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu" style="z-index:100000">
			    <li><a href="#">Factura</a></li>
			    <li><a href="#">Boleta</a></li>
			    <li><a href="#">Ticket boleta</a></li>
			    <li><a href="#">Ticket factura</a></li>
			    <li><a href="#">Nota de crédito</a></li>
			    
			  </ul>
			</div> -->

		</div>
	</div> 
	<hr class="dividor">
	<div class="row">

		<div class="col-sm-12">

			<form class="form-inline">
			  <div class="form-group">
			    <label for="exampleInputName2">Desde</label>
			    <input type="text" class="form-control" id="input_date_desde" placeholder="dd/mm/yyyy">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail2">Hasta</label>
			    <input type="text" class="form-control" id="input_date_hasta" placeholder="dd/mm/yyyy">
			  </div>
			  <button type="submit" class="btn btn-primary">Filtrar por fecha</button>
			  <a href="#" class="btn btn-success">Todas las fechas</a>
			</form>

		</div>

	</div>
	<hr class="dividor">

	<div class="row">
		


		<div class="col-md-9">


			<form class="form-inline" style="display:inline-block">
			  <div class="form-group">		    
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="buscar">
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			|
				<form name="form_salto" method="POST" action="mensajes.php" class="form-inline" style="display:inline-block">
           
                <label>Número de filas: </label>
                <div class="form-group">   
                  
                  <select class="form-control input-sm input-group" id="filas_x_pagina" name="filas_x_pagina"  onchange="this.form.submit();">              

                    <option value="10" >10</option>
                    <option value="25" >25</option>
                    <option value="50" >50</option>
                    <option value="100" >100</option>
                  

                </select>

              </div>


              </form>


			</div>

		<div class="col-md-3 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog1" method="get" style="display:inline-block" >
	        <input id="pag_actual1" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               


		</div>

	</div>
		<div class="box">
		
			<div class="box-content no-padding">
				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th><a href="#"><i class="fa fa-sort"></i> Fech. de emisión</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Tipo doc.</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> N° Doc.</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Empresa</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> RUC</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Subtotal</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> IGV</a></th>
							<th><a href="#"><i class="fa fa-sort"></i> Total</a></th>							
							
						</tr>
					</thead>
					<tbody>
						
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>
							<tr>
								<td>20/04/2015</td>
								<td>factura</td>
								<td>TM-54801</td>
								<td>Inventiva click</td>
								<td>20514159069</td>
								<td>PEN 100</td>
								<td>PEN 18.00</td>
								<td>PEN 118.00</td>
							</tr>

					  
						
						
					</tbody>
				</table>
			</div>
		</div>
	
	</div>
  <div class="col-md-6">
	    Mostrando 23 de 1520 resultados</div>
		<div class="col-md-6 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               


		</div>
</div>

@stop