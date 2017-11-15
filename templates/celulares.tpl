<div class="container">
	<div class="row">
  	<div class="col-sm-4 col-md-3">
    	<a href="celulares/ordenados/marca" data-value="" class="partialContain thumbnail fa fa-sort"> Mostrar todos ordenados por marca</a>
  	</div>
	</div>
  <div class="row">
  	<div class="col-md-12">
      {foreach from=$celulares item=celular}
  		<div class="col-sm-6 col-md-4">
  			<a class="thumbnail partialContain contenedor-celular" href="celular/" data-value="{$celular.id_celular}">
  				    <h4 class="text-center"><span class="label label-info">{$celular.marca.nombre}</span></h4>
  					<img class="img-responsive" src="{$celular.imagenes.0.ruta}" alt="celular">
  				<div class="caption">
  					<div class="row">
  						<div class="col-md-8 col-xs-6">
  							<h3>{$celular.nombre|upper}</h3>
  						</div>
  						<div class="col-md-4 col-xs-6 price">
  							<h3><label>${$celular.precio}</label></h3>
  						</div>
  					</div>
  			  </div>
        </a>
  		</div>
      {/foreach}
    </div>
  </div>
</div>
