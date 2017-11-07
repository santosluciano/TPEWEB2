<div class="container contenedor-usuario">
    <div class="thumbnail col-md-offset-3 col-md-6">
        <img src="{$usuario.imagen_perfil}" alt="foto perfil de {$usuario.nombre}" class="img-circle img-perfil">
        <h2 class="nombre-perfil">{$usuario.nombre}</h2>
        <p class="nombre-perfil"><i class="fa fa-envelope" aria-hidden="true"></i> Email: {$usuario.email}</p>
        {if $usuario.permiso_admin == 1}
            <a href="admin">Ir al panel de administrador</a>
        {/if}    
    </div>
</div>
