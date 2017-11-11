<div class="container contenedor-usuario">
    <div class="thumbnail col-md-offset-3 col-md-6 datos-perfil">
        {include file="fotoperfil.tpl"} 
        <h2 class="nombre-perfil">{$usuario.nombre}</h2>
        <p class="nombre-perfil"><i class="fa fa-envelope" aria-hidden="true"></i> Email: {$usuario.email}</p>
        {if $usuario.permiso_admin == 1}
            <a href="admin">Ir al panel de administrador</a>
        {/if}
        <form class="submitFotoPerfil" enctype="multipart/form-data">
            <input type="file" name="imageProfile" id="imageProfile" required>
            <button type="submit" class="btn btn-default">Cambiar imagen de perfil</button>
        </form>
    </div>
</div>
