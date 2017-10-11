<div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img id="topcel" src="images/animacion.gif" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{$celular[0]['nombre']}</h3>
                    <h5 style="color:#337ab7">vendido por <a href="#">{$celular[0]['id_marca']}</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>

                    <!-- Precios -->
                    <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
                    <h3 style="margin-top:0px;">${$celular[0]['precio']}</h3>

                    <div class="section" style="padding-bottom:5px;">
                        <div>
                            <div class="attr2"><p>{$celular[0]['caracteristicas']}</p></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <div class="attr2">CANTIDAD</div>
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                        </div>
                    </div>
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                    </div>
                </div>
                <img id="tarjetas" src="images/tarjetas.jpg" alt="tarjetas">
            </div>
</div>
