<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Regístrate en DevWebcamp</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/registro" class="formulario">
        <div class="formulario__campo">
            <label for="username" class="formulario__label">Usuario</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Nombre"
                id="username"
                name="username"
                value="<?php echo $usuario->username; ?>"
            >
        </div>
<!-- 
        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Apellido"
                id="apellido"
                name="apellido"
                value="<?php echo $usuario->apellido; ?>"
            >
        </div> -->

        <!-- <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
                value="<?php echo $usuario->email; ?>"
            >
        </div> -->

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Tu Password"
                id="password"
                name="password"
            >
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Repetir Password"
                id="password2"
                name="password2"
            >


        <input type="submit" class="formulario__submit bn632-hover bn26" value="Crear Cuenta">
    </form>

    <div class="acciones">
            <a href="#" class="acciones__enlaces">¿Olvidaste tu contraseña?</a>
        </div>
</main>

<!--  -->

<!-- <div class="acciones">
            <a href="#" class="acciones__enlaces">¿Olvidaste tu contraseña?</a>
        </div> -->