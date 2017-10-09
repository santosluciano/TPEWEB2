<?php
/* Smarty version 3.1.30, created on 2017-10-09 20:20:06
  from "C:\xampp\htdocs\proyectos\TPEWEB2\templates\partial\celulares.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59dbbdd651ca97_33166729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21aae499b2db7b551043e298b505d879dc1218f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPEWEB2\\templates\\partial\\celulares.tpl',
      1 => 1507573001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dbbdd651ca97_33166729 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Nuestros Celulares</h1>
<div class="container">
    <div class="row">
    	<div class="col-md-12">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['celulares']->value, 'celular');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['celular']->value) {
?>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail" >
				<h4 class="text-center"><span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['celular']->value['id_marca'];?>
</span></h4>
          			<div class="contieneCelular">
					<img src="images/celuMovimiento2.jpg" alt="celular">
          			</div>
				<div class="caption">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<h3><?php echo $_smarty_tpl->tpl_vars['celular']->value['nombre'];?>
</h3>
						</div>
						<div class="col-md-6 col-xs-6 price">
							<h3><label>$<?php echo $_smarty_tpl->tpl_vars['celular']->value['precio'];?>
</label></h3>
						</div>
              					<div class="col-md-6">
							<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>
						</div>
              					<div class="col-md-6">
							<button type="button" name="button" href="celulare" class="partial">Mostrar Celular</button>
						</div>
					</div>
					<p><?php echo $_smarty_tpl->tpl_vars['celular']->value['caracteristicas'];?>
</p>
				</div>
			</div>
		</div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
  </div>
</div>
<?php }
}
