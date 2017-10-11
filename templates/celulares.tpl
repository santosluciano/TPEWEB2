
<div class="container">
  <div class="row">
  	<div class="col-md-12">
      {foreach from=$celulares item=celular}
  		<div class="col-sm-6 col-md-4">
  			<a class="thumbnail partial" href="celular/{$celular['id_celular']}">
          {foreach from=$marcas item=marca}
          {if $marca.id_marca == $celular.id_marca}
  				    <h4 class="text-center"><span class="label label-info">{$marca.nombre}</span></h4>
          {/if}
          {/foreach}
  					<img class="img-responsive" src="{$celular['url_img']}" alt="celular">
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
