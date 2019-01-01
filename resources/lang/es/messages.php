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
        -3 => ['name' => 'Eliminado', 'class' => 'label label-default'],
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

        'suspended' => 'Cuenta suspendida.',
        'suspended-small' => 'Tu cuenta ha sido suspendida. Para reactivarla por favor contacta a un administrador.',

        'canceled' => 'Cuenta cancelada.',
        'canceled-small' => 'Tu cuenta ha sido cancelada. No tienes accesso a esta página.',
    ],


    // Messages
    'access-denied' => 'Acceso denegado. No puedes acceder a esta página.',
    'required-fields' => '(*) Campos obligatorios.',
    'no-results' => 'No se han encontrado resultados.',

    // Date format
    'date-format' => 'j M. Y g:i a'

];
