<?php
/* Smarty version 3.1.30, created on 2017-10-09 20:20:01
  from "C:\xampp\htdocs\proyectos\TPEWEB2\templates\nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59dbbdd1a8a265_77455243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29db83c36bb0b77903cec329ab14f22df1da7805' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPEWEB2\\templates\\nav.tpl',
      1 => 1507572939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dbbdd1a8a265_77455243 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home" class="partial">INICIO <span class="sr-only">(current)</span></a></li>
        <li><a href="celulares"  class="partial fa fa-mobile fa-2x"></a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MARCAS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
?>
            <li><a class="celulares partial" href="celulares/<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
" data-value="<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
"><?php echo $_smarty_tpl->tpl_vars['marca']->value['nombre'];?>
</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control key" placeholder="Modelo Celular">
        </div>
        <button type="submit" class="btn btn-default partialSearch" href="celulares/buscar">BUSCAR</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.facebook.com/" class="fa fa-facebook" target="_blank"></a></li>
        <li><a href="https://www.instagram.com/?hl=es" class="fa fa-instagram" target="_blank"></a></li>
        <li><a href="https://www.youtube.com/" class="fa fa-youtube" target="_blank"></a></li>
        <li><a href="admin" class="fa fa-user-circle-o"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php }
}
