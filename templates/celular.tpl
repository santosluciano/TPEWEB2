<div class="container contenedor-celular">
  <div class="thumbnail">
    <div class="row">
      <div class="col-xs-12 col-md-4">
       <img class="img-responsive" src="{$celular['url_img']}" />
      </div>
      <div class="col-xs-12 col-md-4">
        <h3><a class="partialContain" href="celulares/{$marca['id_marca']}">{$marca['nombre']|upper}</a> {$celular['nombre']|upper}</h3>
        <img src="{$marca['url_img']}" alt="">
        <h3>CARACTERISTICAS</h3>
        <p>{$celular['caracteristicas']}</p>
        <h4><span class="label label-default">PRECIO ${$celular['precio']}</span></h4>
       </div>
       <div class="col-md-4 estadisticasCelular">
         <h4 class="nota"><span class="label label-primary">NOTA MUNDO CELULAR: 10</span></h4>
         <h4 class="nota"><span class="label label-info">NOTA USUARIOS: 10</span></h4>
         <canvas id="EstadisticasCelular"></canvas>
       </div>
     </div>
   </div>
</div>
