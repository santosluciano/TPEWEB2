<!--Agregar Review --> 
<div class="row">
    <div class="col-md-1">
    <div class="thumbnail">
        <img class="img-responsive user-photo" src="{$usuario.imagen_perfil}">
    </div><!-- /thumbnail -->
    </div><!-- /col-sm-1 -->
    <div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
        <strong>{$usuario.nombre}</strong>
        </div>
        <div class="panel-body">
        <form class="publicarComentario" data-idusuario={$usuario.id_usuario}>
            <div class="form-group">
            <label for="review">Review</label>
            <textarea class="form-control" id="review" name="review" placeholder="Escriba su review..." rows="5" cols="50"></textarea>
            </div>
            <div class="form-group">
            <label for="notaUsuario">Nota (De 0 a 10)</label>
            <input type="number" min="0" max="10" class="form-control" name="notaUsuario" id="notaUsuario" placeholder="Nota Celular (0-10)" required>
            </div>
            <button type="submit" class="btn btn-default">Publicar</button>
        </form>
        </div><!-- /panel-body -->
    </div><!-- /panel panel-default -->
    </div><!-- /col-sm-5 -->
</div> 
<!-- /Agregar Review -->          
<!--Review usuario-->
<!-- /row -->