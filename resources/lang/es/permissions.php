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
    'create_roles' => ['name' => 'Crear roles', 'module' => 'Roles'],
    'update_roles' => ['name' => 'Editar roles', 'module' => 'Roles'],
    'delete_roles' => ['name' => 'Eliminar roles', 'module' => 'Roles'],

    // Permissions permissions
    'view_permissions' => ['name' => 'Ver permisos', 'module' => 'Permisos'],
    'update_permissions' => ['name' => 'Editar permisos', 'module' => 'Permisos'],

    // Categories permissions
    'view_categories' => ['name' => 'Ver categorias', 'module' => 'Categorias'],
    'create_categories' => ['name' => 'Crear categorias', 'module' => 'Categorias'],
    'update_categories' => ['name' => 'Editar categorias', 'module' => 'Categorias'],
    'delete_categories' => ['name' => 'Eliminar categorias', 'module' => 'Categorias'],

    // Articles permissions
    'view_articles' => ['name' => 'Ver articulos', 'module' => 'Articulos'],
    'create_articles' => ['name' => 'Crear articulos', 'module' => 'Articulos'],
    'update_articles' => ['name' => 'Editar articulos', 'module' => 'Articulos'],
    'delete_articles' => ['name' => 'Eliminar articulos', 'module' => 'Articulos'],
];
