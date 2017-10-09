<?php
/* Smarty version 3.1.30, created on 2017-10-09 20:21:34
  from "C:\xampp\htdocs\proyectos\TPEWEB2\templates\Admin\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59dbbe2e648f45_69333087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e77a776f98a8fcc1dc78159a0ae4c0404e8f2e2f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPEWEB2\\templates\\Admin\\index.tpl',
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
function content_59dbbe2e648f45_69333087 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
    <a href="adminMarcas">MARCAS</a>
    <a href="adminCelulares">CELULARES</a>
    <a href="logout">CERRAR SESION</a>
  </div>
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
