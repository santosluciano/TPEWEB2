<div class="container">
  <p>Aca estan los celulares</p>
  {foreach from=$celulares item=celular}
  <p>Nombre: {$celular['nombre']}</p>
  <p>Caracteristicas: {$celular['caracteristicas']}</p>
  <p>Precio: {$celular['precio']}</p>
  <p>ID Marca: {$celular['id_marca']}</p>
  <button type="button" name="button" href="celulare" class="partial">Mostrar Celular</button>
  <p>-------------------------------------</p>
  {/foreach}
</div>
