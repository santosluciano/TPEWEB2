<div class="container">
  <h1>RECOMENDADO DE LA SEMANA <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></h1>
  {if !empty($celulares.0.nombre)}
  <div class="row">
		   <div class="col-md-offset-4 col-sm-offset-3 col-sm-6 col-md-4">
  			<a class="thumbnail partialContain contenedor-celular" href="celular/" data-value="{$celulares.0.id_celular}">
					<img class="img-responsive" src="{$celulares.0.url_img}" alt="celular">
  				<div class="caption">
  					<div class="row">
  						<div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-8 col-xs-6">
  							<h3>{$celulares.0.nombre|upper}</h3>
  						</div>
  					</div>
  			  </div>
        </a>
  		</div>
    </div>
  </div>
  {/if}
</div>
