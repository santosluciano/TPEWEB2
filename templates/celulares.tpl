
<div class="container">
  <div class="row">
  	<div class="col-md-12">
      {foreach from=$celulares item=celular}
  		<div class="col-sm-6 col-md-4">
  			<a class="thumbnail partial" href="celular/{$celular['id_celular']}">
  				<h4 class="text-center"><span class="label label-info">{$celular['id_marca']}</span></h4>
  					<img class="img-responsive" src="{$celular['url_img']}" alt="celular">
  				<div class="caption">
  					<div class="row">
  						<div class="col-md-8 col-xs-6">
  							<h3>{$celular['nombre']}</h3>
  						</div>
  						<div class="col-md-4 col-xs-6 price">
  							<h3><label>${$celular['precio']}</label></h3>
  						</div>
  					</div>
  			  </div>
        </a>
  		</div>
      {/foreach}
    </div>
  </div>
</div>
