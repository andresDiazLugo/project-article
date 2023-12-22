<main class="auth">
    <h2 class="auth__heading"> <?php echo $titulo ?> </h2>
    <p class="auth__texto">Inicia sesion con tus datos</p>

    <form class="formulario">
        <div class="formulario__campo">
                <label class="formulario__label" for="usuario">Usuario</label>
                <input 
                
                type="text" 
                class="formulario__input" 
                placeholder="Nombre de usuario" 
                id="usuario"
                name="usuario">
        </div>
        <div class="formulario__campo">
                <label class="formulario__label" for="password">Contraseña</label>
                <input 
                
                type="password" 
                class="formulario__input" 
                placeholder="Contraseña de usuario" 
                id="password"
                name="passowrd">
        </div>

        <button class="formulario__submit bn632-hover bn26" value="Iniciar sesion" type="submit">Iniciar sesion</button>
    </form>

        <div class="acciones">
            <a href="#" class="acciones__enlaces">¿Olvidaste tu contraseña?</a>
        </div>


</main>