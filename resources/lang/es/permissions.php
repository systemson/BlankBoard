<?php

return [

    'title' => 'Permisos',
    'parent' => 'Acceso',
    'name' => 'permiso|permisos',
    'list' => 'Listado de :title',
    'add' => 'Agregar nuevo :name',
    'edit' => 'Editar :name :Resource',
    'view' => 'Ver :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Acción',
      'name' => 'Nombre',
      'module' => 'Módulo',
      'slug' => 'Slug',
      'description' => 'Descripción',
      'status' => 'Estado',
    ],

    // Alerts
    'resource-updated' => 'Permiso actualizado satisfactoriamente.',

    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',

    // Users permissions
    'view_users' => ['name' => 'Ver usuarios', 'module' => 'Usuarios'],
    'create_users' => ['name' => 'Crear usuarios', 'module' => 'Usuarios'],
    'update_users' => ['name' => 'Editar usuarios', 'module' => 'Usuarios'],
    'delete_users' => ['name' => 'Eliminar usuarios', 'module' => 'Usuarios'],

    // Roles permissions
    'view_roles' => ['name' => 'Ver roles', 'module' => 'Roles'],
    'create_roles' => ['name' => 'Crear roles', 'module' => 'Roles'],
    'update_roles' => ['name' => 'Editar roles', 'module' => 'Roles'],
    'delete_roles' => ['name' => 'Eliminar roles', 'module' => 'Roles'],

    // Permissions permissions
    'view_permissions' => ['name' => 'Ver permisos', 'module' => 'Permisos'],
    'update_permissions' => ['name' => 'Editar permisos', 'module' => 'Permisos'],
];
