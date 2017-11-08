<div class="container tarjeta-celular">
  <div class="thumbnail">
    <div class="row">
      <div class="col-xs-12 col-md-4">
       <img class="img-responsive" src="{$celular.url_img}" />
      </div>
      <div class="col-xs-12 col-md-4">
        <h3><a class="partialContain" href="celulares" data-value="{$marca.id_marca}">{$marca.nombre|upper}</a> {$celular.nombre|upper}</h3>
        <img src="{$marca.url_img}" alt="">
        <h3>CARACTERISTICAS</h3>
        <p>{$celular.caracteristicas}</p>
        <h4><span class="label label-default">PRECIO ${$celular.precio}</span></h4>
       </div>
       <div class="col-md-4 estadisticasCelular">
         <h4 class="nota"><span class="label label-primary">NOTA MUNDO CELULAR: <span class="nota-celular"></span></span></h4>
         <h4 class="nota"><span class="label label-info">NOTA USUARIOS: <span class="nota-usuarios"></span></span></h4>
         <div id="antutu">
          <span class="label label-danger">ANTUTU V6</span><img src="images/antutu.png" alt=""><span class="badge puntaje-antutu"></span>
         </div>
         <div class="graficoCelular">
         </div>
       </div>
     </div>
   </div>
   <div>
    <!-- Nav tabs -->
    <div class="thumbnail">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#especificaciones" aria-controls="home" role="tab" data-toggle="tab">Especificaciones</a></li>
        <li role="presentation"><a href="#reviews" class="btnComentarios" data-idcelular="{$celular.id_celular}" aria-controls="profile" role="tab" data-toggle="tab" >Reviews</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="especificaciones">
          {if (!empty($especificacion))}
            <ul class="list-group">
              <li class="list-group-item">TIPO PANTALLA: {$especificacion.pantalla}</li>
              <li class="list-group-item">RESOLUCION PANTALLA: {$especificacion.pantalla_dimension}</li>
              <li class="list-group-item">PESO: {$especificacion.peso} gr.</li>
              <li class="list-group-item">PROCESADOR: {$especificacion.procesador}</li>
              <li class="list-group-item">MEMORIA RAM: {$especificacion.ram}</li>
              <li class="list-group-item">MEMORIA INTERNA: {$especificacion.memoria}</li>
              <li class="list-group-item">SISTEMA OPERATIVO: {$especificacion.sistema_operativo}</li>
              <li class="list-group-item">CONECTIVIDAD: {$especificacion.conectividad}</li>
              <li class="list-group-item">BATERIA: {$especificacion.capacidad_bateria} mAh</li>
              <li class="list-group-item">CAMARA: {$especificacion.camara}</li>
              <li class="list-group-item">LECTOR DE HUELLA: {if $especificacion.lector_huella}SI{else}NO{/if}</li>
              <li class="list-group-item">SUPERCARGA: {if $especificacion.supercarga}SI{else}NO{/if}</li>
            </ul>
          {else}
            DISCULPE, ESPECIFICACIONES NO CARGADAS
          {/if}
        </div>        
        <div role="tabpanel" class="tab-pane" id="reviews">
          <div class="container">
          <!--Agregar Review --> 
          <div class="row">
              <div class="col-md-1">
                <div class="thumbnail">
                  <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
              </div><!-- /col-sm-1 -->
              <div class="col-md-10">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>Usuario</strong>
                  </div>
                  <div class="panel-body">
                    <form class="publicarComentario">
                      <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="form-control" id="review" name="review" placeholder="Escriba su review..." rows="5" cols="50"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="notaUsuario">Nota</label>
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
            <div class="comentarios">
            <div>
          </div><!-- /container -->
        </div>
      </div>
    </div>
  </div>
</div>
