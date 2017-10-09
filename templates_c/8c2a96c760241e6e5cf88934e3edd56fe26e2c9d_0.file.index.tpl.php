<?php
/* Smarty version 3.1.30, created on 2017-10-09 20:21:29
  from "C:\xampp\htdocs\proyectos\TPEWEB2\templates\Login\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59dbbe290ca312_05305580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c2a96c760241e6e5cf88934e3edd56fe26e2c9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\TPEWEB2\\templates\\Login\\index.tpl',
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
function content_59dbbe290ca312_05305580 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <form action="verificarUsuario" method="post">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="root" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name ="password" placeholder="******" required>
            </div>
            <?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
              <div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
            <?php }?>
            <button type="submit" class="btn btn-default">Ingresar</button>
          </form>
        </div>
      </div>
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
