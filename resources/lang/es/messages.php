<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    //
    'admin-site' => 'Administrador',

    // Statuses
    'status' => [
        1  => ['name' => 'Activo', 'class' => 'label label-success'],
        0  => ['name' => 'Inactivo', 'class' => 'label label-default'],
        -1 => ['name' => 'Suspendido', 'class' => 'label label-warning'],
        -2 => ['name' => 'Cancelado', 'class' => 'label label-danger'],
    ],

    // Buttons
    'btn' => [
        'new' =>      ['name' => 'Nuevo', 'class' => 'btn btn-success'],
        'login' =>    ['name' => 'Entrar', 'class' => 'btn btn-success'],
        'send' =>     ['name' => 'Enviar', 'class' => 'btn btn-primary'],
        'save' =>     ['name' => 'Guardar', 'class' => 'btn btn-primary'],
        'register' => ['name' => 'Registrar', 'class' => 'btn btn-primary'],
        'profile' =>  ['name' => 'Mi perfil', 'class' => 'btn btn-primary'],
        'delete' =>   ['name' => 'Borrar', 'class' => 'btn btn-danger'],
        'cancel' =>   ['name' => 'Cancelar', 'class' => 'btn btn-danger'],
        'logout' =>   ['name' => 'Salir', 'class' => 'btn btn-danger'],
        'draft' =>    ['name' => 'Borrador', 'class' => 'btn btn-default'],
        'reset' =>    ['name' => 'Reiniciar', 'class' => 'btn btn-default'],
        'edit' =>     ['name' => 'Editar', 'class' => 'btn btn-default'],
        'settings' => ['name' => 'Opciones', 'class' => 'btn btn-default'],
    ],

    // Actions
    'action' => [
        'trash' => '<i class="fa fa-trash"></i>',
        'archive' => '<i class="fa fa-archive"></i>',
        'status' => '<i class="fa fa-check"></i>',
    ],

    // Keywords
    'yes' => 'Si',
    'no' => 'No',
    'help' => 'Ayuda',
    'search' => 'Buscar',
    'new' => 'Nuevo',
    'show' => 'Mostrar',
    'edit' => 'Editar',
    'create' => 'Crear',
    'here' => 'Acá',
    'reply' => 'Responder',
    'forward' => 'Reenviar',
    'delete' => 'Borrar',

    // Alerts
    'alert' => [
        // Resources
        'resource-created' => 'Elemento creado safistactoriamente.',
        'resource-updated' => 'Elemento actualizado.',
        'resource-deleted' => 'Elemento eliminado.',
        'resource-trashed' => 'Elemento movido a la papelera.',
        'resource-restored' => 'Elemento restaurado.',
        'resource-failed' => 'Elemento no actualizado.',

        // Users
        'user-created' => 'Usuario creado safistactoriamente.',
        'user-updated' => 'Usuario actualizado.',
        'user-deleted' => 'Usuario eliminado.',

        // Emails
        'email-sended' => 'Correo enviado safistactoriamente.',
        'email-drafted' => 'Correo movido a borradores.',
        'email-updated' => 'Correo actualizado.',
        'email-trashed' => 'Correo movido a la papelera.',
        'email-deleted' => 'Correo eliminado.',
        'email-restored' => 'Correo restaurado.',

        'avatar-updated' => 'Imagen de perfil actualizada.',

        'password-success' => 'Contraseña actualizada safistactoriamente.',

        'password-failed' => 'Contraseña no actualizada.',
        'password-failed-small' => 'Verifica nuevamente e intenta de nuevi. Estas son las prinipales razones: 1) La contraseña actual no es la correcta, 2) La confirmación no se corresponde con la contraseña, 3) La nueva contraseña es la misma que la actual. Si aún tienes problemas contacta con un administrador.',

        'login' => 'Bienvenido.',
        'login-small' => 'Te has conectado safistactoriamente.',

        'logout' => 'Desconectado.',
        'logout-small' => 'Te has desconectado safistactoriamente.',

        'forbidden' => 'Acceso prohibido.',
        'forbidden-small' => 'Intenta luego o contacta a un administrador.',

        'denied' => 'Acceso denegado.',
        'denied-small' => 'No tienes acceso a esta página.',

        'failed' => 'Acción fallida.',
        'failed-small' => 'Intenta de nuevo o contacta a un administrador.',

        'inactive' => 'Cuenta inactiva.',
        'inactive-small' => 'Tu cuenta ha sido desactivada.',
    ],

    // Messages
    'access-denied' => 'Acceso denegado. No puedes acceder a esta página.',
    'required-fields' => '(*) Campos obligatorios.',

    // Date format
    'date-format' => 'j M. Y g:i a'

];
