{if !empty($celulares)}
  {foreach from=$celulares item=celular}
          <li><a class="partialContain contenedor-celular" href="celular/" data-value="{$celular.id_celular}">{$celular.marca.nombre|upper} {$celular.nombre|upper}
           </a></li>
  {/foreach}
{else}
  <li><a>NO HAY RESULTADOS</a></li>
{/if}
