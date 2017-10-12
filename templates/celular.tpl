<div class="container">
  <div class="thumbnail">
    <div class="row">
      <div class="col-xs-12 col-md-4">
       <img class="img-responsive" src="{$celular[0]['url_img']}" />
      </div>
      <div class="col-xs-12 col-md-7">
        <h3><a class="partialContain" href="celulares/{$marca[0]['id_marca']}">{$marca[0]['nombre']|upper}</a> {$celular[0]['nombre']|upper}</h3>
        <img src="{$marca[0]['url_img']}" alt="">
        <h3>CARACTERISTICAS</h3>
        <p>{$celular[0]['caracteristicas']}</p>
        <h4>PRECIO</h4>
        <h3 class="precio-celular">${$celular[0]['precio']}</h3>
       </div>
     </div>
   </div>
</div>
