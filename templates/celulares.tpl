<h1>Nuestros Celulares</h1>
<div class="container">
    <div class="row">
    	<div class="col-md-12">
        {foreach from=$celulares item=celular}
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail" >
				<h4 class="text-center"><span class="label label-info">{$celular['id_marca']}</span></h4>
          			<div class="contieneCelular">
					<img src="images/celuMovimiento2.jpg" alt="celular">
          			</div>
				<div class="caption">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<h3>{$celular['nombre']}</h3>
						</div>
						<div class="col-md-6 col-xs-6 price">
							<h3><label>${$celular['precio']}</label></h3>
						</div>
              					<div class="col-md-6">
							<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>
						</div>
              <div class="col-md-6">          
							<a class="partial" href="celular/{$celular['id_celular']}">Mostrar Celular</a>
						</div>
					</div>
					<p>{$celular['caracteristicas']}</p>
				</div>
			</div>
		</div>
      {/foreach}
    </div>
  </div>
</div>
