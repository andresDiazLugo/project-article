<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Inicio
$router->get('/', [AuthController::class, 'inicio']);
$router->post('/', [AuthController::class, 'inicio']);

// Descargar juego
$router->get('/descargar', [AuthController::class, 'descargar']);
$router->post('/descargar', [AuthController::class, 'descargar']);

// Reglas
$router->get('/reglas', [AuthController::class, 'reglas']);
$router->post('/reglas', [AuthController::class, 'reglas']);

//Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
// $router->get('/olvide', [AuthController::class, 'olvide']);
// $router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
// $router->get('/reestablecer', [AuthController::class, 'reestablecer']);
// $router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
// $router->get('/mensaje', [AuthController::class, 'mensaje']);
// $router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


$router->comprobarRutas();
