<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class AuthController
{


    public static function inicio(Router $router)
    {

        $router->render('auth/inicio', [
            'titulo' => 'Home'
        ]);
    }
    public static function descargar(Router $router)
    {

        $router->render('auth/descargar', [
            'titulo' => 'Descagar Juego'
        ]);
    }
    public static function reglas(Router $router)
    {

        $router->render('auth/reglas', [
            'titulo' => 'Reglamento'
        ]);
    }

    public static function login(Router $router)
    {

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            if (empty($alertas)) {
                // Verificar quel el usuario exista
                $foundUser = Usuario::where('username', $usuario->username);
               
                if (!$foundUser) {
                    Usuario::setAlerta('error', 'El Usuario No Existe');
                } else {

                    // El Usuario existe
                    if ($usuario->comprobar_password($foundUser->password)) {

                        // Iniciar la sesión
                        session_start();
                        $_SESSION['id'] = $foundUser->id;
                        $_SESSION['username'] =$foundUser->username;
                        $_SESSION['admin'] = 1;

                        // Redirección 
                        if($foundUser->admin > 0) {
                            echo("inicio sesion el usuario admin");
                            // header('Location: /admin/cuenta');
                        } else {
                            // header('Location: /cuenta');
                            echo("inicio sesion el usuario comun");

                        }

                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();

        // Render a la vista 
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
    }

    public static function registro(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar_cuenta();

            if (empty($alertas)) {
                $existeUsuario = Usuario::where('username', $usuario->username);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    //   $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();
                    // Enviar email
                    // $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    // $email->enviarConfirmacion();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta en DevWebcamp',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
