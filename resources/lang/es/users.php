<?php

return [

    'title' => 'Usuarios',
    'parent' => 'Acceso',
    'name' => 'usuario|usuarios',
    'list' => 'Listado de :title',
    'add' => 'Agregar nuevo :name',
    'settings' => 'Opciones',
    'show' => 'Perfil',

    'table' => [
      'id' => 'ID',
      'action' => 'Acción',
      'name' => 'Nombre',
      'status' => 'Estado',
    ],

    'delete-self' => 'Acción denegada. No puedes borrar a tu propia cuenta.',
    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',

    /** Tab 1 */
    'tab-1' => 'Información',

    /** Tab 2 */
    'tab-2' => 'Mensajes',

    /** Tab 3 */
    'tab-3' => 'Opciones básicas',
    'adv-config' => 'Opciones avanzadas',


    /** Tab 4 */
    'tab-4' => 'Datos del usuario',

    /** Tab 5 */
    'tab-5' => 'Contraseña',

    /** Tab 6 */
    'tab-6' => 'Imagen',

    // Alerts
    'resource-created' => 'Nuevo usuario creado.',
    'resource-updated' => 'Usuario actualizado satisfactoriamente.',
    'resource-deleted' => 'Usuario eliminado.',

    'avatar-updated' => 'Imagen de perfil actualizada.',

    'password-success' => 'Contraseña actualizada satisfactoriamente.',
    'password-failed' => 'Contraseña no actualizada.',
    'password-failed-small' => 'La "contraseña actual" que has ingresado no se corresponde con nuestros registros. Por favor intenta de nuevo.',
    'password-expired' => 'Tu contraseña ha expirado.',
    'password-expired-small' => 'Por favor cambia tu contraseña para seguir utilizando tu cuenta.',

    'new-user' => 'Bienvenido por primera vez.',
    'new-user-small' => 'Tu cuenta ya se encuentra registrada, pero antes de empezar a utilizarla, debes activarla. Por favor cambia tu contraseña para activar tu cuenta.',

];
