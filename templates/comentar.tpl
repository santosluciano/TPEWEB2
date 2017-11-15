<!--Agregar Review --> 
<div class="row">
    <div class="col-md-1 col-xs-2">
    <div class="thumbnail">
        <img class="img-responsive user-photo" src="{$usuario.imagen_perfil}">
    </div><!-- /thumbnail -->
    </div><!-- /col-sm-1 -->
    <div class="col-md-10 col-xs-10 col-sm-9">
    <div class="panel panel-default">
        <div class="panel-heading">
        <strong>{$usuario.nombre}</strong>
        </div>
        <div class="panel-body">
        <form class="publicarComentario" data-idusuario={$usuario.id_usuario}>
            <div class="form-group">
                <label for="review">Review</label>
                <textarea class="form-control" id="review" name="review" placeholder required="Escriba su review..." rows="5" cols="50"></textarea>
            </div>
            <label>Puntaje</label>
            <br></br>
            <fieldset class="puntaje">
                <input type="radio" id="star5" name="puntaje" value="5" required/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="puntaje" value="4" required/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="puntaje" value="3" required/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="puntaje" value="2" required/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="puntaje" value="1" required checked/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
            <br></br>
            <button type="submit" class="btn btn-default">Publicar</button>
        </form>
        </div><!-- /panel-body -->
    </div><!-- /panel panel-default -->
    </div><!-- /col-sm-5 -->
</div> 
<!-- /Agregar Review -->          
<!--Review usuario-->
<!-- /row -->