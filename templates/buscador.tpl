{if !empty($celulares)}
  {foreach from=$celulares item=celular}
      {foreach from=$marcas item=marca}
        {if $marca.id_marca == $celular.id_marca}
          <li><a class="partialContain searcha" href="celular/{$celular['id_celular']}">{$marca.nombre|upper} {$celular.nombre|upper}
           </a></li>
        {/if}
      {/foreach}
  {/foreach}
{else}
  <li><a>NO HAY RESULTADOS</a></li>
{/if}
