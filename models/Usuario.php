<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id', 'username'
        /* 'apellido'*/,
        'email',
        'password',
        'confirmado',
        'token',
        'admin',
        /* Datos de la base de datos SV */
        'medicamentos',
        'crack',
        'cocaina',
        'crack',
        'marihuana',
        'numero',
        'banco',
        'money',
        'moneda', // BZ
        'semillas',
        'materiales',
        'vida',
        'chaleco',
        'agenda',
        'radio',
        'gps',
        'hongos',
        'nivel',
        'pais',
        'ip',
        'sed',
        'hambre',
        'skin',
        'vip',
        'creditos' // COINS

    ];

    public $id;
    public $username;
    // public $apellido;
    public $email;
    public $password;
    public $password2;
    public $confirmado;
    public $token;
    public $admin;
    public $password_actual;
    public $password_nuevo;

    /* Datos del servidor SAMP */

    //Consumibles
    public $medicamentos;
    public $crack;
    public $cocaina;
    public $hongos;
    public $marihuana;
    //Dinero
    public $banco;
    public $money;
    public $moneda;
    //Salud
    public $vida;
    public $chaleco;
    public $sed;
    public $hambre;
    //Inventario
    public $creditos;  // COINS
    public $semillas;
    public $materiales;
    public $numero;
    public $agenda;
    public $radio;
    public $gps;
    // Datos jugador
    public $nivel;
    public $vip;
    public $skin;
    public $pais;
    public $ip;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->username = $args['username'] ?? '';
        // $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? '';
        //Consumibles
        $this->medicamentos = $args['medicamentos'] ?? null;
        $this->crack = $args['crack'] ?? null;
        $this->cocaina = $args['cocaina'] ?? null;
        $this->hongos = $args['hongos'] ?? null;
        $this->marihuana = $args['marihuana'] ?? null;
        //Dinero
        $this->banco = $args['banco'] ?? null;
    }

    // Validar el Login de Usuarios
    public function validarLogin()
    {
        if (!$this->username) {
            self::$alertas['error'][] = 'El nombre del Usuario es Obligatorio';
        }
        // if(!$this->email) {
        //     self::$alertas['error'][] = 'El Email del Usuario es Obligatorio';
        // }
        if (!filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'nombre no válido';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;
    }

    // Validación para cuentas nuevas
    public function validar_cuenta()
    {
        if (!$this->username) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        // if(!$this->apellido) {
        //     self::$alertas['error'][] = 'El Apellido es Obligatorio';
        // }
        // if(!$this->email) {
        //     self::$alertas['error'][] = 'El Email es Obligatorio';
        // }
        if (!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los password son diferentes';
        }
        return self::$alertas;
    }

    // Valida un email
    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }

    // Valida el Password 
    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function nuevo_password(): array
    {
        if (!$this->password_actual) {
            self::$alertas['error'][] = 'El Password Actual no puede ir vacio';
        }
        if (!$this->password_nuevo) {
            self::$alertas['error'][] = 'El Password Nuevo no puede ir vacio';
        }
        if (strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'El Password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Comprobar el password
    public function comprobar_password(): bool
    {
        return password_verify($this->password_actual, $this->password);
    }

    // Hashea el password
    public function hashPassword(): void
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un Token
    public function crearToken(): void
    {
        $this->token = uniqid();
    }
}
