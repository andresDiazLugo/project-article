<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia sesión en DevWebcamp</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/login" class="formulario">
        <div class="formulario__campo">
            <label for="username" class="formulario__label">Username</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu username"
                id="username"
                name="username"
               
                
            >
        </div>

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

        <button class="formulario__submit bn632-hover bn26" value="Iniciar sesion" type="submit">Iniciar sesion</button>
    </form>

        <div class="acciones">
            <a href="#" class="acciones__enlaces">¿Olvidaste tu contraseña?</a>
        </div>
</main>


<!-- <button class="formulario__submit bn632-hover bn26" value="Iniciar sesion" type="submit">Iniciar sesion</button>
    </form>

        <div class="acciones">
            <a href="#" class="acciones__enlaces">¿Olvidaste tu contraseña?</a>
        </div> -->