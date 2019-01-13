<?php

return [

    'title' => 'Menu',
    'parent' => 'Contenido',
    'name' => 'menu|menues',
    'list' => 'Listado de :title',
    'add' => 'Agregar nueva :name',
    'edit' => 'Editar :name :Resource',
    'view' => 'Ver :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Acción',
      'title' => 'Titulo',
      'url' => 'Url',
      'status' => 'Estado',
    ],

    // Alerts
    'resource-created' => 'Nuevo menu creado.',
    'resource-updated' => 'Menu actualizado satisfactoriamente.',
    'resource-deleted' => 'Menu eliminado.',

    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',
];
