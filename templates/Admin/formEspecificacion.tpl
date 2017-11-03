{include file="../header.tpl"}
<h1>{$encabezado}</h1>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {if isset($error) }
      <div class="alert alert-danger" role="alert">{$error}</div>
    {/if}
    <div class="thumbnail">
      <form action="{$action}" method="post">
        <div class="form-group">
          <label for="pantalla">Pantalla</label>
          <input type="text" class="form-control" id="pantalla" name="pantalla"  value="{$pantalla}">
        </div>
        <div class="form-group">
          <label for="pantalla_dimension">Dimension Pantalla</label>
          <input type="text" class="form-control" id="pantalla_dimension" name="pantalla_dimension">{$pantalla_dimension}</textarea>
        </div>
        <div class="form-group">
          <label for="peso">Peso (en gramos)</label>
          <input type="number" class="form-control" id="peso" name="peso"  value="{$peso}">
        </div>
        <div class="form-group">
          <label for="procesador">Procesador</label>
          <input type="text" class="form-control" id="procesador" name="procesador"  value="{$procesador}">
        </div>
        <div class="form-group">
          <label for="ram">Ram</label>
          <input type="text" class="form-control" id="ram" name="ram"  value="{$ram}">
        </div>
        <div class="form-group">
          <label for="memoria">Memoria</label>
          <input type="text" class="form-control" id="memoria" name="memoria"  value="{$memoria}">
        </div>
        <div class="form-group">
          <label for="sistema_operativo">Sistema Operativo</label>
          <input type="text" class="form-control" id="sistema_operativo" name="sistema_operativo"  value="{$sistema_operativo}">
        </div>
        <div class="form-group">
          <label for="conectividad">Conectividad</label>
          <input type="text" class="form-control" id="conectividad" name="conectividad"  value="{$conectividad}">
        </div>
        <div class="form-group">
          <label for="capacidad_bateria">Capacidad de la bateria (en mHa)</label>
          <input type="number" class="form-control" id="capacidad_bateria" name="capacidad_bateria"  value="{$capacidad_bateria}">
        </div>        
        <div class="form-group">
          <label for="camara">Camara</label>
          <input type="text" class="form-control" id="camara" name="camara"  value="{$camara}">
        </div>
          <div class="checkbox">
            <label> 
                <input type="checkbox" name="lector_huella" {if $lector_huella}checked{/if}> Lector de Huella
            </label>
            <label>
                <input type="checkbox" name="supercarga" {if $supercarga}checked{/if}> Supercarga
            </label>
        </div>
        <button type="submit" class="btn btn-primary">{$accion}</button>
        <a href="adminCelulares" type="button" class="btn btn-success btn-sm">Volver</a>
      </form>
    </div>
  </div>
</div>
{include file="../footer.tpl"}