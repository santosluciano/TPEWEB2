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
         <div id="antutu">
          <span class="label label-danger">ANTUTU V6</span><img src="images/antutu.png" alt=""><span class="badge">2000</span>
         </div>
         <canvas id="EstadisticasCelular"></canvas>
       </div>
     </div>
   </div>
   <div>
    <!-- Nav tabs -->
    <div class="thumbnail">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#especificaciones" aria-controls="home" role="tab" data-toggle="tab">Especificaciones</a></li>
        <li role="presentation"><a href="#reviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="especificaciones">
            <ul class="list-group">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Morbi leo risus</li>
              <li class="list-group-item">Porta ac consectetur ac</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane" id="reviews">
          <div class="panel panel-primary">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
