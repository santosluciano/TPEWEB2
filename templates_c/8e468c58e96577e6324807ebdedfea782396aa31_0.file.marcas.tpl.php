<?php
/* Smarty version 3.1.30, created on 2017-10-09 20:21:36
  from "C:\xampp\htdocs\proyectos\TPEWEB2\templates\Admin\marcas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59dbbe30c52584_18336252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e468c58e96577e6324807ebdedfea782396aa31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPEWEB2\\templates\\Admin\\marcas.tpl',
      1 => 1507572939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_59dbbe30c52584_18336252 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripcion</th>
        </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
?>
        <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['marca']->value['nombre'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['marca']->value['descripcion'];?>
</td>
          <td><a href="modificarMarca/<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
">Modificar</a></td>
          <td><a href="eliminarMarca/<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
">Eliminar</a></td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </tbody>
    </table>
    <a href="crearMarca">Crear nueva marca</a>
  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
