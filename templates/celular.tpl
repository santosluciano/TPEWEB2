<div class="container contenedor-celular">
  <div class="thumbnail">
    <div class="row">
      <div class="col-xs-12 col-md-4">
       <img class="img-responsive" src="{$celular['url_img']}" />
      </div>
      <div class="col-xs-12 col-md-5">
        <h3><a class="partialContain" href="celulares/{$marca['id_marca']}">{$marca['nombre']|upper}</a> {$celular['nombre']|upper}</h3>
        <img src="{$marca['url_img']}" alt="">
        <h3>CARACTERISTICAS</h3>
        <p>{$celular['caracteristicas']}</p>
        <h4>PRECIO</h4>
        <h3 class="precio-celular">${$celular['precio']}</h3>
       </div>
       <div class="col-md-3">
         <canvas id="marksChart"></canvas>
       </div>
       </div>
     </div>
   </div>
</div>
